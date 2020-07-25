<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmployeeFingerprint extends Model
{
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'fingerprint_wsq',
        'fingerprint',
    ];

    /**
     * The attributes that should be visible in arrays.
     *
     * @var array
     */
    protected $visible = ['id', 'employee_id'];

    protected $table = 'employee_fingerprint';

    public function employee()
    {
        return $this->belongsTo(Employee::class, 'employee_id');
    }
}
