<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Member extends Model
{
    use SoftDeletes;

    protected $table = 'members';

    public function membership_type()
    {
        return $this->belongsTo(MembershipType::class, 'membership_type_id');
    }
    
    public function city()
    {
        return $this->belongsTo(City::class,'city_id');
    }

    public function gender()
    {
        return $this->belongsTo(Gender::class,'gender_id');
    }

    public function portrait()
    {
        return $this->hasOne(MemberPortrait::class);
    }

    public function fingerprint()
    {
        return $this->hasOne(MemberFingerprint::class);
    }

    public function driver()
    {
        return $this->hasOne(MemberDriver::class);
    }

    public function operator()
    {
        return $this->hasOne(MemberOperator::class);
    }



}
