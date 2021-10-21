<?php

namespace App\Models\Scout;

use App\Models\Scout\PersonalInfo;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CurrentWork extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = [
        "scout_id",
        "scout_current_work",
        "scout_current_work_details",
        "scout_current_work_start_date",
        "scout_cururent_work_place",
    ];

    public function scout(){
        return $this->belongsTo(PersonalInfo::class, "scout_id");
     }
}
