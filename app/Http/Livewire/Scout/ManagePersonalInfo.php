<?php

namespace App\Http\Livewire\Scout;

use Carbon\Carbon;
use Livewire\Component;
use App\Models\Regiment;
use Livewire\WithFileUploads;
use App\Traits\AddScout\AddScoutPersonalInfos;

class ManagePersonalInfo extends Component
{
    use AddScoutPersonalInfos;
    use WithFileUploads;
    public $scout;
    public $regiment_name;
    public $age;
    public $regiments;
    public $edit_scout_permission;
    public function mount()
    {
        $this->init();
    }

    public function render()
    {
        return view('livewire.scout.manage-personal-info');
    }

    public function init()
    {
        $birthdate = new Carbon(Carbon::createFromFormat('d/m/Y', $this->scout->scout_birthdate)->format('d-m-Y'));
        $this->age = $birthdate->diff(Carbon::now())->y;
        $this->regiment_name = $this->scout->regiment->regiment_name;
    }

    public function editScoutPersonalInfo()
    {
        $this->resetErrorBag();
        $this->fileName = $this->scout->scout_profile_picture;
        $this->scout_first_name = $this->scout->scout_first_name;
        $this->scout_last_name = $this->scout->scout_last_name;
        $this->scout_father_name = $this->scout->scout_father_name;
        $this->scout_mother_name = $this->scout->scout_mother_name;
        $this->scout_national_no = $this->scout->scout_national_no;
        $this->scout_birthdate = $this->scout->scout_birthdate;
        $this->scout_email = $this->scout->scout_email;
        $this->scout_mobile_phone = $this->scout->scout_mobile_phone;
        $this->scout_home_phone = $this->scout->scout_home_phone;
        $this->scout_name_en = $this->scout->scout_name_en;
        $this->scout_gender = $this->scout->scout_gender;
        $this->scout_marital_status = $this->scout->scout_marital_status;
        $this->scout_no_of_children = $this->scout->scout_no_of_children;
        $this->scout_address = $this->scout->scout_address;
        $this->scout_government = $this->scout->scout_government;
        $this->scout_number = $this->scout->scout_number;
        $this->scout_city = $this->scout->scout_city;
        $this->scout_affiliation_date = $this->scout->scout_affiliation_date;
        $this->scout_title = $this->scout->scout_title;

        if (auth()->user()->user_type == "admin")
            $this->scout_regiment = $this->scout->regiment->regiment_name;

        elseif (auth()->user()->user_type == "superUser") {
            $this->regiments = Regiment::get();
            $this->scout_regiment = $this->scout->regiment->id;
        }
    }

    public function updateScoutPersonalInfo()
    {
        $this->validate();
        if (auth()->user()->user_type == "admin")
            $this->scout_regiment = auth()->user()->scout_regiment;
        $updated = $this->scout->update([
            "scout_profile_picture" => $this->fileName,
            "scout_first_name" => $this->scout_first_name,
            "scout_last_name" => $this->scout_last_name,
            "scout_father_name" => $this->scout_father_name,
            "scout_mother_name" => $this->scout_mother_name,
            "scout_national_no" => $this->scout_national_no,
            "scout_birthdate" => $this->scout_birthdate,
            "scout_number" => $this->scout_number,
            "scout_affiliation_date" => $this->scout_affiliation_date,
            "scout_title" => $this->scout_title,
            "scout_home_phone" => $this->scout_home_phone,
            "scout_mobile_phone" => $this->scout_mobile_phone,
            "scout_email" => $this->scout_email,
            "scout_name_en" => $this->scout_name_en,
            "scout_gender" => $this->scout_gender,
            "scout_marital_status" => $this->scout_marital_status,
            "scout_no_of_children" => $this->scout_no_of_children,
            "scout_address" => $this->scout_address,
            "scout_government" => $this->scout_government,
            "scout_city" => $this->scout_city,
            "regiment_id" => $this->scout_regiment,
        ]);
        if ($updated) {
            session()->flash("update_succeed", "تم تعديل معلومات الكشاف بنجاح");
        } else {
            session()->flash("update_failed", "حدث خطأ ما, الرجاء المحاولة مجدداً");
        }
        $this->dispatchBrowserEvent("CloseModal");
        return redirect(request()->header("Referer"));
    }
}