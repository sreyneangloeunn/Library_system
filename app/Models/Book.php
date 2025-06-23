<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Book extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'author', 'isbn', 'copies_available', 'library_id', 'category_id'];

    public function library()
    {
        return $this->belongsTo(Library::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function loan()
    {
        return $this->hasMany(Loan::class);
    }
}

