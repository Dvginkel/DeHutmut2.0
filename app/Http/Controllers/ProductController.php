<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use App\subCategories;
use App\Categories;
use App\Draw;
use App\Ticket;
use App\Size;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    /**
    * Create a new controller instance.
    *
    * @return void
    */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        //$products = Product::where('active','=', '1')->get();
        $products = Product::where('active', '=', '1')->get();

        dd($products);
        return view('store.show', compact('products'));
    }

    public function show($id, $slug)
    {

        // Filter out products where user has a draw on.
        $user = auth()->user();
        $userTickets = $user->tickets->pluck('draw_id')->toArray();
        $connectedProductIds = Draw::whereIn('id', $userTickets)->pluck('product_id')->toArray();
        $products = Product::whereNotIn('id', $connectedProductIds)
        ->where('cat_id', '=', $id)
        ->where('active', '=', 1)
        ->paginate(10);
        #dd($products);
        $sizes = Size::where('gender', '=', $id)->get();

        $colors = Product::select('color')->groupBy('color')->distinct()->where('color', '!=', '')->get();
        $ages = Size::select('age as leeftijd', 'id')->distinct()->where('age', '!=', '')
        ->where('gender', '=', $id)
        ->orderBy('id', 'asc')
        ->get();
        $cat_id = $id;

        return view('store.productDetails', compact('products', 'sizes', 'colors', 'ages', 'cat_id'));
    }

    public function store()
    {
        $this->validate(request(), [
            'title' => 'required',
            'body' => 'required'
        ]);

        auth()->user()->publish(
            new Post(request(['title', 'body']))
        );

        return redirect('/');
    }

    public function getProductname($product_id)
    {
        $productName = Product::where('id', '=', $product_id)->get();
        dd($productName);
        //return $productName;
    }

    public function search(Request $request)
    {
        $query = Product::where('active', '=', 1);

        if ($request->has('productSize')) {
            if ($request->productSize != "Maat") {
                $sizeLength = strlen($request->productSize);
                $size = $request->productSize;
                if ($sizeLength > 4) {
                    $sizes[] = explode('-', $request->productSize);
                    $query->whereBetween('size', $sizes);
                } else {
                    $query->where('size', '=', $size);
                }
            }
        }

        if ($request->has('productColor')) {
            if ($request->productColor != "Kleur") {
                $query->where('color', '=', $request->input('productColor'));
            }
        }

        if ($request->has('productAge')) {
            if ($request->productAge != "Leeftijd") {
                $query->where('age', '=', $request->input('productAge'));
            }
        }

        $query->where('cat_id', '=', $request->input('cat_id'));
        $searchResults =  $query->get();
        return view('store.search', compact('searchResults'));
    }
}
