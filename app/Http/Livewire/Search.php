<?php
namespace App\Http\Livewire;

use App\Models\Scout\Language;
use App\Models\Scout\PersonalInfo;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Mediconesystems\LivewireDatatables\NumberColumn;

class Search extends LivewireDatatable
{
    public $exportable = true;
    // public $complex = true;

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
                ->label("الرقم الكشقي")
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

            // NumberColumn::raw('FLOOR(DATEDIFF(NOW(), (STR_TO_DATE(scout_birthdate, "%d/%m/%Y")))/365) AS Age')
            // ->filterable(),

            // Column::name('languages.scout_lang')
            //     ->label("اللغات")
            //     ->defaultSort('asc')
            //     ->filterable($this->Languages)
        ];
    }

    public function getLanguagesProperty()
    {
        return Language::groupBy('scout_lang')->pluck('scout_lang');
    }
}
