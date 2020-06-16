<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VehicleClass extends Model
{
    protected $table = 'vehicle_class';

    public function type()
    {
        return $this->belongsTo(VehicleType::class, 'vehicle_type_id');
    }

    public function vehicle()
    {
        return $this->hasMany(Vehicle::class);
    }

}
