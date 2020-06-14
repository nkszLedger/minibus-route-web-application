<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VehicleType extends Model
{
    protected $table = 'vehicle_types';

    public function vehicleclass()
    {
        return $this->hasMany(VehicleClass::class);
    }
}
