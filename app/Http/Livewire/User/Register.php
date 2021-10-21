<?php

namespace App\Http\Livewire\User;

use App\Models\User;
use Livewire\Component;
use App\Models\Regiment;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class Register extends Component
{
    public $regiments;
    public $user_type;
    public $user_name;
    public $password;
    public $password_confirmation;
    public $user_regiment;
    public $choose_regiment = false;

    public function render()
    {
        return view('livewire.user.register')->layout('layouts.app');
    }

    public function updated($field)
    {
        if ($field == "user_type") {
            if ($this->user_type == "admin") {
                $this->regiments = Regiment::get();
                $this->choose_regiment = true;
            } else {
                $this->choose_regiment = false;
                $this->user_regiment = null;
            }
        }
    }

    public function store()
    {
        $this->validate();
        if (
            User::create([
                'user_name' => Str::lower($this->user_name),
                'password' => Hash::make($this->password),
                'user_type' => $this->user_type,
                'regiment_id' => $this->user_regiment,
            ])
        ) {
            $this->resetFields();
            return back()->with('success', __("register.new user added"));
        }
    }

    protected function rules()
    {
        if ($this->choose_regiment) {
            return [
                "user_name" => "required|unique:users,user_name",
                "user_type" => "required",
                "password" => "required|confirmed",
                "password_confirmation" => "required",
                "user_regiment" => "required",
            ];
        } else {
            return [
                "user_name" => "required|unique:users,user_name",
                "user_type" => "required",
                "password" => "required|confirmed",
                "password_confirmation" => "required",
            ];
        }
    }

    public function resetFields()
    {
        $this->user_name = "";
        $this->password = "";
        $this->password_confirmation = "";
        $this->user_type = "";
        $this->user_regiment = "";
        $this->choose_regiment = false;
    }
}