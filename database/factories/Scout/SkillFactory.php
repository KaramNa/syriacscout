<?php

namespace Database\Factories\Scout;

use App\Models\Scout\Skill;
use Illuminate\Database\Eloquent\Factories\Factory;

class SkillFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Skill::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        static $n = 1;
        return [
            "scout_skill_name" => $this->faker->randomElement($array = ['المرونة', 'التواصل', 'العمل الجماعي'], $count = 1, $allowDuplicates = true),
            "scout_skill_details" => $this->faker->randomElement($array = ['وصف المهارة'], $count = 1, $allowDuplicates = true),
            "scout_id" => $n++,
        ];
    }
}