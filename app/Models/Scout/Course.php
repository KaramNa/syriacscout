<?php

namespace App\Models\Scout;

use App\Models\Scout\PersonalInfo;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Course extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = [
        "scout_id",
        "scout_course",
        "scout_course_place",
        "scout_course_duration",
        "scout_course_year",
    ];

    public function scout(){
        return $this->belongsTo(PersonalInfo::class, "scout_id");
     }
}
