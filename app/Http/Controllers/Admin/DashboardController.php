<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\User;
use App\Models\Mapel;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view("admin.home", [
            "total_user" => User::query()->count(),
            "total_student" => Student::query()->count(),
            "total_teacher" => Teacher::query()->count(),
            "total_mapel" => Mapel::query()->count()
        ]);
    }
}
