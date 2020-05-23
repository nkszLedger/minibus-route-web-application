<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MembershipType extends Model
{
    protected $table = 'membership_types';

    public function member()
    {
        return $this->hasMany(Member::class);
    }
}
