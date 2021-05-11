<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MilitaryVeteranVerification extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'military_veteran_id',
        'association_approved',
        'letter_issued',
        'letter_signed', 
        'banking_details_confirmed',
    ];
    
    protected $table = 'military_veteran_verifications';

    public function military_veteran()
    {
        return $this->belongsTo(MilitaryVeteran::class, 'military_veteran_id');
    }
}
