<?php

namespace Database\Seeders;

use App\Models\Mapel;
use App\Models\Teacher;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MapelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $teacher = Teacher::query()->first();

        Mapel::query()->create([
            "name" => "Math",
            "teacher_id" => $teacher->id
        ]);
        Mapel::query()->create([
            "name" => "English",
            "teacher_id" => $teacher->id
        ]);
    }
}
