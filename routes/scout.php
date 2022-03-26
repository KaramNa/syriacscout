<?php

use App\Http\Livewire\Scout\AddScout;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Scout\ScoutProfile;
use App\Http\Livewire\Scout\Search;

/*
|--------------------------------------------------------------------------
| Web Scouts
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get("/scoutprofile/{scoutId}", ScoutProfile::class)->name("scout.profile")->middleware('sameRegiment');
Route::middleware(['auth'])->group(function () {
    Route::get("/addscout", AddScout::class)->name("scout.add")->middleware("can:SupeUser-admin");
    Route::get("/search", Search::class)->name("scout.search");
});