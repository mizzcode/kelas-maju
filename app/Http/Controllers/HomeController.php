<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $users = User::query()->latest()->paginate(5);

        return view('home', [
            "users" => $users
        ]);
    }
}
