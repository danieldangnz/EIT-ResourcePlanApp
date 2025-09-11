<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ActivityFactory extends Factory
{
    protected $model = \App\Models\Activity::class;

    public function definition(): array
    {
        return [
            'course_name' => $this->faker->words(4, true),
            'base_code' => strtoupper($this->faker->lexify('ACT')) . $this->faker->numberBetween(100, 999),
            'campus' => $this->faker->randomElement(['AKL', 'WLG', 'CHC']),
            'intake_month' => $this->faker->monthName,
            'for_programme' => $this->faker->randomElement(['Yes', 'No']),
        ];
    }
}