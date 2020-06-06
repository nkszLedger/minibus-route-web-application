<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $table = 'members';
    protected $hidden = [
        'phone_number', 'city_id',
        'address_line', 'postal_code',
        'membership_type_id',
        'is_member_associated'
    ];

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
