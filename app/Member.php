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

    public function vehicles()
    {
        return $this->belongsToMany(Vehicle::class);
    }
    
    public function city()
    {
        return $this->belongsTo(City::class,'city_id');
    }

}
