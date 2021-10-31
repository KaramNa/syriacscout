<?php

namespace Database\Factories\Scout;

use Carbon\Carbon;
use App\Models\Scout\Education;
use Illuminate\Database\Eloquent\Factories\Factory;

class EducationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Education::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $day = rand(1, 28);
        $month = rand(1, 12);
        $year = rand(2000, 2020);
        $date = Carbon::create($year, $month, $day);
        $start_date = $date->format("d/m/Y");
        $end_date = $date->addWeeks(rand(1, 52))->format("d/m/Y");
        static $n = 2;
        return [
            "scout_education_pace" => $this->faker->randomElement($array = ['دكتوراه', 'ماجستير', 'جامعة', 'معهد'], $count = 1, $allowDuplicates = true),
            'scout_education_name' => $this->faker->randomElement($array = ['مدنية', 'فيزياء', 'كيمياء', 'معلوماتية'], $count = 1, $allowDuplicates = true),
            'scout_education_start_date' => $start_date,
            // 'scout_education_end_date' => $end_date,
            'scout_education_end_date' => "",
            'scout_education_place' => $this->faker->randomElement($array = ['دمشق', 'ادلب', 'الحسكة', 'الرقة', 'ريف دمشق', 'السويداء', 'حلب', 'حمص', 'حماة'], $count = 1, $allowDuplicates = true),
            'scout_education_year' => $this->faker->randomElement($array = ['6', '5', '4', '3', '2', '1'], $count = 1, $allowDuplicates = true),
            // 'scout_education_year' => "",
            "scout_id" => $n++,
        ];
    }
}