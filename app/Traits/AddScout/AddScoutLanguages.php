<?php

namespace App\Traits\AddScout;

use App\Models\ScoutLanguage;
use App\Models\Scout\Language;

trait AddScoutLanguages
{
    public $langCount = 1;
    public $langInputs = [0];
    public $scout_lang, $scout_lang_level;

    public function addLanguage()
    {
        array_push($this->langInputs, $this->langCount++);
    }

    public function removeLanguage($key)
    {;
        unset($this->langInputs[$key]);
    }

    public function validateScoutLanguages()
    {
        foreach ($this->langInputs as $value) {
            $this->validate([
                "scout_lang." . $value => "required",
                "scout_lang_level." . $value => "required",
            ]);
        }
    }

    public function addScoutLanguages($scout_id){
        foreach ($this->scout_lang as $key => $value) {

            Language::create([
                "scout_id" => $scout_id,
                "scout_lang" => $this->scout_lang[$key],
                "scout_lang_level" => $this->scout_lang_level[$key],
            ]);
        }
    }
}
