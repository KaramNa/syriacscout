<?php

namespace App\Models;

use App\Models\User;
use App\Models\Scout\PersonalInfo;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Regiment extends Model
{
    use HasFactory;

    protected $fillable = [
        "regiment_name",
    ];

    public function scouts()
    {
        return $this->hasMany(PersonalInfo::class);
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
