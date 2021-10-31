<?php

namespace App\Http\Livewire\Scout;

use App\Models\Scout\Education;
use Livewire\Component;

class ManageEducation extends Component
{
    public $scoutId;
    public $education;
    public $scoutEducation;
    public $educationYear;
    public $finish_check;
    public $finishDate = true;
    public $studyYear = false;

    public $scout_education_pace,
        $scout_education_name,
        $scout_education_start_date,
        $scout_education_end_date,
        $scout_education_year,
        $scout_education_place;
    public $edit_scout_permission;

    public $eduSrch = [];
    public $inputFlag;


    public function mount()
    {
        $this->getEducations();
    }

    public function render()
    {
        return view('livewire.scout.manage-education');
    }

    public function getEducations()
    {
        $this->educationYear = [];
        $this->scoutEducation = Education::where("scout_id", $this->scoutId)->get();
        foreach ($this->scoutEducation as $education) {
            if ($education->scout_education_year == "") {
                array_push($this->educationYear, "خريج " . $education->scout_education_end_date);
            } else {
                array_push($this->educationYear, $education->scout_education_year);
            }
        }
    }
    public function reset_fields()
    {
        $this->resetErrorBag();
        $this->reset("scout_education_pace");
        $this->reset("scout_education_name");
        $this->reset("scout_education_start_date");
        $this->reset("scout_education_end_date");
        $this->reset("scout_education_year");
        $this->reset("scout_education_place");
        $this->resetFilterResult();

    }

    public function updatedFinishCheck()
    {
        if ($this->finish_check) {
            $this->scout_education_year = "";
            $this->studyYear = true;
            $this->finishDate = false;
        } else {
            $this->scout_education_end_date = "";
            $this->studyYear = false;
            $this->finishDate = true;
        }
    }

    public function rules()
    {
        if (!$this->finishDate) {
            return [
                "scout_education_pace" => "required",
                "scout_education_name" => "required",
                "scout_education_start_date" => "required|date_format:d/m/Y",
                "scout_education_place" => "required",
                "scout_education_end_date" => "required|date_format:d/m/Y|after:scout_education_start_date",
            ];
        } else {
            return [
                "scout_education_pace" => "required",
                "scout_education_name" => "required",
                "scout_education_start_date" => "required|date_format:d/m/Y",
                "scout_education_place" => "required",
                "scout_education_year" => "required",

            ];
        }
    }

    public function updateDelete($education_id, $action)
    {
        $this->education = Education::find($education_id);
        if ($action == 'update') {
            $this->resetErrorBag();
            $this->dispatchBrowserEvent('openUpdateModal');
            $this->scout_education_pace = $this->education->scout_education_pace;
            $this->scout_education_name = $this->education->scout_education_name;
            $this->scout_education_start_date = $this->education->scout_education_start_date;
            $this->scout_education_end_date = $this->education->scout_education_end_date;
            $this->scout_education_year = $this->education->scout_education_year;
            $this->scout_education_place = $this->education->scout_education_place;
            if ($this->education->scout_education_year === "") {
                $this->studyYear = true;
                $this->finishDate = false;
                $this->finish_check = true;
            } else {
                $this->studyYear = false;
                $this->finishDate = true;
            }
        } else {
            $this->dispatchBrowserEvent('openDeleteModal');
        }
    }

    public function addScoutEducation()
    {
        $this->validate();

        if (!$this->finishDate) {
            $this->scout_education_year = "";
        } else {
            $this->scout_education_end_date = "";
        }

        $edu = Education::create([
            "scout_id" => $this->scoutId,
            "scout_education_pace" => $this->scout_education_pace,
            "scout_education_name" => $this->scout_education_name,
            "scout_education_start_date" => $this->scout_education_start_date,
            "scout_education_end_date" => $this->scout_education_end_date,
            "scout_education_year" => $this->scout_education_year,
            "scout_education_place" => $this->scout_education_place,
        ]);

        if ($edu) {
            session()->flash("succeed", "تم إضافة درجة علمية جديدة بنجاح");
            $this->getEducations();
        } else {
            session()->flash("failed", "حدث خطأ ما, الرجاء المحاولة مجدداً");
        }
        $this->reset_fields();
        $this->dispatchBrowserEvent("CloseModal");
    }

    public function deleteScoutEducation()
    {
        if ($this->education) {
            session()->flash("succeed", "تم حذف الدرجة العلمية بنجاح");
            $this->education->delete();
            $this->getEducations();
        } else {
            session()->flash("failed", "حدث خطأ ما, الرجاء المحاولة مجدداً");
        }
        $this->dispatchBrowserEvent("CloseModal");
    }

    public function updateScoutEducation()
    {
        $this->validate();

        if (!$this->finishDate) {
            $this->scout_education_year = "";
        } else {
            $this->scout_education_end_date = "";
        }

        if ($this->education) {
            $this->education->update([
                "scout_education_pace" => $this->scout_education_pace,
                "scout_education_name" => $this->scout_education_name,
                "scout_education_start_date" => $this->scout_education_start_date,
                "scout_education_end_date" => $this->scout_education_end_date,
                "scout_education_year" => $this->scout_education_year,
                "scout_education_place" => $this->scout_education_place,
            ]);
            session()->flash("succeed", "تم تعديل الدرجة العلمية بنجاح");
            $this->getEducations();
        } else {
            session()->flash("failed", "حدث خطأ ما, الرجاء المحاولة مجدداً");
        }
        $this->dispatchBrowserEvent("CloseModal");
    }

    public function chooseValue($value, $property)
    {
        if ($property === "scout_education_place")
            $this->scout_education_place = $value;
        elseif ($property === "scout_education_name")
            $this->scout_education_name = $value;
        $this->eduSrch = [];
    }

    public function resetFilterResult()
    {
        $this->eduSrch = [];
    }

    public function updated($property, $text)
    {
            if ($property === "scout_education_name") {
                $this->inputFlag = $property;
                if (strlen($text) > 0) {
                    $this->eduSrch = Education::select('scout_education_name')->where('scout_education_name', 'LIKE', '%' . $text . '%')->groupBy('scout_education_name')->get();
                } else {
                    $this->resetFilterResult();
                }
            }

            if ($property === "scout_education_place") {
                $this->inputFlag = $property;
                if (strlen($text) > 0) {
                    $this->eduSrch = Education::select('scout_education_place')->where('scout_education_place', 'LIKE', '%' . $text . '%')->groupBy('scout_education_place')->get();
                } else {
                    $this->resetFilterResult();
                }
            }
    }
}