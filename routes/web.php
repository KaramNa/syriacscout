<?php

use App\Http\Livewire\User\Register;
use Illuminate\Support\Facades\Route;

Route::get("/", function(){
return redirect("/search");
});