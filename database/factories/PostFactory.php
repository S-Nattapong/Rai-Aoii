<?php

namespace Database\Factories;
use Carbon\Carbon;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $arr = array("Waiting", "Progress", "Completed", "Cancel");
        return [
            'user_id' => User::inRandomOrder()->first()->id,
            'title' => fake()->realText(30),
            'desired' => Carbon::yesterday(),
            'quantity' => fake()->numberBetween(1, 1000),
            'deal_money' => fake()->numberBetween(1, 50000),
            'deposit_money' => fake()->numberBetween(1, 50000),
            'producer_id' => User::inRandomOrder()->first()->id,
            'status' => $arr[array_rand($arr)]
        ];
    }
}
