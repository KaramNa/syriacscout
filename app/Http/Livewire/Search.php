<?php

namespace App\Http\Livewire;

use App\Models\Regiment;
use App\Models\Scout\Skill;
use App\Models\Scout\Course;
use App\Models\Scout\Language;
use App\Models\Scout\Education;
use App\Models\Scout\Experience;
use App\Models\Scout\CurrentWork;
use App\Models\Scout\PersonalInfo;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\NumberColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class Search extends LivewireDatatable
{
    public $exportable = true;
    public $hideable;

    public function builder()
    {
        return PersonalInfo::query();
    }
    //if ((auth()->user()->user_type === "admin" && auth()->user()->regiment_id === $this->scout->regiment_id) || auth()->user()->user_type === "superUser")
    public function columns()
    {
        if (auth()->user()->user_type === "superUser")
            $this->hideable = 'select';

        return [

            Column::name('id')->hide(),

            column::callback(['scout_number', 'id'], function ($scout_number, $id) {
                $scout = PersonalInfo::find($id);
                if ((auth()->user()->user_type === "admin" && auth()->user()->regiment_id === $scout->regiment_id) || auth()->user()->user_type === "superUser")
                    return "<a class='border-2 border-transparent hover:border-blue-500 hover:bg-blue-100 hover:shadow-lg text-blue-600 rounded-lg  py-1' href='scoutprofile/" . $id . "'>$scout_number</a>";
                else
                    return $scout_number;
            })->label("الرقم الكشفي")
                ->defaultSort('asc'),

            Column::name('scout_first_name')
                ->label("الاسم")
                ->searchable()
                ->defaultSort('asc'),

            Column::name('scout_father_name')
                ->label("اسم الأب")
                ->defaultSort('asc')
                ->hide(),

            Column::name('scout_last_name')
                ->label("الكنية")
                ->searchable()
                ->defaultSort('asc'),

            Column::name('scout_mother_name')
                ->label("اسم الأم")
                ->defaultSort('asc')
                ->hide(),

            Column::name('scout_gender')
                ->label("الجنس")
                ->defaultSort('asc'),

            Column::name('scout_email')
                ->label("البريد الاكتروني")
                ->hide(),

            Column::name('scout_mobile_phone')
                ->label("رقم الموبايل")
                ->hide(),

            Column::name('regiment.regiment_name')
                ->label("الفوج")
                ->defaultSort('asc')
                ->filterable($this->Regiment),

            Column::name('scout_title')
                ->label("اللقب")
                ->filterable($this->titles),

            NumberColumn::raw('FLOOR(DATEDIFF(NOW(), (STR_TO_DATE(scout_birthdate, "%d/%m/%Y")))/365) AS العمر')
                ->filterable(),

            column::callback('suspension_date', function ($suspension_date) {
                if ($suspension_date == Null)
                    return "نشط";
                else
                    return "غير نشط";
            })->label("الحالة")
                ->filterOn("suspension_date")
                ->filterable(["نشط", "غير نشط"], "isActive"),

            Column::name('languages.scout_lang')
                ->label("اللغات")
                ->filterable($this->Languages),

            Column::name('skills.scout_skill_name')
                ->label("المهارات")
                ->defaultSort('asc')
                ->filterable($this->Skill),

            Column::name('courses.scout_course')
                ->label("الدورات")
                ->defaultSort('asc')
                ->filterable($this->Course),

            Column::name('education.scout_education_name')
                ->label("التحصيل العلمي")
                ->defaultSort('asc')
                ->filterable($this->Education),

            Column::name('currentWork.scout_current_work')
                ->label("العمل الحالي")
                ->defaultSort('asc')
                ->filterable($this->CurrentWork),

            Column::name('experiences.scout_experience')
                ->label("الخبرة")
                ->defaultSort('asc')
                ->filterable($this->Experience),
        ];
    }

    public function getLanguagesProperty()
    {
        return Language::groupBy('scout_lang')->pluck('scout_lang');
    }

    public function getTitlesProperty()
    {
        return PersonalInfo::groupBy('Scout_title')->pluck('Scout_title');
    }

    public function getRegimentProperty()
    {
        return Regiment::groupBy('regiment_name')->pluck('regiment_name');
    }

    public function getSkillProperty()
    {
        return Skill::groupBy('scout_skill_name')->pluck('scout_skill_name');
    }

    public function getEducationProperty()
    {
        return Education::groupBy('scout_education_name')->pluck('scout_education_name');
    }

    public function getCourseProperty()
    {
        return Course::groupBy('scout_course')->pluck('scout_course');
    }

    public function getCurrentWorkProperty()
    {
        return CurrentWork::groupBy('scout_current_work')->pluck('scout_current_work');
    }

    public function getExperienceProperty()
    {
        return Experience::groupBy('scout_experience')->pluck('scout_experience');
    }
}
