<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $hidden = ['created_at','updated_at'];

    public function flight()
    {
        return $this->hasMany(Flight::class,'trip_id');
    }
    public function train()
    {
        return $this->hasMany(Train::class,'trip_id');
    }
    public function bus()
    {
        return $this->hasMany(Bus::class,'trip_id');
    }
    public function taxi()
    {
        return $this->hasMany(Taxi::class,'trip_id');
    }
    public function accommodation()
    {
        return $this->hasMany(Accomadation::class,'trip_id');
    }
    public function advance()
    {
        return $this->hasMany(Advance::class,'trip_id');
    }
    public function connectivity()
    {
        return $this->hasMany(Connectivity::class,'trip_id');
    }
    public function forex()
    {
        return $this->hasMany(Forex::class,'trip_id');
    }
}
