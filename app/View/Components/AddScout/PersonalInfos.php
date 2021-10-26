<?php

namespace App\View\Components\AddScout;

use Illuminate\View\Component;

class PersonalInfos extends Component
{
    public $scoutProfilePicture;
    public $regiments;
    public $fileName;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($scoutProfilePicture, $regiments, $fileName)
    {
        $this->scoutProfilePicture = $scoutProfilePicture;
        $this->regiments = $regiments;
        $this->fileName = $fileName;
    }


    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.add-scout.personal-infos');
    }
}