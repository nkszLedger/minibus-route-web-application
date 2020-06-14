<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

Carbon::setToStringFormat('Y-m-d');

class MemberDriver extends Model
{
    protected $table = 'member_driver';
    protected $dates = ['valid_from', 'valid_until'];

    public function member()
    {
        return $this->belongsTo(Member::class);
    }

    public function codes()
    {
        return $this->belongsTo(DrivingLicenceCode::class, 'driving_licence_code_id');
    }
}