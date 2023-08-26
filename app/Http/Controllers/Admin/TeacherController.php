<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Teacher;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $teachers = Teacher::query()->latest()->paginate(5);

        $title = "Hapus Guru!";
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);

        return view("admin.teacher.index", [
            "teachers" => $teachers,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input terlebih dahulu
        $validator = Validator::make($request->all(), [
            "email" => "required|email:dns",
            "name" => "required|max:50",
            "nip" => "required|max:50",
            "education" => "required|max:50",
            "gender" => "required",
            "status" => "required",
        ]);

        if ($validator->fails()) {
            return redirect()->back()
            ->withErrors($validator)
            ->withInput()
            ->with("errorCreateTeacher", "Gagal Menambahkan Guru Baru");
        }
        // menerima input yang sudah tervalidasi
        $validated = $validator->validated();
        // menambahkan key baru buat kolom user_id dengan value user saat ini
        $validated['user_id'] = Auth::user()->id;

        Teacher::query()->create($validated);

        return redirect()->route("teacher.index")->with("successCreateTeacher", "Berhasil Menambahkan Guru Baru");
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        try {
            $teacher = Teacher::query()->findOrFail($request->teacher_id);
    
            $teacher->email = $request->email;
            $teacher->name = $request->name;
            $teacher->nip = $request->nip;
            $teacher->education = $request->education;
            $teacher->gender = $request->gender;
            $teacher->status = $request->status;

            // untuk mengetahui yang update data itu siapa
            $teacher->user_id = Auth::user()->id;
            $teacher->save();
    
            return redirect()->route("teacher.index")->with("successUpdateTeacher", "Data Guru Berhasil Di Update.");
        } catch (QueryException $e) {
            return back()->with("errorUpdateTeacher", "Gagal memperbarui data guru: " . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $teacher = Teacher::query()->findOrFail($id);
            
            $teacher->delete();

            return redirect()->route("teacher.index")->with("successDeleteTeacher", "Data Guru Berhasil Di Delete.");
        } catch (QueryException $e) {
            return back()->with("errorDeleteTeacher", "Gagal menghapus data guru: " . $e->getMessage());
        }
    }
}
