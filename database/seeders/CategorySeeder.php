<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        Category::create(['name' => 'Fiction']);
        Category::create(['name' => 'Non-fiction']);
        Category::create(['name' => 'Sci-fi']);
        Category::create(['name' => 'Biography']);
    }
}

