<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class School extends Model
{
    use SoftDeletes;

    protected $table = 'schools';

    public function military_veteran_delegated_school()
    {
        return $this->hasMany(MilitaryVeteransDelegatedSchools::class);
    }

    public function level()
    {
        return $this->belongsTo(SchoolLevel::class, 'level_id');
    }

    public function sector()
    {
        return $this->belongsTo(SchoolSector::class, 'sector_id');
    }

    public function type()
    {
        return $this->belongsTo(SchoolType::class, 'type_of_institution_id');
    }

    public function region()
    {
        return $this->belongsTo(Region::class, 'region_id');
    }

    public function metropolitan_municipality()
    {
        return $this->belongsTo(MetropolitanMunicipality::class, 'metropolitan_municipality_id');
    }

    public function local_municipality()
    {
        return $this->belongsTo(LocalMunicipality::class, 'local_municipality_id');
    }

}
