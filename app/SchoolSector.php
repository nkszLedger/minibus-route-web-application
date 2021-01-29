<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SchoolSector extends Model
{
    protected $table = 'school_sectors';

    
    public function school()
    {
        return $this->hasMany(Schools::class);
    }
}
