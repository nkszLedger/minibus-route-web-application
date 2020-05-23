<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MemberDriver extends Model
{
    protected $table = 'member_driver';

    public function member()
    {
        return $this->belongsTo(Member::class);
    }
}