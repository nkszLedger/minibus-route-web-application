<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BankAccount extends Model
{
    protected $table = 'bank_accounts';

    protected $fillable = ['bank_id', 'branch_name' ,
        'branch_code','account_number' ,
        'account_holder', 'bank_account_type_id', 'comments',
    ];

    public function bank()
    {
        return $this->belongsTo(Bank::class,'bank_id');
    }

    public function bank_account_type()
    {
        return $this->belongTo(BankAccountType::class,'bank_account_type_id');
    }

    public function military_veteran()
    {
        return $this->hasMany(MilitaryVeteran::class);
    }
}
