<?php

namespace Database\Seeders;

use App\Models\Author;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */


    public function run(): void
    {
        $names = [
            'George Orwell',
            'Jane Austen',
            'Isaac Asimov',
            'Agatha Christie',
            'Yuval Noah Harari',
            'Carl Sagan',
        ];

        foreach ($names as $name) {
            Author::create(['name' => $name]);
        }

        // Four extra random authors created by the factory
        Author::factory()->count(4)->create();
    }
}
