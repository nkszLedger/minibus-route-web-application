<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Facility extends Model
{
    protected $table = 'facility';

    public function type()
    {
        return $this->belongsTo(FacilityType::class, 'type_id');
    }

    public function municipality()
    {
        return $this->belongsTo(FacilityMunicipality::class,'municipality_id');
    }
}
