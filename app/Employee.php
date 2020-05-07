<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    public function portrait()
    {
        return $this->hasOne(EmployeePortrait::class);
    }

    public function fingerprint()
    {
        return $this->hasOne(EmployeeFingerprint::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class,'city_id');
    }
}
