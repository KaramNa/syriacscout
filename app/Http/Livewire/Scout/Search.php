<?php

namespace App\Http\Livewire\Scout;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Scout\PersonalInfo;

class Search extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public function render()
    {
        return view('livewire.scout.search')->layout("layouts.app");
    }
}