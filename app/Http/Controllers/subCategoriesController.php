<?php

namespace App\Http\Controllers;

use App\Categories;
use App\subCategories;
use App\Product;
use Carbon\Carbon;
use App\Size;
use Illuminate\Database\Eloquent\SoftDeletes;

class subCategoriesController extends Controller
{
    use SoftDeletes;

    protected $product_id;
    protected $dates = ['deleted_at'];


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
                 // Get SubCategories
                $products  = product::where('active', '=', 1)
                ->orderBy('name', 'ASC')
                ->paginate(6);
                #dd($subCategories);
                return view('store.productDetails', compact('products', 'sizes', 'colors', 'ages'));
                break;
            case 'recenttoegevoegd':
                $currentDateTime = Carbon::now();
                $twoDaysAgo = Carbon::now()->subDays(3);
               #return $twoDaysAgo;
                 // Get SubCategories
                $products  = Product::whereBetween('created_at', array($twoDaysAgo,$currentDateTime ))
                ->orderBy('created_at', 'DESC')
                ->paginate(6);
                #return $products;
                return view('store.productDetails', compact('products', 'sizes', 'colors', 'ages'));
                break;
             case 'sponsorloting':
                return redirect()->action('CategoriesController@index')->with('status', 'Sponsorlotingen werken nog niet.');
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
