<?php

namespace Database\Seeders;

use App\Models\Teacher;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class TeacherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::query()->first();

        Teacher::query()->create([
            "email" => "olan@gmail.com",
            "name" => "Olan",
            "nip" => 12345,
            "education" => "S1",
            "gender" => "Pria",
            "user_id" => $user->id,
        ]);
    }
}
