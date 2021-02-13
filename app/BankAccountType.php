<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BankAccountType extends Model
{
    public function bank_account()
    {
        return $this->hasOne(BankAccount::class);
    }
}
