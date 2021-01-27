<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LocalMunicipality extends Model
{
    public function metropolitan_municipality()
    {
        return $this->belongsTo(MetropolitanMunicipality::class, 'metropolitan_municipality_id');
    }
}
