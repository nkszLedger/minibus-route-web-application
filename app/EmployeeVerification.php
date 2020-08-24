<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmployeeVerification extends Model
{
    protected $table = 'employee_verifications';

    public function employee()
    {
        return $this->belongsTo(Employee::class, 'employee_id');
    }
}
