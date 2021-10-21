<?php

namespace Database\Factories\Scout;

use App\Models\Scout\CurrentWork;
use Illuminate\Database\Eloquent\Factories\Factory;

class CurrentWorkFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = CurrentWork::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        static $n = 1;
        return [
            "scout_current_work" => $this->faker->randomElement($array = ['مبرمج', 'مدرس', 'محاسب'], $count = 1, $allowDuplicates = true),
            'scout_current_work_details' => $this->faker->randomElement($array = ['تفاصيل العمل'], $count = 1, $allowDuplicates = true),
            'scout_current_work_start_date' => $this->faker->date($format = 'd/m/Y', $max = 'now'),
            'scout_cururent_work_place' => $this->faker->randomElement($array = ['دمشق', 'ادلب', 'الحسكة', 'الرقة', 'ريف دمشق', 'السويداء', 'حلب', 'حمص', 'حماة'], $count = 1, $allowDuplicates = true),
            "scout_id" => $n++,
        ];
    }
}