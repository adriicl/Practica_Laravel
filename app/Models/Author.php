<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    public function book()
    {
        return $this->hasOne(Book::class);
    }
}
