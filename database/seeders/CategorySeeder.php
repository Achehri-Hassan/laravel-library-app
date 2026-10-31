<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $names = [
            'Classic Literature',
            'Science Fiction',
            'Mystery',
            'History',
            'Science',
        ];

        foreach ($names as $name) {
            Category::create(['name' => $name]);
        }
    }
}
