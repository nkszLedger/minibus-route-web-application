<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $table = 'city';

    protected $primaryKey = 'city_id';

    public function members()
    {
        return $this->hasMany(Member::class);
    }
}
