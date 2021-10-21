<?php

namespace Database\Factories\Scout;

use App\Models\Scout\Experience;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class ExperienceFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Experience::class;

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
        static $n = 1;
        return [
            "scout_experience" => $this->faker->randomElement($array = ['مبرمج', 'مدرس', 'محاسب'], $count = 1, $allowDuplicates = true),
            'scout_experience_details' => $this->faker->randomElement($array = ['تفاصيل الخبرة'], $count = 1, $allowDuplicates = true),
            'scout_experience_start_date' => $start_date,
            'scout_experience_end_date' => $end_date,
            'scout_experience_place' => $this->faker->randomElement($array = ['دمشق', 'ادلب', 'الحسكة', 'الرقة', 'ريف دمشق', 'السويداء', 'حلب', 'حمص', 'حماة'], $count = 1, $allowDuplicates = true),
            "scout_id" => $n++,
        ];
    }
}