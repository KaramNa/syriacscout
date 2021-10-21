<?php

namespace App\View\Components\AddScout;

use Illuminate\View\Component;

class Languages extends Component
{
    public $langInputs = [];
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($langInputs)
    {
        $this->langInputs = $langInputs;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.add-scout.languages');
    }
}
