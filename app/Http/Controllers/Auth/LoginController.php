<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index() {
        return view("auth.login");
    }

    public function login(Request $request) {
        $this->validate($request, [
            "email" => "email:dns",
            "password" => "required|max:16"
        ]);
    }
}
