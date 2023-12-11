<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Advance extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $hidden = ['created_at','updated_at'];


    public function trip()
    {
        return $this->belongsTo(Trip::class,'trip_id');
    }
}
