<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmployeeFingerprint extends Model
{
    protected $table = 'employee_fingerprint';

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}
