<?php

namespace App\Http\Livewire\User;

use Livewire\Component;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class Login extends Component
{
    public $userName;
    public $password;
    public $remember;

    public function render()
    {
        return view('livewire.user.login')->layout('layouts.app');
    }

    protected $rules = [
        "userName" => "required",
        "password" => "required",
    ];

    public function login()
    {
        $this->validate();
        if (!Auth::attempt(array(Str::lower("user_name") => $this->userName, "password" => $this->password), $this->remember)) {
            return back()->with("faild", __("login.wrong credintianl"));
        }
        return redirect()->route("scout.search");
    }
}