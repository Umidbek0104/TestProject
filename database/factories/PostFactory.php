<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

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
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(), // Tasodifiy sarlavha
            'slug' => Str::slug($this->faker->sentence()), // Sarlavhadan slug yaratish
            'content' => $this->faker->paragraph(5), // Tasodifiy matn
            'video_url' => $this->faker->url(), // Tasodifiy video URL
            'category_id' => Category::inRandomOrder()->first()->id, // Tasodifiy kategoriyani tanlash
        ];
    }
}
