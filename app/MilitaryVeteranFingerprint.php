<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MilitaryVeteranFingerprint extends Model
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
    protected $visible = ['id', 'military_veteran_id'];

    protected $table = 'military_veteran_fingerprints';

    public function military_veteran()
    {
        return $this->belongsTo(MilitaryVeteran::class, 'military_veteran_id');
    }
}
