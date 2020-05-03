<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cities extends Model
{
    protected $primaryKey = 'city_id';

    public function members()
    {
        return $this->hasMany(Member::class);
    }
}
