<?php

namespace Database\Factories;
use Carbon\Carbon;
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
    public function definition()
    {
        return [
            'description' =>fake()->realText(20),
            'address' =>fake()->realText(30),
            'order_time'=> Carbon::yesterday(),
            'money'=>fake()->numberBetween(1, 50000),
            'shop_name'=> fake()->name()
        ];
    }
}
