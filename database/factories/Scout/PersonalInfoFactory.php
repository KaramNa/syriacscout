<?php

namespace Database\Factories\Scout;

use App\Models\Scout\PersonalInfo;
use Illuminate\Database\Eloquent\Factories\Factory;

class PersonalInfoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = PersonalInfo::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $faker = \Faker\Factory::create('ar_Jo');
        return [
            // 'scout_first_name' => $faker->firstName($gender = "male"),
            'scout_first_name' => $faker->firstName($gender = "female"),
            'scout_last_name' => $faker->lastName(),
            'scout_father_name' => $faker->firstName($gender = "male"),
            'scout_mother_name' => $faker->firstName($gender = "female"),
            'scout_national_no' => $faker->unique()->creditCardNumber(),
            'scout_birthdate' => $faker->date($format = 'd/m/Y', $date = '-18 years'),
            // 'scout_number' => $faker->unique()->numberBetween(100, 300),
            // 'scout_number' => $faker->unique()->numberBetween(301, 500),
            'scout_number' => $faker->unique()->numberBetween(501, 700),
            // 'scout_number' => $faker->unique()->numberBetween(701, 900),
            'scout_affiliation_date' => $faker->date($format = 'd/m/Y', $max = 'now'),
            // 'scout_title' => $faker->randomElement($array = ['قائد', 'جوال'], $count = 1, $allowDuplicates = true),
            'scout_title' => $faker->randomElement($array = ['قائدة', 'رائدة'], $count = 1, $allowDuplicates = true),
            'scout_home_phone' => $faker->unique()->numerify('#######'),
            'scout_mobile_phone' => $faker->unique()->numerify('099#######'),
            'scout_email' => $faker->unique()->safeEmail(),
            // 'scout_name_en' => $this->faker->name($gender = "male"),
            'scout_name_en' => $this->faker->name($gender = "female"),
            // 'scout_gender' => 'ذكر',
            'scout_gender' => 'أنثى',
            // 'scout_marital_status' => $faker->randomElement($array = ['مطلق', 'أرمل', 'متزوج'], $count = 1, $allowDuplicates = true),
            'scout_marital_status' => $faker->randomElement($array = ['أعزب'], $count = 1, $allowDuplicates = true),
            // 'scout_no_of_children' => $faker->numberBetween(0, 5),
            'scout_no_of_children' => 0,
            'scout_address' => $faker->address(),
            'scout_government' => $faker->randomElement($array = ['دمشق', 'ادلب', 'الحسكة', 'الرقة', 'ريف دمشق', 'السويداء', 'حلب', 'حمص', 'حماة'], $count = 1, $allowDuplicates = true),
            'regiment_id' => $faker->randomElement($array = ['1', '2', '3', '4', '5', '6'], $count = 1, $allowDuplicates = true),
            'scout_profile_picture' => 'avatar.jpg',
            'scout_city' => $faker->city(),
        ];
    }
}