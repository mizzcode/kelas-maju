<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Error;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    public function index() {
        // tampilan login
        return view("auth.login");
    }

    public function login(Request $request) {
        try {
        // melakukan validasi sebelum percobaan masuk
        $credentials = $this->validate($request, [
            "email" => "required|email:dns",
            "password" => "required|max:16"
        ]);
        // jika user tidak tervalidasi maka throw error
        if (!Auth::attempt($credentials)) throw new Error();
        
        // membuat sesi baru
        $request->session()->regenerate();
        // redirect ke route dashboard
        return redirect()->route("dashboard")->with("login", "Selamat Datang!");
        } catch(ValidationException) {
            return back()->with("errorLogin", "Email atau Password salah");
        }

    }
}