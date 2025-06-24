<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Member extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'email', 'phone','role', 'membership_date'];

    public function loan()
    {
        return $this->hasMany(Loans::class);
    }
    public function getCreatedAtAttribute($value) {
        return date('d-m-Y', strtotime($value));
    }

    // create attribute to clean date formate
    public function getUpdatedAtAttribute($value) {
        return date('d-m-Y', strtotime($value));
    }
}

