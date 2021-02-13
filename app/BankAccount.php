<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BankAccount extends Model
{
    public function bank()
    {
        return $this->belongsTo(Bank::class,'bank_id');
    }

    public function bank_account_type()
    {
        return $this->belongTo(BankAccountType::class,'bank_account_type_id');
    }
}
