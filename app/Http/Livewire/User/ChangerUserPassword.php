<?php

namespace App\Http\Livewire\User;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class ChangerUserPassword extends Component
{
    public $user;
    public $password;
    public $password_confirmation;

    public function mount($user_id){
        $this->user = User::find($user_id);
    }

    public function render()
    {
        return view('livewire.user.changer-user-password')->layout('layouts.app');
    }

    public function changePassword(){
        $this->validate([
            "password" => [
                'required',
                'confirmed',
                Password::min(8)
                    ->mixedCase()
                    ->letters()
                    ->numbers(),
            ],
        ]);
        $this->user->password = Hash::make($this->password);
        $this->user->save();
        $this->resetFields();
        session()->flash("success", __("user.user edited"));
    }

    public function resetFields()
    {
        $this->password = "";
        $this->password_confirmation = "";
    }

}
