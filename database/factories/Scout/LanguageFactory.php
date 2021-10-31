<?php

namespace Database\Factories\Scout;

use App\Models\Scout\Language;
use Illuminate\Database\Eloquent\Factories\Factory;

class LanguageFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Language::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        static $n = 2;
        return [
            "scout_lang" => $this->faker->randomElement($array = ['Armenian', 'Swedish', 'Turkish', 'Syriac', 'French', 'German', 'Arabic'], $count = 1, $allowDuplicates = true),
            "scout_lang_level" => $this->faker->randomElement($array = ['B1', 'A2', 'C2', 'C1', 'B2', 'A1'], $count = 1, $allowDuplicates = true),
            "scout_id" => $n++,
        ];
    }
}