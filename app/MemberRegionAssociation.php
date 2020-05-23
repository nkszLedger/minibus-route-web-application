<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MemberRegionAssociation extends Model
{
    protected $table = 'member_region_association';

    public function member()
    {
        return $this->hasOne(Member::class,'member_id');
    }

    public function association()
    {
        return $this->belongsTo(Association::class,'association_id');
    }

    public function region()
    {
        return $this->belongsTo(Region::class,'region_id');
    }
}
