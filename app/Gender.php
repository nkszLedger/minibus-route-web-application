<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gender extends Model
{
    protected $table = 'genders';

    public function member()
    {
        return $this->hasMany(Member::class);
    }

    public function employee()
    {
        return $this->hasMany(Employee::class);
    }
}
