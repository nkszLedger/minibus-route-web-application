<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MilitaryVeteransDelegatedSchools extends Model
{
    use SoftDeletes;

    protected $table = 'military_veterans_delegated_schools';

    public function school()
    {
        return $this->belongsTo(School::class,'school_id');
    }

    public function military_veteran()
    {
        return $this->belongsTo(MilitaryVeteran::class,'military_veteran_id');
    }
}
