<?php

use App\Http\Controllers\ChangeUserPassword;
use App\Http\Controllers\Logout;
use App\Http\Livewire\User\Login;
use App\Http\Livewire\User\Register;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Scout\Regiments;
use App\Http\Livewire\User\ChangerUserPassword;
use App\Http\Livewire\User\UserManagement;

/*
|--------------------------------------------------------------------------
| Web User
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get("/user/login", Login::class)->name("user.login")->middleware("guest");

Route::middleware(['auth'])->group(function () {
    Route::get("/user/register", Register::class)->name("user.register")->middleware("can:superUser");
    Route::get("/regiments", Regiments::class)->name("user.regiments")->middleware("can:superUser");
    Route::get("/users/management", UserManagement::class)->name("user.management")->middleware("can:superUser");
    Route::get("/users/{user_id}/change-password", ChangerUserPassword::class)->name("user.change-password");
    Route::get("/logout", [Logout::class, "index"])->name("user.logout");
});