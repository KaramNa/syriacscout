<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class Logout extends Controller
{
    public function index()
    {
        Auth::logout();
        return redirect()->route("user.login");
    }
}
