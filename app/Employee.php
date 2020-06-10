<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $table = 'employees';

    public function portrait()
    {
        return $this->hasOne(EmployeePortrait::class);
    }

    public function fingerprint()
    {
        return $this->hasOne(EmployeeFingerprint::class);
    }

    public function region()
    {
        return $this->belongsTo(Region::class,'region_id');
    }

    public function province()
    {
        return $this->belongsTo(Province::class,'province_id');
    }

    public function city()
    {
        return $this->belongsTo(City::class,'city_id');
    }
}
