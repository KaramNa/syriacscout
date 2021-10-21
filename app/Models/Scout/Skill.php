<?php

namespace App\Models\Scout;

use App\Models\Scout\PersonalInfo;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Skill extends Model
{
    use HasFactory;

    protected $fillable = [
        "scout_skill_name",
        "scout_skill_details",
        "scout_id"
    ];

    public function scout(){
        return $this->belongsTo(PersonalInfo::class, "scout_id");
     }
}
