<?php

namespace App\Traits\AddScout;

use App\Models\ScoutExperience;
use App\Models\Scout\Experience;

trait AddScoutExperiences
{
    public $expCount = 1;
    public $expInputs = [0];
    public $scout_experience, $scout_experience_details, $scout_experience_start_date,
        $scout_experience_end_date, $scout_experience_place;

    public function addExp()
    {
        array_push($this->expInputs, $this->expCount++);
    }

    public function removeExp($key)
    {
        unset($this->expInputs[$key]);
    }

    public function validateScoutExperiences()
    {
        foreach ($this->expInputs as $value) {
            $this->validate([
                "scout_experience." . $value => "required",
                "scout_experience_details." . $value => "required",
                "scout_experience_start_date." . $value => "required|date_format:d/m/Y",
                "scout_experience_end_date." . $value => "required|date_format:d/m/Y|after:scout_experience_start_date." . $value,
                "scout_experience_place." . $value => "required",
            ]);
        }
    }

    public function addScoutExperiences($scout_id)
    {

        foreach ($this->scout_experience as $key => $value) {

            Experience::create([
                "scout_id" => $scout_id,
                "scout_experience" => $this->scout_experience[$key],
                "scout_experience_details" => $this->scout_experience_details[$key],
                "scout_experience_start_date" => $this->scout_experience_start_date[$key],
                "scout_experience_end_date" => $this->scout_experience_end_date[$key],
                "scout_experience_place" => $this->scout_experience_place[$key],
            ]);
        }
    }
}
