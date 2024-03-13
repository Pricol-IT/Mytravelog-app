<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    use HasFactory;

    protected $fillable = [
        "trip_id",
        "service",
        "from",
        "to",
        "cost",
        "ticket",
    ];


    public function trip()
    {
        return $this->belongsTo(Trip::class,'trip_id');
    }
}
