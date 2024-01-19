<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'designation',
        'department',
        'grade',
        'company',
        'repostingto',
        'location',
        'dob',
        'aadharno',
        'passportno',
        'mobilenumber',
    ];
}
