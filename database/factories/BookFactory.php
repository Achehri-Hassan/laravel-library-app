<?php

namespace Database\Factories;

use App\Models\Author;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    public function definition(): array
    {
        return [
            'title' => Str::title(fake()->unique()->words(3, true)),
            'description' => fake()->paragraph(3),
            'published_at' => fake()->optional(0.85)->date(),
            'author_id' => Author::inRandomOrder()->value('id'),
            'category_id' => Category::inRandomOrder()->value('id'),
        ];
    }
}
