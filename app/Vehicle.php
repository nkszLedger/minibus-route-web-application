<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
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
