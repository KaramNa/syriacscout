<?php

namespace App\View\Components\AddScout;

use Illuminate\View\Component;

class Education extends Component
{
    public $educationInputs;
    public $studyYear;
    public $finishDate;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($educationInputs, $finishDate, $studyYear)
    {
        $this->educationInputs = $educationInputs;
        $this->finishDate = $finishDate;
        $this->studyYear = $studyYear;
    }


    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.add-scout.education');
    }
}
