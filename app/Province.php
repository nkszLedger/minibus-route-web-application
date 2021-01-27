<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    protected $table = 'provinces';

    public function employee()
    {
        return $this->belongsToMany(Employee::class);
    }

    public function metropolitan_municipality()
    {
        return $this->hasMany(MetropolitanMunicipality::class);
    }
    
}
