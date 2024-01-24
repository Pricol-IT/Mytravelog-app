<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DomesticPolicy extends Model
{
    use HasFactory;

    protected $fillable = [
        "components",
        "junior_tier1",
        "junior_tier2",
        "junior_tier3",
        "middle_tier1",
        "middle_tier2",
        "middle_tier3",
        "senior_tier1",
        "senior_tier2", 
        "senior_tier3",
    ];
}
