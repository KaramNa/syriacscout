<?php

namespace App\Traits\AddScout;

use App\Models\ScoutSkill;
use App\Models\Scout\Skill;

trait AddScoutSkills
{
    public $skillCount = 1;
    public $skillInputs = [0];
    public $scout_skill_name, $scout_skill_details;

    public function addSkill()
    {
        array_push($this->skillInputs, $this->skillCount++);
    }

    public function removeSkill($key)
    {
        unset($this->skillInputs[$key]);
    }

    public function validateScoutSkills(){
        foreach ($this->skillInputs as $value) {
            $this->validate([
                "scout_skill_name." . $value => "required",
                "scout_skill_details." . $value => "required",
            ]);
        }
    }

    public function addScoutSkills($scout_id){

        foreach ($this->scout_skill_name as $key => $value) {

            Skill::create([
                "scout_id" => $scout_id,
                "scout_skill_name" => $this->scout_skill_name[$key],
                "scout_skill_details" => $this->scout_skill_details[$key],
            ]);
        }
    }
}
