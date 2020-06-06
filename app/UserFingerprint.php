<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserFingerprint extends Model
{
    protected $table = 'user_fingerprints';

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
