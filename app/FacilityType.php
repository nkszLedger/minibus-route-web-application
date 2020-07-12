<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FacilityType extends Model
{
    protected $table = 'facility_types';

    public function facility()
    {
        return $this->hasMany(Facility::class);
    }
}
