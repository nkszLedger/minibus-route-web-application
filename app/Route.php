<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Route extends Model
{
    protected $table = 'route';

    public function vehicles()
    {
        return $this->belongsToMany(Vehicle::class);
    }
}
