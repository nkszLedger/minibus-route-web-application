<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MilitaryVeteran extends Model
{
    use SoftDeletes;

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'emergency_contact_name',
        'emergency_contact_relationship',
        'emergency_contact_number',
        'address_line', 'surburb',
        'postal_code', 'city_id',
        'province_id', 'region_id'
    ];  

    protected $table = 'military_veterans';

    public function region()
    {
        return $this->belongsTo(Region::class,'region_id');
    }

    public function province()
    {
        return $this->belongsTo(Province::class,'province_id');
    }

    public function city()
    {
        return $this->belongsTo(City::class,'city_id');
    }

    public function gender()
    {
        return $this->belongsTo(Gender::class,'gender_id');
    }
}
