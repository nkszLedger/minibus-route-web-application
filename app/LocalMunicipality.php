<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LocalMunicipality extends Model
{
    protected $table = 'local_municipalities';

    protected $primaryKey = 'municipality_id';

    public function metropolitan_municipality()
    {
        return $this->belongsTo(MetropolitanMunicipality::class, 'metropolitan_municipality_id');
    }

    public function school()
    {
        return $this->hasMany(School::class);
    }
    
}
