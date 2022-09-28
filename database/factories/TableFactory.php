<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class TableFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        static $order = 1;  
        return [
            'number' => $order++,
            'seats' =>  $this->faker->numberBetween(1,4),
            'active' => $this->faker->boolean(),
        ];
    }
}
