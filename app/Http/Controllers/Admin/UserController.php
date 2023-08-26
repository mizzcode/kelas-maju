<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::query()->latest()->paginate(5);

        $title = "Hapus Pengguna!";
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);

        return view("admin.user.index", [
            "users" => $users
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "email" => "required|email:dns",
            "password" => "required|max:50",
            "name" => "required|max:50",
            "role" => "required"
        ]);

        // jika gagal validasi sesuai rules
        if ($validator->fails()) {
            return redirect()->back()
            ->withErrors($validator)
            ->withInput()
            ->with("errorCreateUser", "Gagal Menambah User Baru");
        }

        // menerima input yang sudah tervalidasi
        $validated = $validator->validated();

        User::query()->create($validated);

        return redirect()->route("user.index")->with("successCreateUser", "Berhasil Menambahkan User Baru");
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        try {
            // cari data user berdasarkan id
            // id diambil dari input hidden dengan name user_id
            $user = User::query()->findOrFail($request->user_id);

            // mengecek jika password kosong
            if (empty($request->password)) {
                // maka kasih alert harus masukkan password old nya
                return redirect()->back()->with("errorUpdateUser", "Mohon Masukkan Konfirmasi Password!");
                // mengecek apakah password old tidak sama dengan password user saat ini
            } else if (!Hash::check($request->password, $user->password)) {
                // jika tidak sama maka kasih alert password old salah
                return redirect()->back()->with("errorUpdateUser", "Konfirmasi Password salah!");
            } else {
                // selain itu, update data user
                $user->email = $request->email;
                $user->name = $request->name;
                $user->role = $request->role;
                $user->save();
        
                return redirect()->route("user.index")->with("successUpdateUser", "Data Pengguna Berhasil Di Update.");
            }
    
        } catch (QueryException $e) {
            return back()->with("errorUpdateUser", "Gagal memperbarui data user:" . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $user = User::query()->findOrFail($id);
            
            $user->delete();

            return redirect()->route("user.index")->with("successDeleteUser", "Data User Berhasil Di Delete.");
        } catch (QueryException $e) {
            return back()->with("errorDeleteUser", "Gagal menghapus data user: " . $e->getMessage());
        }
    }
}