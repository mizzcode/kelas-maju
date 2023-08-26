<?php

namespace Tests\Feature;

use App\Models\Student;
use App\Models\User;
use Database\Seeders\DatabaseSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class StudentTest extends TestCase
{
    public function testDatabaseSeeder() {
        $this->seed(DatabaseSeeder::class);

        $user = User::query()->first();

        $student = Student::query()->where("user_id", $user->id)->first();

        self::assertEquals($student->user_id, $user->id);
    }
}
