<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Thread>
 */
class ThreadFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(),
            'content' => $this->faker->paragraphs(3, true),
            'slug' => $this->faker->unique()->slug(),
            'is_published' => $this->faker->boolean(),
            'image' => $this->faker->optional()->imageUrl(),
            'view_count' => $this->faker->numberBetween(0, 1000),
            'category_id' => Category::factory()->create()->id,
            'user_id' => User::factory()->create()->id,
        ];
    }
}
