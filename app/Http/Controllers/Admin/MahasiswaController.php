<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Mahasiswa;
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
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
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
