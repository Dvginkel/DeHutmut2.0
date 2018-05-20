<?php

namespace App;

use App\Model;
use App\Product;

class subCategories extends Model
{
      public function Categories()
    {
        return $this->belongsTo(Categories::class,  'id');
    }

    public function product()
    {
        return $this->BelongsToMany(Product::class, 'id');
    }
}
