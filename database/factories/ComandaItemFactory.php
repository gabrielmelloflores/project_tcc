<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Comanda;
use App\Models\Product;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ComandaItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $comandasIDs = Comanda::all()->pluck('id')->toArray();
        $productsIDs= Product::all()->pluck('id')->toArray();
        return [
            'comanda_id' => $this->faker->randomElement($comandasIDs),
            'product_id' => $this->faker->randomElement($productsIDs),
            'quantity'   => $this->faker->randomNumber(1),
            'delivered'  => 0
        ];
    }
}
