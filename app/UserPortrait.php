<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserPortrait extends Model
{
    protected $table = 'user_portraits';

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
