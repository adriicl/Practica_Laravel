<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function showBook($id)
    {
        $author = Author::with('book')->findOrFail($id);
        return response()->json($author);
    }
}

