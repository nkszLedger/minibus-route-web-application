<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
    public function bank_accounts()
    {
        return $this->hasMany(BankAccount::class);
    }
}
