<?php

namespace Tests\Feature;

use App\Models\Mahasiswa;
use App\Models\User;
use Database\Seeders\DatabaseSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class MahasiswaTest extends TestCase
{
    public function testDatabaseSeeder() {
        $this->seed(DatabaseSeeder::class);

        $user = User::query()->first();

        $mahasiswa = Mahasiswa::query()->where("user_id", $user->id)->first();

        self::assertEquals($mahasiswa->user_id, $user->id);
    }
}
