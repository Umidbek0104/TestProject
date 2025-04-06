<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;


class TestFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $questionText = $this->faker->sentence();

        return [
            'name' => $questionText,
            'description' => $this->faker->paragraph(),
            'category_id' => Category::inRandomOrder()->first()?->id ?? Category::factory(), // Agar category yo‘q bo‘lsa, yangi yaratadi
            'true_answer' => 'To‘g‘ri javob',
            'false_answer1' => 'Noto‘g‘ri javob 1',
            'false_answer2' => 'Noto‘g‘ri javob 2',
            'false_answer3' => 'Noto‘g‘ri javob 3',
        ];
    }
}
