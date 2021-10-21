<?php

namespace App\Models\Scout;

use App\Models\Scout\PersonalInfo;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Experience extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = [
        "scout_id",
        "scout_experience",
        "scout_experience_details",
        "scout_experience_start_date",
        "scout_experience_end_date",
        "scout_experience_place",
    ];

    public function scout(){
        return $this->belongsTo(PersonalInfo::class, "scout_id");
     }
}
