<?php

namespace App\Traits\AddScout;

use App\Models\ScoutCurrentWork;
use App\Models\Scout\CurrentWork;

trait AddScoutCurrentWork
{
    public $curWorkCount = 1;
    public $curWorkInputs = [0];
    public $scout_current_work, $scout_current_work_details, $scout_current_work_start_date, $scout_cururent_work_place;


    public function addCurWork()
    {
        array_push($this->curWorkInputs, $this->curWorkCount++);
    }

    public function removeCurWork($key)
    {
        unset($this->curWorkInputs[$key]);
    }

    public function validateScoutCurrentWork(){
        foreach ($this->curWorkInputs as $value) {
            $this->validate([
                "scout_current_work." . $value => "required",
                "scout_current_work_details." . $value => "required",
                "scout_current_work_start_date." . $value => "required|date_format:d/m/Y",
                "scout_cururent_work_place." . $value => "required",
            ]);
        }
    }

    public function addScoutCurrentWork($scout_id){

        foreach ($this->scout_current_work as $key => $value) {

            CurrentWork::create([
                "scout_id" => $scout_id,
                "scout_current_work" => $this->scout_current_work[$key],
                "scout_current_work_details" => $this->scout_current_work_details[$key],
                "scout_current_work_start_date" => $this->scout_current_work_start_date[$key],
                "scout_cururent_work_place" => $this->scout_cururent_work_place[$key],
            ]);
        }
    }


}
