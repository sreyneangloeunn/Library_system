<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    
    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function loans(){
        return $this->hasMany(Loans::class);
    }
    protected $hidden=[
        'created_at',
        'updated_at'
    ];

}
