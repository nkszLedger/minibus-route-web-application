<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MilitaryVeteran extends Model
{
    use SoftDeletes;

    /*
        /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'surname' ,
            'email','id_number' ,'phone_number',
            'address_line', 'surburb','postal_code', 
            'city', 'province','gender' , 'mvregion', 
            'emergency_contact_name',
            'emergency_contact_relationship' ,
            'emergency_contact_number',
            'region_leader_name','region_leader_contact_number',
            'number_of_delegated_schools',
            'list_of_delegated_schools'
    ];
    
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
