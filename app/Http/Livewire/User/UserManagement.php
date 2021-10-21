<?php

namespace App\Http\Livewire\User;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class UserManagement extends Component
{
    public $users;
    public $user_to_edit;
    public $newPassword_confirmation;
    public $newPassword;


    public function render()
    {
        $this->users = User::with("regiment")->get()->sortBy("user_type");
        return view('livewire.user.user-management')->layout("layouts.app");
    }

    public function editDelete($user_id, $action, $regimentKey = "")
    {
        $this->user_to_edit = User::find($user_id);
        $this->regimentKey = $regimentKey;
        if (!$this->user_to_edit) {
            session()->flash("status", __("user.user not found"));
            $this->dispatchBrowserEvent("CloseModal");
        }
        if ($action == "edit") {
            $this->dispatchBrowserEvent("openUpdateModal");
        } else {
            $this->dispatchBrowserEvent("openDeleteModal");
        }
    }

    public function deleteUser()
    {
        $this->user_to_edit->delete();
        session()->flash("status", __("user.user deleted"));
        $this->dispatchBrowserEvent("CloseModal");
    }

    public function editPassword()
    {
        $this->validate([
            "newPassword" => [
                'required',
                'confirmed',
                Password::min(8)
                    ->mixedCase()
                    ->letters()
                    ->numbers(),
            ],
            "newPassword_confirmation" => "required",
        ]);
        $this->user_to_edit->password = Hash::make($this->newPassword);
        $this->user_to_edit->save();
        session()->flash("status", __("user.user edited"));
        $this->resetValues();
        $this->dispatchBrowserEvent("CloseModal");
    }

    public function resetValues()
    {
        $this->newPassword = "";
        $this->newPassword_confirmation = "";
    }
}
