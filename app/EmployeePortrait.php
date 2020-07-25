<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmployeePortrait extends Model
{
     /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'portrait',
    ];

    /**
     * The attributes that should be visible in arrays.
     *
     * @var array
     */
    protected $visible = ['id', 'employee_id'];
    
    protected $table = 'employee_portrait';

    public function employee()
    {
        return $this->belongsTo(Employee::class, 'employee_id');
    }
}
