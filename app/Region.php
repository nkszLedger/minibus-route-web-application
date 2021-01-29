<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    protected $table = 'regions';

    protected $primaryKey = 'region_id';

    public function members()
    {
        return $this->hasMany(Member::class);
    }

    public function metropolitan_municipality()
    {
        return $this->hasOne(MetropolitanMunicipality::class);
    }

    public function school()
    {
        return $this->hasMany(School::class);
    }
}
