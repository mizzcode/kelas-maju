<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Mahasiswa;
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
        $mahasiswa = Mahasiswa::query()->findOrFail($request->mahasiswa_id);

        $validatedData = $this->validate($request, [
            "name" => "required|50",
            "nim" => "required|50|integer",
            "jurusan" => "required",
            "status" => "required",
        ]);

        $validatedData["user_id"] = Auth::user()->id;

        $mahasiswa->update($validatedData);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
