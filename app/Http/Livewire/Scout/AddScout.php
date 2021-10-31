<?php

namespace App\Http\Livewire\Scout;

use App\Models\Regiment;
use App\Models\Scout\Education;
use Livewire\Component;
use Livewire\WithFileUploads;
use App\Traits\AddScout\AddScoutSkills;
use App\Traits\AddScout\AddScoutCourses;
use App\Traits\AddScout\AddScoutEducation;
use App\Traits\AddScout\AddScoutLanguages;
use App\Traits\AddScout\AddScoutCurrentWork;
use App\Traits\AddScout\AddScoutExperiences;
use App\Traits\AddScout\AddScoutPersonalInfos;

class AddScout extends Component
{
    use WithFileUploads;
    use AddScoutPersonalInfos;
    use AddScoutEducation;
    use AddScoutLanguages;
    use AddScoutSkills;
    use AddScoutCourses;
    use AddScoutCurrentWork;
    use AddScoutExperiences;

    public $regiments;
    public $inputFlag;
    public $eduSrch = [];

    public function mount()
    {
        if (auth()->user()->user_type === "superUser")
            $this->regiments = Regiment::get();
        else
            $this->scout_regiment = Regiment::find(auth()->user()->regiment_id)->regiment_name;
    }

    public function render()
    {
        return view('livewire.scout.add-scout')->layout("layouts.app");
    }
    public function updated($property, $text)
    {
        foreach ((array)$this->scout_education_name as $key => $value)
            if ($property === "scout_education_name." . $key) {
                $this->inputFlag = $property;
                if (strlen($text) > 0) {
                    $this->eduSrch = Education::select('scout_education_name')->where('scout_education_name', 'LIKE', '%' . $text . '%')->groupBy('scout_education_name')->get();
                } else {
                    $this->resetFilterResult();
                }
            }

        foreach ((array)$this->scout_education_place as $key => $value)
            if ($property === "scout_education_place." . $key) {
                $this->inputFlag = $property;
                if (strlen($text) > 0) {
                    $this->eduSrch = Education::select('scout_education_place')->where('scout_education_place', 'LIKE', '%' . $text . '%')->groupBy('scout_education_place')->get();
                } else {
                    $this->resetFilterResult();
                }
            }
    }

    public function resetFilterResult()
    {
        $this->eduSrch = [];
    }

    public function chooseValue($key, $value, $property)
    {
        if ($property === "scout_education_place." . $key)
            $this->scout_education_place[$key] = $value;
        elseif ($property === "scout_education_name." . $key)
            $this->scout_education_name[$key] = $value;
        $this->eduSrch = [];
    }

    public $totalSteps = 7;
    public $currentStep = 1;

    public function validateScoutData()
    {
        if ($this->currentStep == 1) {
            $this->validateScoutPersonalEducation();
        }
        if ($this->currentStep == 2) {
            $this->validateScoutEducation();
        }
        if ($this->currentStep == 3) {
            $this->validateScoutLanguages();
        }
        if ($this->currentStep == 4) {
            $this->validateScoutSkills();
        }
        if ($this->currentStep == 5) {
            $this->validateScoutCourses();
        }
        if ($this->currentStep == 6) {
            $this->validateScoutCourses();
        }
    }

    public function decreaseStep()
    {
        $this->currentStep--;
    }

    public function increaseStep()
    {
        $this->resetErrorBag();
        $this->resetValidation();
        $this->validateScoutData();
        $this->currentStep++;
        if ($this->currentStep > $this->totalSteps) {
            $this->currentStep = $this->totalSteps;
        }
    }

    public function addScout()
    {
        $this->resetErrorBag();
        if ($this->currentStep == 7) {
            $this->validateScoutExperiences();
        }

        $scout_id = $this->addScoutPersonalInfos();

        if (!empty($this->scout_education_pace)) {
            $this->addScoutEducation($scout_id);
        }
        if (!empty($this->scout_lang)) {
            $this->addScoutLanguages($scout_id);
        }
        if (!empty($this->scout_skill_name)) {
            $this->addScoutSkills($scout_id);
        }
        if (!empty($this->scout_course)) {
            $this->addScoutCourses($scout_id);
        }
        if (!empty($this->scout_current_work)) {
            $this->addScoutCurrentWork($scout_id);
        }
        if (!empty($this->scout_experience)) {
            $this->addScoutExperiences($scout_id);
        }
        session()->flash('success', 'تمت اضافة  كشاف جديد بنجاح');
        return redirect()->to("/");
    }
}
