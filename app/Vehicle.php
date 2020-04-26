<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    public function members()
    {
        return $this->belongsToMany(Member::class);
    }

    public function routes()
    {
        return $this->belongsToMany(Route::class);
    }
}
