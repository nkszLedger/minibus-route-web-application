<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BankAccountType extends Model
{
    protected $table = 'bank_account_types';

    public function bank_account()
    {
        return $this->hasMany(BankAccount::class);
    }
}
