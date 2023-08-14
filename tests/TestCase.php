<?php

namespace Tests;

use App\Models\Mahasiswa;
use App\Models\User;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    protected function setUp():void {
        parent::setUp();

        Mahasiswa::query()->delete();
        User::query()->delete();
    } 
}
