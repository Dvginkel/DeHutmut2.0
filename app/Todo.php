<?php

namespace App;

use App\Model;

class Todo extends Model
{
    public function user()
    {
        return $this->hasMany(User::class, 'id');
    }
}
