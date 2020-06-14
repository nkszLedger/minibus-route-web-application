<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DrivingLicenceCode extends Model
{
    protected $table = 'driving_licence_codes';

    public function member()
    {
        return $this->hasMany(Member::class);
    }

    public function driver()
    {
        return $this->hasMany(MemberDriver::class);
    }
}
