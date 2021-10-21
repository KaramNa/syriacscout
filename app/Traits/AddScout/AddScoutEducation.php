<?php

namespace App\Traits\AddScout;

use App\Models\Scout\Education;

trait AddScoutEducation
{
    public $finish_check;
    public $finishDate = [true];
    public $studyYear = [false];
    public $eduCount = 1;
    public $educationInputs = [0];

    public $scout_education_pace,
        $scout_education_name,
        $scout_education_start_date,
        $scout_education_end_date,
        $scout_education_year,
        $scout_education_place;

    public function validateScoutEducation()
    {
        foreach ($this->educationInputs as $key => $value) {
            $this->validate([
                "scout_education_pace." . $value => "required",
                "scout_education_name." . $value => "required",
                "scout_education_start_date." . $value => "required|date_format:d/m/Y",
                "scout_education_place." . $value => "required",
            ]);
            if (!$this->finishDate[$key]) {
                $this->validate([
                    "scout_education_end_date." . $value => "required|date_format:d/m/Y|after:scout_education_start_date." . $value,
                ]);
            } else {
                $this->validate([
                    "scout_education_year." . $value => "required",
                ]);
            }
        }
    }
    public function addEdu()
    {
        array_push($this->studyYear, false);
        array_push($this->finishDate, true);
        array_push($this->educationInputs, $this->eduCount++);
    }

    public function removeEdu($key)
    {
        unset($this->studyYear[$key]);
        unset($this->finishDate[$key]);
        unset($this->finish_check[$key]);
        unset($this->educationInputs[$key]);
        $this->eduCount = count($this->educationInputs);
    }

    public function updatedFinishCheck()
    {
        foreach ($this->finish_check as $key => $value) {
            if ($this->finish_check[$key]) {
                $this->scout_education_year[$key] = "";
                $this->studyYear[$key] = true;
                $this->finishDate[$key] = false;
            } else {
                $this->scout_education_end_date[$key] = "";
                $this->studyYear[$key] = false;
                $this->finishDate[$key] = true;
            }
        }
    }

    public function addScoutEducation($scout_id){
        foreach ($this->scout_education_pace as $key => $value) {
            if (!$this->finishDate[$key]) {
                $this->scout_education_year[$key] = "";
            } else {
                $this->scout_education_end_date[$key] = "";
            }
            Education::create([
                "scout_id" => $scout_id,
                "scout_education_pace" => $this->scout_education_pace[$key],
                "scout_education_name" => $this->scout_education_name[$key],
                "scout_education_start_date" => $this->scout_education_start_date[$key],
                "scout_education_end_date" => $this->scout_education_end_date[$key],
                "scout_education_year" => $this->scout_education_year[$key],
                "scout_education_place" => $this->scout_education_place[$key],
            ]);
        }
    }
}
