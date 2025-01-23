<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function showBooks($id)
    {
        $category = Category::with('books')->findOrFail($id);
        return response()->json($category);
    }
}

