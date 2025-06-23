<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Loan;

class Member extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'email', 'phone', 'membership_date'];

    public function loan()
    {
        return $this->hasMany(Loan::class);
    }
}

