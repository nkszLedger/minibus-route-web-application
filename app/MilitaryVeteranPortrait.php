<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MilitaryVeteranPortrait extends Model
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
    protected $visible = ['id', 'military_veteran_id'];
    
    protected $table = 'military_veteran_portraits';

    public function military_veteran()
    {
        return $this->belongsTo(MilitaryVeteran::class, 'military_veteran_id');
    }
}
