<?php

namespace App\Traits\AddScout;

use App\Models\ScoutCourse;
use App\Models\Scout\Course;

trait AddScoutCourses
{
    public $courseCount = 1;
    public $courseInputs = [0];
    public $scout_course, $scout_course_place, $scout_course_duration, $scout_course_year;

    public function addCourse()
    {
        array_push($this->courseInputs, $this->courseCount++);
    }

    public function removeCourse($key)
    {
        unset($this->courseInputs[$key]);
    }

    public function validateScoutCourses()
    {
        foreach ($this->courseInputs as $value) {
            $this->validate([
                "scout_course." . $value => "required",
                "scout_course_place." . $value => "required",
                "scout_course_duration." . $value => "required",
                "scout_course_year." . $value => "required|numeric",
            ]);
        }
    }

    public function addScoutCourses($scout_id)
    {
        foreach ($this->scout_course as $key => $value) {

            Course::create([
                "scout_id" => $scout_id,
                "scout_course" => $this->scout_course[$key],
                "scout_course_duration" => $this->scout_course_duration[$key],
                "scout_course_place" => $this->scout_course_place[$key],
                "scout_course_year" => $this->scout_course_year[$key],
            ]);
        }
    }
}
