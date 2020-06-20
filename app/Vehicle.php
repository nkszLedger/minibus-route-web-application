<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Vehicle extends Model
{
    use SoftDeletes;

    protected $table = 'vehicle';

    public function vehicleclass()
    {
        return $this->belongsTo(VehicleClass::class,'vehicle_class_id');
    }

    public function membervehicle()
    {
        return $this->hasMany(MemberVehicle::class);
    }
}
