<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\StudentController;
use App\Http\Controllers\Admin\TeacherController;
use App\Http\Controllers\Admin\MapelController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, "index"])->name("home");

Route::get("/login", [LoginController::class, "index"])->middleware("guest")->name("login");
Route::post("/login", [LoginController::class, "login"])->middleware("guest")->name("postLogin");

Route::post("/logout", [LogoutController::class, "logout"])->middleware("auth")->name("logout");

Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get("/", [DashboardController::class, "index"])->name("dashboard");

    Route::resource("user", UserController::class)->names("user");
    Route::resource("student", StudentController::class)->names("student");
    Route::resource("teacher", TeacherController::class)->names("teacher");
    Route::resource("mapel", MapelController::class)->names("mapel");
});
