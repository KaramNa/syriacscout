<?php

namespace Database\Factories\Scout;

use App\Models\Scout\Course;
use Illuminate\Database\Eloquent\Factories\Factory;

class CourseFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Course::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        static $n = 2;
        return [
            "scout_course" => $this->faker->randomElement($array = ['برمجة', 'انكليزي', 'محاسبة'], $count = 1, $allowDuplicates = true),
            'scout_course_place' => $this->faker->randomElement($array = ['دمشق', 'ادلب', 'الحسكة', 'الرقة', 'ريف دمشق', 'السويداء', 'حلب', 'حمص', 'حماة'], $count = 1, $allowDuplicates = true),
            "scout_course_duration" => $this->faker->randomElement($array = ['٢٠ يوم', '٥ شهور', '١ سنة'], $count = 1, $allowDuplicates = true),
            "scout_course_year" => $this->faker->numberBetween(1990, 2020),
            "scout_id" => $n++,
        ];
    }
}