<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Order matters: books need authors and categories first.
        $this->call([
            AuthorSeeder::class,
            CategorySeeder::class,
            BookSeeder::class,
        ]);
    }
}
