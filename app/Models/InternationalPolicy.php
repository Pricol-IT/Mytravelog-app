<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InternationalPolicy extends Model
{
    use HasFactory;
protected $fillable = [
        "components",
        "level",
        "us",
        "uk",
        "europe",
        "asean",
        "brazil",
        "mexico",
        "india",
    ];
}
