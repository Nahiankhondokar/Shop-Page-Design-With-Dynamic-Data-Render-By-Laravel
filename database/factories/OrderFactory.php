<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'order_no' => $this->faker->name(),
            'customer_name' => $this->faker->email(),
            'phone' => $this->faker->randomDigit,
            'amount' => $this->faker->randomDigit,
        ];
    }
}