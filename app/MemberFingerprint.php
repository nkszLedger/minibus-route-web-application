<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MemberFingerprint extends Model
{
    protected $table = 'member_fingerprint';

    public function member()
    {
        return $this->hasOne(Member::class);
    }
}
