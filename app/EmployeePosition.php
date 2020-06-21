<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmployeePosition extends Model
{
    protected $table = 'employee_positions';

    public function employee()
    {
        return $this->hasMany(Employee::class);
    }
}
