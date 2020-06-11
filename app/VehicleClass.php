<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VehicleClass extends Model
{
    protected $table = 'vehicle_class';

    public function vehicleType()
    {
        return $this->belongsTo(VehicleType::class);
    }

}
