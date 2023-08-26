<?php

namespace Tests\Feature;

use App\Models\Mapel;
use App\Models\Teacher;
use Database\Seeders\MapelSeeder;
use Database\Seeders\TeacherSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Log;
use Tests\TestCase;

class TeacherTest extends TestCase
{
    public function testTeacher() {
        $this->seed(TeacherSeeder::class);

        $teacher = Teacher::query()->first();

        self::assertNotNull($teacher);
        Log::info(json_encode($teacher));
    }

    public function testMapelTeacher() {
        $this->seed(TeacherSeeder::class);
        $this->seed(MapelSeeder::class);

        $teacher = Teacher::query()->first();
        $mapel = Mapel::query()->where("teacher_id", $teacher->id)->get();
        
        self::assertNotNull($teacher);
        self::assertNotNull($mapel);

        Log::info(json_encode($mapel));
    }
}