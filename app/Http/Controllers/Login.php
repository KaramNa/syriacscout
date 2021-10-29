<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class Login extends Controller
{
    public function index(){
        return view("livewire.user.login");
    }

    protected $rules = [
        "userName" => "required",
        "password" => "required",
        'g-recaptcha-response' => 'required|captcha'
    ];

    public function login(Request $request)
    {
        request()->validate($this->rules);
        if (!Auth::attempt(array(Str::lower("user_name") => $request->userName, "password" => $request->password), $request->remember)) {
            return back()->with("faild", __("login.wrong credintianl"));
        }
        return redirect()->route("scout.search");
    }
}
