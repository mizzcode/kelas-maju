<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index() {
        // tampilan login
        return view("auth.login");
    }

    public function login(Request $request) {
        // melakukan validasi sebelum percobaan masuk
        $credentials = $this->validate($request, [
            "email" => "required|email:dns",
            "password" => "required|max:16"
        ]);
        // jika user tervalidasi dengan benar maka redirect ke dashboard
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->route("dashboard")->with("success", "Berhasil Login");
        } else {
            return back()->with("error", "Email atau Password salah");
        }
    }
}
