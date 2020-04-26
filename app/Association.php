<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Association extends Model
{
    protected $table = 'association';
    protected $primaryKey = 'association_id';

    public function members()
    {
        return $this->hasMany(Member::class);
    }


}
