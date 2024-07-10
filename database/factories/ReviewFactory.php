<?php

namespace Database\Factories;

use App\Models\Review;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ReviewFactory extends Factory
{
    protected $model = Review::class;

    public function definition()
    {
        return [
            'user_id' => User::inRandomOrder()->first()->id,
            'reviewable_id' => null,
            'reviewable_type' => null,
            'content' => $this->faker->paragraph,
            'rating' => $this->faker->randomFloat(1, 1, 5),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
