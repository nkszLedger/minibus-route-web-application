<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MemberRegionAssociation extends Model
{
    protected $table = 'member_region_associations';

    public function region()
    {
        return $this->hasMany(Region::class);
    }

    public function association()
    {
        return $this->hasMany(Association::class);
    }

    public function member()
    {
        return $this->hasMany(Member::class);
    }
}
