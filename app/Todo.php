<?php

namespace App;

use App\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Todo extends Model
{
    use SoftDeletes;
    
    public function user()
    {
        return $this->hasMany(User::class, 'id');
    }
}
