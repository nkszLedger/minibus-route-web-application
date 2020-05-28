<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MemberPortrait extends Model
{
    protected $table = 'member_portrait';

    protected $fillable = [
        'member_id', 'portrait'
    ];

    public function member()
    {
        return $this->hasOne(Member::class);
    }
}
