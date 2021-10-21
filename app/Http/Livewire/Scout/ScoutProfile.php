<?php

namespace App\Http\Livewire\Scout;

use Livewire\Component;
use App\Models\Scout\PersonalInfo;

class ScoutProfile extends Component
{
    public $current_section = 1;
    public $scout;
    public $scoutId;
    public $scout_profile_picture;
    public $scout_first_name;
    public $scout_last_name;
    public $regiment_name;
    public $edit_scout_permission = false;

    public function mount($scoutId)
    {
        $this->scoutId = $scoutId;
        $this->scout = PersonalInfo::with("regiment")->find($scoutId);
        if (!$this->scout)
            abort(404);
        $this->scout_profile_picture = $this->scout->scout_profile_picture;
        $this->scout_first_name = $this->scout->scout_first_name;
        $this->scout_last_name = $this->scout->scout_last_name;
        $this->regiment_name = $this->scout->regiment->regiment_name;
        if ((auth()->user()->user_type === "admin" && auth()->user()->regiment_id === $this->scout->regiment_id) || auth()->user()->user_type === "superUser") {
            $this->edit_scout_permission = true;
        }
    }

    public function setCurrentSection($value)
    {
        $this->current_section = $value;
    }

    public function render()
    {
        return view('livewire.scout.scout-profile')->layout('layouts.app');
    }
}