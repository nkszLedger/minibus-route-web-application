<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmployeeOrganization extends Model
{
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
