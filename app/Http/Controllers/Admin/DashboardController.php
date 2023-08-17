<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Mahasiswa;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index() {
        return view("admin.home" , [
            "total_admin" => User::query()->count(),
            "total_mahasiswa" => Mahasiswa::query()->count(),
            "mahasiswa_not_active" => Mahasiswa::query()->where("status", "Not Active")->count(),
            "mahasiswa_active" => Mahasiswa::query()->where("status", "Active")->count(),
        ]);
    }
}
