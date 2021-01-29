<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SchoolLevel extends Model
{
    protected $table = 'school_levels';

    public function school()
    {
        return $this->hasMany(Schools::class);
    }
}
