<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmployeePortrait extends Model
{
    //
    public function employee()
    {
        return $this->hasOne(Employee::class);
    }
}
