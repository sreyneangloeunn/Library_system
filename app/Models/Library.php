<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Library extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'address', 'phone'];

    public function books()
    {
        return $this->hasMany(Book::class);
    }
}

