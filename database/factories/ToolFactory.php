<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Tool>
 */
class ToolFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $arr = array("pesticide", "herbicide", "fertilizer","etc..");
        return [
            'name' => fake()->name(),
            'quantity' => fake()->numberBetween(1,100),
            'type'=> $arr[array_rand($arr)]
        ];
    }
}
