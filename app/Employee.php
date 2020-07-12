<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Employee extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'surname', 'employee_number',
        'id_number', 'phone_number', 'email', 
        'emergency_contact_name',
        'emergency_contact_relationship',
        'emergency_contact_number',
        'address_line', 'surburb',
        'postal_code', 'city_id',
        'province_id', 'region_id'
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

    protected $table = 'employees';

    public function portrait()
    {
        return $this->hasOne(EmployeePortrait::class);
    }

    public function fingerprint()
    {
        return $this->hasOne(EmployeeFingerprint::class);
    }

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

    public function position()
    {
        return $this->belongsTo(EmployeePosition::class,'position_id');
    }

    public function organization()
    {
        return $this->hasMany(EmployeeOrganization::class);
    }
}
