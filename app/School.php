<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    protected $table = 'schools';

    public function military_veteran_delegated_school()
    {
        return $this->hasMany(MilitaryVeteransDelegatedSchools::class);
    }

    public function level()
    {
        return $this->hasOne(SchoolLevel::class);
    }

    public function sector()
    {
        return $this->hasOne(SchoolSector::class);
    }

    public function type()
    {
        return $this->hasOne(SchoolType::class);
    }

}
