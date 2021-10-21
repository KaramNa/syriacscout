<?php

namespace App\Models\Scout;

use App\Models\Scout\PersonalInfo;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Education extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = [
        "scout_id",
        "scout_education_pace",
        "scout_education_name",
        "scout_education_start_date",
        "scout_education_end_date",
        "scout_education_place",
        "scout_education_year",
    ];

    public function scout(){
       return $this->belongsTo(PersonalInfo::class, "scout_id");
    }
}
