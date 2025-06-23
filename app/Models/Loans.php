<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loans extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'author',
        'isbn',
        'category_id',
        'library_id',
        'copies_available',
    ];

    public function book(){
        return $this->belongsTo(Book::class);
    }
}
