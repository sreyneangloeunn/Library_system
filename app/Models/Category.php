<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;

    protected $fillable=['name'];

    public function books() {
        return $this->hasMany(Book::class);
    }

    // protected $hidden=[
    //     'created_at',
    //     'updated_at',
    // ];
    // create attribute to clean date formate
    public function getCreatedAtAttribute($value) {
        return date('d-m-Y', strtotime($value));
    }

    // create attribute to clean date formate
    public function getUpdatedAtAttribute($value) {
        return date('d-m-Y', strtotime($value));
    }
}

