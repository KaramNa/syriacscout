<?php

namespace App\Models\Scout;

use App\Models\Regiment;
use App\Models\Scout\Skill;
use App\Models\Scout\Course;
use App\Models\Scout\Language;
use App\Models\Scout\Education;
use App\Models\Scout\Experience;
use App\Models\Scout\CurrentWork;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PersonalInfo extends Model
{
   use HasFactory;

   public $timestamps = false;
   protected $fillable = [
      'scout_first_name',
      'scout_last_name',
      'scout_father_name',
      'scout_mother_name',
      'scout_national_no',
      'scout_birthdate',
      'scout_number',
      'scout_affiliation_date',
      'scout_title',
      'scout_home_phone',
      'scout_mobile_phone',
      'scout_email',
      'scout_name_en',
      'scout_gender',
      'scout_marital_status',
      'scout_no_of_children',
      'scout_address',
      'scout_government',
      'regiment_id',
      'scout_profile_picture',
      'scout_city',
   ];

   public function education()
   {
      return $this->hasMany(Education::class, "scout_id");
   }
   public function languages()
   {
      return $this->hasMany(Language::class, "scout_id");
   }
   public function skills()
   {
      return $this->hasMany(Skill::class, "scout_id");
   }
   public function courses()
   {
      return $this->hasMany(Course::class, "scout_id");
   }
   public function currentWork()
   {
      return $this->hasMany(CurrentWork::class, "scout_id");
   }
   public function experiences()
   {
      return $this->hasMany(Experience::class, "scout_id");
   }

   public function regiment()
   {
      return $this->belongsTo(Regiment::class);
   }
}
