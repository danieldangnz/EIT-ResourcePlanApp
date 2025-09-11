<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProgrammeFactory extends Factory
{
    protected $model = \App\Models\Programme::class;

    public function definition(): array
    {
        return [
            'title' => $this->faker->words(3, true),
            'base_code' => strtoupper($this->faker->lexify('???')) . $this->faker->numberBetween(100, 999),
            'region' => $this->faker->randomElement(['AKL', 'WLG', 'CHC']),
            'start_month' => $this->faker->monthName,
        ];
    }
}
