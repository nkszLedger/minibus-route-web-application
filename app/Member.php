<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{

    public function membership_type()
    {
        return $this->belongsTo(MembershipType::class, 'membership_type_id');
    }

    public function vehicles()
    {
        return $this->belongsToMany(Vehicle::class);
    }

    public function portrait()
    {
        return $this->hasOne(Portrait::class);
    }

    public function fingerprint()
    {
        return $this->hasOne(Fingerprint::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class,'city_id');
    }

}
