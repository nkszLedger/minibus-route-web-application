<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
    protected $table = 'banks';

    public function bank_accounts()
    {
        return $this->hasMany(BankAccount::class);
    }
}
