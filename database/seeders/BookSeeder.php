<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Book;
use App\Models\Author;
use App\Models\Category;

class BookSeeder extends Seeder
{
    public function run(): void
    {
        $categories = Category::all();
        $authors = Author::all();

        foreach ($authors as $author) {
            Book::create([
                'titulo' => 'Book by ' . $author->name,
                'author_id' => $author->id,
                'category_id' => $categories->random()->id,
            ]);
        }
    }
}

