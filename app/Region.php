<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Region extends Model
{

    protected $primaryKey = 'region_id';

    public function members()
    {
        return $this->hasMany(Member::class);
    }
}
