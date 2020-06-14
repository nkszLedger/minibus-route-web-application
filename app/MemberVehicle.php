<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MemberVehicle extends Model
{
    protected $table = 'member_vehicle';

    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class, 'vehicle_id');
    }
}
