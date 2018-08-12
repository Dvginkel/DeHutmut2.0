<?php

namespace App\Http\Controllers;

use App\Categories;
use App\subCategories;
use App\Product;
use Illuminate\Support\Facades\Redis;
use \DB;

class CategoriesController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth');
    }

    public function index()
    {
        $mainCategories = Categories::with('subCategories')
        ->orderBy('name', 'ASC')
        ->paginate(12);
        
        return view('store.index', compact('mainCategories', 'subCategories'));
    }

    public function subCategory($category)
    {
        $categories = subCategories::find($id)->subCategories;
        
        $slug = Categories::find($id)->where('id', '=', $id)->first();
        return view('store.show', compact('categories', 'slug'));
    }

    public function countProducts($id)
    {
        $count = Product::where('cat_id', $id)->count();
        return $count;
    }
}
