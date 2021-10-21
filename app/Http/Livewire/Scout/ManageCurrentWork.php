<?php

namespace App\Http\Livewire\Scout;

use Livewire\Component;
use App\Models\Scout\CurrentWork;

class ManageCurrentWork extends Component
{
    public $scoutId;
    public $scoutCurrentWork;
    public $currentWork;
    public $scout_current_work;
    public $scout_current_work_details;
    public $scout_current_work_start_date;
    public $scout_cururent_work_place;
    public $edit_scout_permission;


    public function mount()
    {
        $this->getCurrentWork();
    }
    public function render()
    {
        return view('livewire.scout.manage-current-work');
    }

    public function getCurrentWork()
    {
        $this->scoutCurrentWork = CurrentWork::where("scout_id", $this->scoutId)->get();
    }
    public function reset_fields()
    {
        $this->resetErrorBag();
        $this->reset("scout_current_work");
        $this->reset("scout_current_work_details");
        $this->reset("scout_current_work_start_date");
        $this->reset("scout_cururent_work_place");
    }

    public function updateDelete($current_work_id, $action)
    {
        $this->currentWork = CurrentWork::find($current_work_id);
        if ($action == 'update') {
            $this->resetErrorBag();
            $this->dispatchBrowserEvent('openUpdateModal');
            $this->scout_current_work = $this->currentWork->scout_current_work;
            $this->scout_current_work_details = $this->currentWork->scout_current_work_details;
            $this->scout_current_work_start_date = $this->currentWork->scout_current_work_start_date;
            $this->scout_cururent_work_place = $this->currentWork->scout_cururent_work_place;
        } else {
            $this->dispatchBrowserEvent('openDeleteModal');
        }
    }

    protected $rules = [
        "scout_current_work"            => "required",
        "scout_current_work_details"    => "required",
        "scout_current_work_start_date" => "required|date_format:d/m/Y",
        "scout_cururent_work_place"     => "required",
    ];

    public function addScoutCurrentWork()
    {
        $this->validate();
        $work = CurrentWork::create([
            "scout_id" => $this->scoutId,
            "scout_current_work" => $this->scout_current_work,
            "scout_current_work_details" => $this->scout_current_work_details,
            "scout_current_work_start_date" => $this->scout_current_work_start_date,
            "scout_cururent_work_place" => $this->scout_cururent_work_place,
        ]);

        if ($work) {
            session()->flash("succeed", "تم إضافة عمل جديد بنجاح");
            $this->getCurrentWork();
        } else {
            session()->flash("failed", "حدث خطأ ما, الرجاء المحاولة مجدداً");
        }
        $this->reset_fields();
        $this->dispatchBrowserEvent("CloseModal");
    }

    public function deleteScoutCurrentWork()
    {
        if ($this->currentWork) {
            session()->flash("succeed", "تم حذف العمل بنجاح");
            $this->currentWork->delete();
            $this->getCurrentWork();
        } else {
            session()->flash("failed", "حدث خطأ ما, الرجاء المحاولة مجدداً");
        }
        $this->dispatchBrowserEvent("CloseModal");
    }

    public function updateScoutCurrentWork()
    {
        $this->validate();

        if ($this->currentWork) {
            $this->currentWork->update([
                "scout_current_work" => $this->scout_current_work,
                "scout_current_work_details" => $this->scout_current_work_details,
                "scout_current_work_start_date" => $this->scout_current_work_start_date,
                "scout_cururent_work_place" => $this->scout_cururent_work_place,
            ]);
            session()->flash("succeed", "تم تعديل العمل بنجاح");
            $this->getCurrentWork();
        } else {
            session()->flash("failed", "حدث خطأ ما, الرجاء المحاولة مجدداً");
        }
        $this->dispatchBrowserEvent("CloseModal");
    }
}