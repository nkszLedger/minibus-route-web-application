<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmployeePortrait extends Model
{
    protected $table = 'employee_portrait';

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}
