<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MemberFingerprint extends Model
{
    protected $table = 'member_fingerprint';
    protected $primaryKey = 'member_id';

    protected $fillable = [
        'member_id', 'fingerprint_left_thumb', 'fingerprint_right_thumb'
    ];

    public function member()
    {
        return $this->hasOne(Member::class);
    }
}
