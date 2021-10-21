<?php

namespace App\View\Components\AddScout;

use Illuminate\View\Component;

class CurrentWork extends Component
{
    public $curWorkInputs;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($curWorkInputs)
    {
        $this->curWorkInputs = $curWorkInputs;
    }


    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.add-scout.current-work');
    }
}
