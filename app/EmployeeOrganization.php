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
}
