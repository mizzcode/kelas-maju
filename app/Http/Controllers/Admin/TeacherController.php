<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Teacher;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class TeacherController extends Controller
{
    private function useValidator(Request $request, array $rules)
    {
        return Validator::make($request->all(), $rules);
    }
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
        try {
            // Validasi input terlebih dahulu
            $validator = $this->useValidator($request, [
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
        } catch (QueryException $e) {
            Log::info($e);
            dd($e->getMessage());
            return redirect()->back()->with("errorCreateTeacher", "Gagal Menambahkan Guru Baru");
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        try {
            $teacher = Teacher::query()->findOrFail($request->teacher_id);

            // Validasi input terlebih dahulu
            $validator = $this->useValidator($request, [
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

            Teacher::query()->where("id", "=", $teacher->id)->update($validated);

            return redirect()->route("teacher.index")->with("successUpdateTeacher", "Berhasil Update Data Guru");
        } catch (QueryException $e) {
            Log::info($e);
            dd($e->getMessage());
            return back()->with("errorUpdateTeacher", "Gagal memperbarui data guru");
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            Teacher::query()->where("id", "=", $id)->delete();

            return redirect()->route("teacher.index")->with("successDeleteTeacher", "Data Guru Berhasil Di Delete.");
        } catch (QueryException $e) {
            Log::info($e);
            dd($e->getMessage());
            return back()->with("errorDeleteTeacher", "Gagal menghapus data guru");
        }
    }
}
