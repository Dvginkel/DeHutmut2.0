<?php

namespace App;

use App\Model;

class Categories extends Model
{
    public function subCategories()
    {
        //return $this->hasMany(Categories::class,  'id');
        return $this->hasMany(subCategories::class);
    }
}
