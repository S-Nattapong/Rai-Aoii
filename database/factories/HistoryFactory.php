<?php

namespace Database\Factories;
use App\Models\Tool;
use App\Models\Order;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\History>
 */
class HistoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $arr = array("Increase", "Decrease","Create");
        return [
            'tool_id' => Tool::inRandomOrder()->first()->id,
            'order_id' => Order::inRandomOrder()->first()->id,
            'quantity' => fake()->numberBetween(1, 500),
            'status' => $arr[array_rand($arr)],
            'description' => fake()->realText(30)
        ];
    }
}