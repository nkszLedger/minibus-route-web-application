<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EmployeeVerification extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'employee_id',
        'association_approved',
        'letter_issued',
        'letter_signed', 
    ];
    
    protected $table = 'employee_verifications';

    public function employee()
    {
        return $this->belongsTo(Employee::class, 'employee_id');
    }
}
