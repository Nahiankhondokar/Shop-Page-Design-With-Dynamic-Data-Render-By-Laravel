<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{

    protected $model = Product::class;
    
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'product_name' => $this->faker->name(),
            'sku' => $this->faker->email(),
            'regular_price' => $this->faker->randomDigit,
            'selling_price' => $this->faker->randomDigit,
            'quantity' => $this->faker->randomNumber(1)
        ];
    }
}