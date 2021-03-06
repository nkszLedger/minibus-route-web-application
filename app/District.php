<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    public function region()
    {
        return $this->belongsTo(Region::class,'region_id');
    }

    public function province()
    {
        return $this->belongsTo(Province::class,'province_id');
    }

    public function country()
    {
        return $this->belongsTo(Province::class,'country_id');
    }
}
