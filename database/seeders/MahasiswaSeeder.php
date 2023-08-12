<?php

namespace Database\Seeders;

use App\Models\Mahasiswa;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class MahasiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::query()->first();

        Mahasiswa::query()->create([
            "name" => "mizz",
            "nim" => 12345,
            "jurusan" => "Teknik Informatika",
            "status" => "Active",
            "user_id" => $user->id
        ]);
    }
}
