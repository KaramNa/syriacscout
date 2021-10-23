<?php

namespace App\Http\Livewire;

use App\Models\Regiment;
use App\Models\Scout\Course;
use App\Models\Scout\CurrentWork;
use App\Models\Scout\Education;
use App\Models\Scout\Experience;
use App\Models\Scout\Language;
use App\Models\Scout\PersonalInfo;
use App\Models\Scout\Skill;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Mediconesystems\LivewireDatatables\NumberColumn;

class Search extends LivewireDatatable
{
    public $exportable = true;
    public $complex = true;

    public function builder()
    {
        return PersonalInfo::query();
    }

    public function columns()
    {
        return [

            Column::name('id')
                ->hide(),

            Column::name('scout_number')
                ->label("الرقم الكشفي")
                ->defaultSort('asc')
                ->link('/scoutprofile/{{id}}'),

            Column::name('scout_first_name')
                ->label("الاسم")
                ->searchable()
                ->defaultSort('asc'),

            Column::name('scout_last_name')
                ->label("الكنية")
                ->searchable()
                ->defaultSort('asc'),

            Column::name('scout_email')
                ->label("البريد الاكتروني"),

            Column::name('scout_mobile_phone')
                ->label("رقم الموبايل"),

            Column::name('regiment.regiment_name')
                ->label("الفوج")
                ->filterable($this->Regiment),

            // NumberColumn::raw('FLOOR(DATEDIFF(NOW(), (STR_TO_DATE(scout_birthdate, "%d/%m/%Y")))/365) AS العمر')
            //     ->filterable(),

            NumberColumn::raw('AGE(timestamp TO_DATE(scout_birthdate, "YYYYMMDD"))) AS العمر')
                ->filterable(),
 
            // Column::name('languages.scout_lang')
            //     ->label("اللغات")
            //     ->defaultSort('asc')
            //     ->filterable($this->Languages),

            // Column::name('skills.scout_skill_name')
            //     ->label("المهارات")
            //     ->defaultSort('asc')
            //     ->filterable($this->Skill),

            // Column::name('courses.scout_course')
            //     ->label("الدورات")
            //     ->defaultSort('asc')
            //     ->filterable($this->Course),
                
            // Column::name('education.scout_education_name')
            //     ->label("التحصيل العلمي")
            //     ->defaultSort('asc')
            //     ->filterable($this->Education),
                
            // Column::name('currentWork.scout_current_work')
            //     ->label("العمل الحالي")
            //     ->defaultSort('asc')
            //     ->filterable($this->CurrentWork),
                
            // Column::name('experiences.scout_experience')
            //     ->label("الخبرة")
            //     ->defaultSort('asc')
            //     ->filterable($this->Experience),
        ];
    }

    public function getLanguagesProperty()
    {
        return Language::groupBy('scout_lang')->pluck('scout_lang');
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
