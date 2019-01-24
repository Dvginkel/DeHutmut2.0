<?php

namespace App;

use App\Model;
use App\User;
use App\Product;

class Draw extends Model
{
    public function draw()
    {
        return $this->belongsToMany(Product::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
   
    public function tickets()
    {
        return $this->hasMany(Ticket::class, 'draw_id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
