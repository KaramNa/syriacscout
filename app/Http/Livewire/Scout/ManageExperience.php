<?php

namespace App\Http\Livewire\Scout;

use Livewire\Component;
use App\Models\Scout\Experience;

class ManageExperience extends Component
{
    public $scoutId;
    public $scoutExperience;
    public $experience;
    public $scout_experience;
    public $scout_experience_details;
    public $scout_experience_start_date;
    public $scout_experience_end_date;
    public $scout_experience_place;
    public $edit_scout_permission;


    public function mount()
    {
        $this->getExperinces();
    }
    public function render()
    {
        return view('livewire.scout.manage-experience');
    }

    public function getExperinces()
    {
        $this->scoutExperience = Experience::where("scout_id", $this->scoutId)->get();
    }
    public function reset_fields()
    {
        $this->resetErrorBag();
        $this->reset("scout_experience");
        $this->reset("scout_experience_details");
        $this->reset("scout_experience_start_date");
        $this->reset("scout_experience_end_date");
        $this->reset("scout_experience_place");
    }

    public function updateDelete($experience_id, $action)
    {
        $this->experience = Experience::find($experience_id);
        if ($action == 'update') {
            $this->resetErrorBag();
            $this->dispatchBrowserEvent('openUpdateModal');
            $this->scout_experience = $this->experience->scout_experience;
            $this->scout_experience_details = $this->experience->scout_experience_details;
            $this->scout_experience_start_date = $this->experience->scout_experience_start_date;
            $this->scout_experience_end_date = $this->experience->scout_experience_end_date;
            $this->scout_experience_place = $this->experience->scout_experience_place;
        } else {
            $this->dispatchBrowserEvent('openDeleteModal');
        }
    }

    protected $rules =
    [
        "scout_experience"              => "required",
        "scout_experience_details"      => "required",
        "scout_experience_start_date"   => "required|date_format:d/m/Y",
        "scout_experience_end_date"     => "required|date_format:d/m/Y|after:scout_experience_start_date",
        "scout_experience_place"        => "required",
    ];

    public function addScoutExperience()
    {
        $this->validate();
        $exp = Experience::create([
            "scout_id" => $this->scoutId,
            "scout_experience" => $this->scout_experience,
            "scout_experience_details" => $this->scout_experience_details,
            "scout_experience_start_date" => $this->scout_experience_start_date,
            "scout_experience_end_date" => $this->scout_experience_end_date,
            "scout_experience_place" => $this->scout_experience_place,
        ]);

        if ($exp) {
            session()->flash("succeed", "تم إضافة خبرة جديدة بنجاح");
            $this->getExperinces();
        } else {
            session()->flash("failed", "حدث خطأ ما, الرجاء المحاولة مجدداً");
        }
        $this->reset_fields();
        $this->dispatchBrowserEvent("CloseModal");
    }

    public function deleteScoutExperience()
    {
        if ($this->experience) {
            session()->flash("succeed", "تم حذف الخبرة بنجاح");
            $this->experience->delete();
            $this->getExperinces();
        } else {
            session()->flash("failed", "حدث خطأ ما, الرجاء المحاولة مجدداً");
        }
        $this->dispatchBrowserEvent("CloseModal");
    }

    public function updateScoutExperience()
    {
        $this->validate();

        if ($this->experience) {
            $this->experience->update([
                "scout_experience" => $this->scout_experience,
                "scout_experience_details" => $this->scout_experience_details,
                "scout_experience_start_date" => $this->scout_experience_start_date,
                "scout_experience_end_date" => $this->scout_experience_end_date,
                "scout_experience_place" => $this->scout_experience_place,
            ]);
            session()->flash("succeed", "تم تعديل الخبرة بنجاح");
            $this->getExperinces();
        } else {
            session()->flash("failed", "حدث خطأ ما, الرجاء المحاولة مجدداً");
        }
        $this->dispatchBrowserEvent("CloseModal");
    }
}