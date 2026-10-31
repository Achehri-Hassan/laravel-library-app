<?php

namespace Database\Seeders;

use App\Models\Author;
use App\Models\Book;
use App\Models\Category;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    public function run(): void
    {
        // [title, author, category, published date or null, description]
        $books = [
            [
                'Nineteen Eighty-Four',
                'George Orwell',
                'Science Fiction',
                '1949-06-08',
                'A dystopian novel about surveillance and control.'
            ],
            [
                'Pride and Prejudice',
                'Jane Austen',
                'Classic Literature',
                '1813-01-28',
                'A romance about manners, family and first impressions.'
            ],
            [
                'Emma',
                'Jane Austen',
                'Classic Literature',
                '1815-12-23',
                'A young woman tries to match her friends and learns a lesson.'
            ],
            [
                'Foundation',
                'Isaac Asimov',
                'Science Fiction',
                '1951-06-01',
                'A mathematician predicts the fall of a galactic empire.'
            ],
            [
                'I, Robot',
                'Isaac Asimov',
                'Science Fiction',
                '1950-12-02',
                'Linked stories about robots and the Three Laws of Robotics.'
            ],
            [
                'Murder on the Orient Express',
                'Agatha Christie',
                'Mystery',
                '1934-01-01',
                'Detective Poirot investigates a murder on a snowbound train.'
            ],
            [
                'Sapiens',
                'Yuval Noah Harari',
                'History',
                '2011-01-01',
                'A short history of humankind from the Stone Age to today.'
            ],
            [
                'Cosmos',
                'Carl Sagan',
                'Science',
                null,
                'A journey through the universe, science and human curiosity.'
            ],
        ];

        foreach ($books as [$title, $authorName, $categoryName, $date, $text]) {
            Book::create([
                'title' => $title,
                'description' => $text,
                'published_at' => $date,
                'author_id' => Author::where('name', $authorName)->value('id'),
                'category_id' => Category::where('name', $categoryName)->value('id'),
            ]);
        }
        // 22 extra random books, so we have 30 in total (3 pages of 10)
        Book::factory()->count(22)->create();
    }
}
