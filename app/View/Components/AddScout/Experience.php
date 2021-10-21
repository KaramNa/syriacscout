<?php

namespace App\View\Components\AddScout;

use Illuminate\View\Component;

class Experience extends Component
{
    
    public $expInputs;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($expInputs)
    {
        $this->expInputs = $expInputs;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.add-scout.experience');
    }
}
