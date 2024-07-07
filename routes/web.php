<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\{LoginController, RegisterController};
use App\Http\Controllers\{NavController, RundownController, AboutController, LocationController};
use App\Http\Controllers\Admin\{LoginAdminController, AdminController};

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect('/register');
});

Route::get('/home', function () {
    return view('welcome');
});

Route::get("/login", [LoginController::class, "index"])->name("login");
Route::post("/login/post", [LoginController::class, "login"])->name("login.post");
Route::get("/register", [RegisterController::class, "index"])->name("register");
Route::get("/change-locale/{locale}", [NavController::class, "index"])->name("change-locale");
Route::post("/registration", [RegisterController::class, "registration"])->name("registration");

Route::get("/rundown", [RundownController::class, "index"])->name("rundown");
Route::get("/location", [LocationController::class, "index"])->name("location");
Route::get("/about", [AboutController::class, "index"])->name("about");

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Admin------------
Route::get("/admin/login", [LoginAdminController::class, "index"])->name("login-admin");
Route::post("/admin/login/post", [LoginAdminController::class, "login"])->name("login-admin-post");
Route::get("/admin/dashboard", [AdminController::class, "index"])->name("admin");
Route::get("/admin/attendances", [AdminController::class, "attendances"])->name("admin/attendances");
Route::get("/admin/qr", [AdminController::class, "qr"])->name("admin/qr");
Route::get("/admin/qr/{queue}", [AdminController::class, "detail"])->name("admin/qr/detail");