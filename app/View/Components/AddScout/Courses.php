<?php

namespace App\View\Components\AddScout;

use Illuminate\View\Component;

class Courses extends Component
{
    public $courseInputs;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($courseInputs)
    {
        $this->courseInputs = $courseInputs;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.add-scout.courses');
    }
}
