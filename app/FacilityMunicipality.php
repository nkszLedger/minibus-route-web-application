<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FacilityMunicipality extends Model
{
    protected $table = 'facility_municipality';

    public function facility()
    {
        return $this->hasMany(Facility::class);
    }
}
