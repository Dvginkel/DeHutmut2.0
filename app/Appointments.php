<?php

namespace App;

use App\Model;
use App\User;

class Appointments extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
