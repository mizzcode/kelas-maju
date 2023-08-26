<?php

namespace Database\Seeders;

use App\Models\Student;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::query()->first();

        Student::query()->create([
            "email" => "jani@gmail.com",
            "name" => "jani",
            "nis" => 12345,
            "jurusan" => "DESAIN GRAFIS",
            "status" => "Active",
            "user_id" => $user->id
        ]);
    }
}
