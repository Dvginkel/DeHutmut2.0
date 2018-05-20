<?php

namespace App;

use App\Model;
use App\subCategories;

class Product extends Model
{
    public function draws()
    {
        return $this->belongsToMany(Draw::class)
        ->withPivot('user_id');
    }

    public function subCategories()
    {
       return $this->hasOne(subCategories::class, 'id');
    }
    // public function user_id()
    // {
    //     return $this->belongsToMany(User::class, 'draw_product');
    // }
}
