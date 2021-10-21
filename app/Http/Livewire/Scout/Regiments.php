<?php

namespace App\Http\Livewire\Scout;

use App\Models\Regiment;
use Livewire\Component;

class Regiments extends Component
{
    public $regiment_name;
    public $update_regiment_name;
    public $regiments;
    public $regiment_new_name;
    public $regiment_to_edit;

    public function render()
    {
        $this->regiments = Regiment::get();
        return view('livewire.scout.regiments')->layout("layouts.app");
    }

    public function editDelete($regiment_id, $action)
    {
        $this->regiment_to_edit = Regiment::find($regiment_id);
        if (!$this->regiment_to_edit) {
            session()->flash("status", __("regiments.regiment not found"));
            $this->dispatchBrowserEvent("CloseModal");
        }

        if ($action == 'delete') {
            $this->dispatchBrowserEvent('openDeleteModal');
        } else {
            $this->dispatchBrowserEvent('openUpdateModal');
            $this->regiment_new_name = $this->regiment_to_edit->regiment_name;
        }
    }

    public function store_regiment()
    {
        $this->validate([
            "regiment_name" => "required|unique:regiments",
        ]);
        Regiment::create([
            "regiment_name" => $this->regiment_name,
        ]);
        $this->regiment_name = "";
        session()->flash("status", __("regiments.regiment added"));
    }

    public function edit_regiment()
    {
        $this->validate([
            "regiment_new_name" => "required|unique:regiments,regiment_name",
        ]);

        $this->regiment_to_edit->regiment_name = $this->regiment_new_name;
        $this->regiment_to_edit->save();
        session()->flash("status", __("regiments.regiment edited"));
        $this->dispatchBrowserEvent("CloseModal");
    }

    public function deleteRegiment()
    {
        $this->regiment_to_edit->delete();
        session()->flash("status", __("regiments.regiment deleted"));
        $this->dispatchBrowserEvent("CloseModal");
    }
}
