<?php

namespace Database\Factories;

use App\Models\States;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\States>
 */
class StatesFactory extends Factory
{
    protected $model = States::class;

    public function definition()
    {
        return [
            'state_name' => $this->faker->state, // Use Faker for random state names
            'state_code' => $this->faker->stateAbbr, // Random state abbreviation
        ];
    }
}
