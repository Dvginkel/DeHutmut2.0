<?php

namespace App;

use App\Model;
use App\Product;
use Illuminate\Database\Eloquent\SoftDeletes;


class subCategories extends Model
{
    use SoftDeletes;
    
    public function Categories()
    {
        return $this->belongsTo(Categories::class, 'id');
    }

    public function product()
    {
        return $this->BelongsToMany(Product::class, 'id');
    }
}
