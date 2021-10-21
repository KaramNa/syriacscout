<?php

namespace Database\Seeders;

use App\Models\Scout\Course;
use App\Models\Scout\CurrentWork;
use App\Models\Scout\Education;
use App\Models\Scout\Experience;
use App\Models\Scout\Language;
use App\Models\User;
use Illuminate\Database\Seeder;
use App\Models\Scout\PersonalInfo;
use App\Models\Scout\Skill;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */


    public function run()
    {
        User::create([
            "user_name" => "elie",
            "password" => bcrypt("123123Elie"),
            "user_type" => "superUser",
        ]);
        // PersonalInfo::factory(200)->create();
        // Language::factory(200)->create();
        // Skill::factory(200)->create();
        // Course::factory(100)->create();
        // CurrentWork::factory(120)->create();
        // Experience::factory(90)->create();
        // Education::factory(50)->create();
    }
}