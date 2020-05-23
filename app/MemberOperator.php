<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MemberOperator extends Model
{
    protected $table = 'member_operator';

    public function member()
    {
        return $this->belongsTo(Member::class);
    }
}