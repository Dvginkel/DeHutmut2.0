<?php

namespace App\Http\Controllers;

use App\Categories;
use App\subCategories;
use App\Product;
use Carbon\Carbon;
use App\Size;
class subCategoriesController extends Controller
{
    public function index($id, $slug)
    {
          $sizes = Size::where('gender', '=', $id)->get();
                $colors = Product::select('color')->groupBy('color')->distinct()->where('color', '!=', '')->get();
                $ages = Size::select('age as leeftijd','id')->distinct()->where('age', '!=', '')
                ->where('gender', '=', $id)
                ->orderBy('id', 'asc')
                ->get();
                $cat_id = $id;

        switch ($slug) {
            case 'allesopeenhoop':
                echo 'Hallo';
                 // Get SubCategories
                $products  = product::where('active', '=', 1)
                ->orderBy('name', 'ASC')
                ->paginate(6);
                #dd($subCategories);
                return view('store.productDetails', compact('products', 'sizes', 'colors', 'ages'));
                break;
            case 'recenttoegevoegd':
            echo 'Wereld';
                $currentDateTime = Carbon::now();
                $twoDaysAgo = Carbon::now()->subDays(2);
               #return $twoDaysAgo;
                 // Get SubCategories
                $products  = Product::whereBetween('created_at', ['2018-05-18 00:00:00', '2018-05-20 00:00:00'])
                ->orderBy('name', 'ASC')
                ->paginate(6);
                dd($products);
                return view('store.productDetails', compact('products', 'sizes', 'colors', 'ages'));
                break;
            default:
                // Get SubCategories
                $subCategories = SubCategories::where('categories_id', '=', $id)
                ->orderBy('name', 'ASC')
                ->paginate(6);
                #dd($subCategories);
                return view('store.show', compact('subCategories', 'slug'));
                break;
        }


    }
}
