<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MembershipType extends Model
{

    public function member()
    {
        return $this->hasMany(Member::class);
    }
}
