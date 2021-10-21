<?php

namespace App\Http\Livewire\Scout;

use Livewire\Component;
use App\Models\Scout\Skill;

class ManageSkills extends Component
{
    public $scoutSkills;
    public $scoutId;
    public $skill;
    public $scout_skill_name, $scout_skill_details;
    public $edit_scout_permission;

    public function mount()
    {
        $this->getSkills();
    }

    public function render()
    {
        return view('livewire.scout.manage-skills');
    }

    public function getSkills()
    {
        $this->scoutSkills = Skill::where("scout_id", $this->scoutId)->get();
    }

    public function reset_fields()
    {
        $this->reset("scout_skill_name");
        $this->reset("scout_skill_details");
    }

    public function addScoutSkill()
    {
        $this->validate([
            "scout_skill_name" => "required",
            "scout_skill_details" => "required",
        ]);

        $skill = Skill::create([
            "scout_id" => $this->scoutId,
            "scout_skill_name" => $this->scout_skill_name,
            "scout_skill_details" => $this->scout_skill_details,
        ]);

        if ($skill) {
            session()->flash("succeed", "تم إضافة مهارة جديدة بنجاح");
            $this->getSkills();
        } else {
            session()->flash("failed", "حدث خطأ ما, الرجاء المحاولة مجدداً");
        }
        $this->reset_fields();
        $this->dispatchBrowserEvent("CloseModal");
    }

    public function updateDelete($skill_id, $action)
    {
        $this->skill = Skill::find($skill_id);
        if ($action == 'delete') {
            $this->dispatchBrowserEvent('openDeleteModal');
        } else {
            $this->dispatchBrowserEvent('openUpdateModal');
            $this->scout_skill_name = $this->skill->scout_skill_name;
            $this->scout_skill_details = $this->skill->scout_skill_details;
        }
    }

    public function deleteScoutSkill()
    {
        if ($this->skill) {
            session()->flash("succeed", "تم حذف المهارة بنجاح");
            $this->skill->delete();
            $this->getSkills();
        } else {
            session()->flash("failed", "حدث خطأ ما, الرجاء المحاولة مجدداً");
        }
        $this->dispatchBrowserEvent("CloseModal");
    }

    public function updateScoutSkill()
    {
        $this->validate([
            "scout_skill_name" => "required",
            "scout_skill_details" => "required",
        ]);
        if ($this->skill) {
            $this->skill->update(["scout_skill_name" => $this->scout_skill_name, "scout_skill_details" => $this->scout_skill_details]);
            session()->flash("succeed", "تم تعديل المهارة بنجاح");
            $this->getSkills();
        } else {
            session()->flash("failed", "حدث خطأ ما, الرجاء المحاولة مجدداً");
        }
        $this->dispatchBrowserEvent("CloseModal");
    }
}