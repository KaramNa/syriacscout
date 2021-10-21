<?php

namespace App\Http\Livewire\Scout;

use Livewire\Component;
use App\Models\Scout\Course;

class ManageCourses extends Component
{
    public $scoutId;
    public $scoutCourses;
    public $course;
    public $scout_course;
    public $scout_course_place;
    public $scout_course_duration;
    public $scout_course_year;
    public $edit_scout_permission;


    public function mount()
    {
        $this->getCourses();
    }

    public function render()
    {
        return view('livewire.scout.manage-courses');
    }

    public function getCourses()
    {
        $this->scoutCourses = Course::where("scout_id", $this->scoutId)->get();
    }

    public function updateDelete($course_id, $action)
    {
        $this->course = Course::find($course_id);
        if ($action == 'update') {
            $this->dispatchBrowserEvent('openUpdateModal');
            $this->scout_course = $this->course->scout_course;
            $this->scout_course_place = $this->course->scout_course_place;
            $this->scout_course_duration = $this->course->scout_course_duration;
            $this->scout_course_year = $this->course->scout_course_year;
        } else {
            $this->dispatchBrowserEvent('openDeleteModal');
        }
    }

    public function reset_fields()
    {
        $this->reset("scout_course");
        $this->reset("scout_course_place");
        $this->reset("scout_course_duration");
        $this->reset("scout_course_year");
    }

    protected $rules = [
        "scout_course"          => "required",
        "scout_course_place"    => "required",
        "scout_course_duration" => "required",
        "scout_course_year"     => "required|numeric",
    ];

    public function addScoutCourse()
    {
        $this->validate();
        $course = Course::create([
            "scout_id" => $this->scoutId,
            "scout_course" => $this->scout_course,
            "scout_course_duration" => $this->scout_course_duration,
            "scout_course_place" => $this->scout_course_place,
            "scout_course_year" => $this->scout_course_year,
        ]);

        if ($course) {
            $this->getCourses();
            session()->flash("succeed", "تم إضافة دورة جديدة بنجاح");
        } else {
            session()->flash("failed", "حدث خطأ ما, الرجاء المحاولة مجدداً");
        }
        $this->reset_fields();
        $this->dispatchBrowserEvent("CloseModal");
    }

    public function deleteScoutCourse()
    {
        if ($this->course) {
            session()->flash("succeed", "تم حذف الدورة بنجاح");
            $this->course->delete();
            $this->getCourses();
        } else {
            session()->flash("failed", "حدث خطأ ما, الرجاء المحاولة مجدداً");
        }
        $this->dispatchBrowserEvent("CloseModal");
    }

    public function updateScoutCourse()
    {
        $this->validate();

        if ($this->course) {
            $this->course->update([
                "scout_course" => $this->scout_course,
                "scout_course_duration" => $this->scout_course_duration,
                "scout_course_place" => $this->scout_course_place,
                "scout_course_year" => $this->scout_course_year,
            ]);
            session()->flash("succeed", "تم تعديل الدورة بنجاح");
            $this->getCourses();
        } else {
            session()->flash("failed", "حدث خطأ ما, الرجاء المحاولة مجدداً");
        }
        $this->dispatchBrowserEvent("CloseModal");
    }
}