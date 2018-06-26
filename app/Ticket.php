<?php

namespace App;

use App\Model;
use App\Draw;
use App\Product;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ticket extends Model
{
    use SoftDeletes;
    
    public function eindeLoting($value)
    {
        return $value->format('d-m-Y H:i:s');
    }

    public function draw()
    {
       return $this->hasMany(Draw::class, 'id');
    }
}
