<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Route extends Model
{
//    protected $primaryKey = 'route_id';


    public function vehicles()
    {
        return $this->belongsToMany(Vehicle::class);
    }
}
