<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    /*
        /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'NatEmis', 'ProvinceCD', 
        'Province', 'Institution_Name',	
        'Status', 'Sector', 	
        'Type_DoE', 'Phase', 
        'Specialization', 'OwnerLand', 	
        'OwnerBuild', 'Ownership',	
        'ExDept', 'PaypointNo',
        'ComponentNo',	'ExamNo',	
        'ExamCentre', 'GIS_Longitude',	
        'GIS_Latitude',	'GISSource', 	
        'Magisterial_District',	
        'DMunName',	'LMunName',	
        'Ward_ID',	'EIRegion',	
        'EIDistrict',	'EICircuit',	
        'Addressee', 'Township_Village',	
        'Suburb', 'Town_City',	
        'StreetAddress', 'PostalAddress',	
        'Telephone', 'Facsimile', 	
        'cellno', 'E_Mail', 	
        'Section21', 'Section21_Funct', 'Quintile', 	
        'NAS', 'NodalArea',	'RegistrationDate', 	
        'NoFeeSchool', 'Allocation', 	
        'Urban_Rural', 'Open_Boarding_school', 	
        'ANA_School', 'Full_Service_School', 
        'School_Prototype_size'

    ];

    public function province()
    {
        return $this->belongsTo(Province::class,'ProvinceCD');
    }
}
