<?php

namespace App\Models\Scout;

use App\Models\Scout\PersonalInfo;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Language extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = [
        "scout_lang",
        "scout_lang_level",
        "scout_id"
    ];

    public function scout(){
        return $this->belongsTo(PersonalInfo::class, "scout_id");
     }
}
