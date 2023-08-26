<?php

namespace Tests;

use App\Models\Mapel;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    protected function setUp():void {
        parent::setUp();

        User::query()->delete();
        Mapel::query()->delete();
        Teacher::query()->delete();
    } 
}
