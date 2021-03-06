<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmployeeOrganization extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'employee_id',  
        'association_id',  
        'facility_taxi_rank_id',
        'regional_coordinator_full_name', 
        'association_name','subordinate_taxi_ranks', 
        'regional_coordinator_contact_details',
        'facility_manager_full_name',
        'facility_manager_contact_details'
    ];

    protected $table = 'employee_organizations';

    public function employee()
    {
        return $this->belongsTo(Employee::class, 'employee_id');
    }

    public function association()
    {
        return $this->belongsTo(Association::class, 'association_id');
    }

    public function facility()
    {
        return $this->belongsTo(Facility::class, 'facility_taxi_rank_id');
    }
}
