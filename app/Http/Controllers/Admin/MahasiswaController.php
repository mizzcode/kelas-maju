<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Mahasiswa;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("admin.mahasiswa.index", [
            "mahasiswas" => Mahasiswa::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input terlebih dahulu
        $validator = Validator::make($request->all(), [
            "name" => "required|max:50",
            "nim" => "required|max:50",
            "jurusan" => "required|max:50",
            "status" => "required",
        ]);

        if ($validator->fails()) {
            return redirect()->back()
            ->withErrors($validator)
            ->withInput()
            ->with("errorCreateMahasiswa", "Gagal Menambahkan Mahasiswa Baru");
        }
        // menerima input yang sudah tervalidasi
        $validated = $validator->validated();
        // menambahkan key baru buat kolom user_id dengan value user saat ini
        $validated['user_id'] = Auth::user()->id;

        Mahasiswa::query()->create($validated);

        return redirect()->route("mahasiswa.index")->with("successCreateMahasiswa", "Berhasil Menambahkan Mahasiswa Baru");
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        try {
            $mahasiswa = Mahasiswa::query()->findOrFail($request->mahasiswa_id);
    
            $mahasiswa->name = $request->name;
            $mahasiswa->nim = $request->nim;
            $mahasiswa->jurusan = $request->jurusan;
            $mahasiswa->status = $request->status;

            // untuk mengetahui yang update data itu siapa
            $mahasiswa->user_id = Auth::user()->id;
            $mahasiswa->save();
    
            return redirect()->route("mahasiswa.index")->with("successUpdateMahasiswa", "Data Mahasiswa Berhasil Di Update.");
        } catch (QueryException $e) {
            return back()->with("errorUpdateMahasiswa", "Gagal memperbarui data: " . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        try {
            $mahasiswa = Mahasiswa::query()->findOrFail($request->mahasiswa_id);

            $mahasiswa->delete();

            return redirect()->route("mahasiswa.index")->with("successDeleteMahasiswa", "Data Mahasiswa Berhasil Di Delete.");
        } catch (QueryException $e) {
            return back()->with("errorDeleteMahasiswa", "Gagal menghapus data: " . $e->getMessage());
        }
    }
}
