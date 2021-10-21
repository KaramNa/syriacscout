<?php

namespace App\Traits\AddScout;

use App\Models\Scout\PersonalInfo;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;


trait AddScoutPersonalInfos
{
    public $scout_id, $scout_first_name, $scout_last_name, $scout_father_name,
        $scout_mother_name, $scout_national_no, $scout_birthdate, $scout_number,
        $scout_affiliation_date, $scout_title, $scout_email, $scout_mobile_phone,
        $scout_home_phone, $scout_name_en, $scout_gender,
        $scout_marital_status, $scout_no_of_children, $scout_address,
        $scout_regiment, $scout_government, $scout_city;

    public $fileName = "avatar.jpg", $scoutProfilePicture;

    protected $rules = [
        "scout_first_name" => ["required", "regex:/^[a-zA-Z\s]|[\p{Arabic}\s]+$/u"],
        "scout_last_name" => ["required", "regex:/^[a-zA-Z\s]|[\p{Arabic}\s]+$/u"],
        "scout_father_name" => ["required", "regex:/^[a-zA-Z\s]|[\p{Arabic}\s]+$/u"],
        "scout_mother_name" => ["required", "regex:/^[a-zA-Z\s]|[\p{Arabic}\s]+$/u"],
        "scout_national_no" => "required|numeric",
        "scout_birthdate" => "required|date_format:d/m/Y",
        "scout_number" => "required|numeric",
        "scout_affiliation_date" => "required|date_format:d/m/Y",
        "scout_title" => "required",
        "scout_email" => "required|email",
        "scout_mobile_phone" => "required|numeric",
        "scout_home_phone" => "required|numeric",
        "scout_name_en" => "required|regex:/^[a-zA-Z\s]+$/u",
        "scout_gender" => "required",
        "scout_marital_status" => "required",
        "scout_no_of_children" => "required|numeric",
        "scout_address" => "required",
        "scout_regiment" => "required",
        "scout_government" => "required",
        "scout_city" => ["required", "regex:/^[a-zA-Z\s]|[\p{Arabic}\s]+$/u"],
    ];

    public function removeProfilePicture()
    {
        if (File::exists(public_path("storage/images/profile_pictures/" . $this->fileName)) && $this->fileName != "avatar.jpg") {
            File::delete(public_path("storage/images/profile_pictures/" . $this->fileName));
        }
        $this->reset("scoutProfilePicture");
        $this->fileName = "avatar.jpg";
    }

    public function updated($propertyName)
    {
        if ($propertyName == 'scoutProfilePicture') {
            try {
                $this->validateOnly($propertyName, [
                    'scoutProfilePicture' => 'image|max:2048',
                ]);
                $image = $this->scoutProfilePicture;
                $this->fileName = time() . '.' . $image->getClientOriginalExtension();
                $resized_image = Image::make($image)->resize(500, 500)->encode();
                Storage::put($this->fileName, $resized_image);
                Storage::move($this->fileName, ('public/images/profile_pictures/' . $this->fileName));
            } catch (ValidationException $e) {
                $this->reset($propertyName);
                throw $e;
            }
        }
    }
    public function validateScoutPersonalEducation()
    {
        $this->validate();
    }
    public function addScoutPersonalInfos()
    {
        if (auth()->user()->user_type == "admin")
            $this->scout_regiment = auth()->user()->scout_regiment;

        $scout_id = PersonalInfo::insertGetId([
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

        return $scout_id;
    }
}