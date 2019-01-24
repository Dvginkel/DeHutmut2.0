<?php

namespace App\Http\Controllers\beheer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;
use Image;
use App\User;
use App\Categories;
use App\subCategories;
use \Storage;
use Session;
use Redirect;

class ProductController extends Controller
{
    /**
     *  Code to restore deleted_at rows
     *  $products = Product::withTrashed()
        ->where('active', 1)
        ->restore();
     */

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $request->user()->authorizeRoles(['Beheerder']);
        $products = Product::where('products.active',1)
        ->select('products.*')
        ->simplePaginate(50);

        $categories = Categories::with('subCategories')->get();
       
        return view('beheer.products.index', compact('products', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        // save Product to Database
        $productNumber = request('prodId');
        $productName = request('name');
        $description = request('description');
        $color = request('color');
        $size = request('size');
        $age = request('age');
        $cat_id = request('subCat');

        $image      = $request->file('photo');
        $fileName   = $productNumber . '_' . $productName . '_'. time() . '.' . $image->getClientOriginalExtension();
        $img = Image::make($image->getRealPath());
        $img->resize(800, 600, function ($constraint) {
            $constraint->aspectRatio();
        });
        $img->orientate();
        $img->stream();

        $savePhoto = Storage::disk('public')->put('/products/'.$fileName, $img, 'public');

        if ($savePhoto) {
            product::create([
                'product_number' => $productNumber,
                'name' => $productName,
                'description' => $description,
                'color' => $color,
                'size' => $size,
                'age' => $age,
                'cat_id' => $cat_id,
                'photo' => '/storage/products/'. $fileName,
                'active' => 1,
            ]);
            
            return redirect()->action('beheer\ProductController@index')->with('success', 'Product is toegevoegd!.');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'productNumber' => 'required',
            'productName' => 'required',
            'productDescription' => 'required',
            'productCategorie' => 'required',
            'productActive'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        return view('beheer.products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        
            // store
            $nerd = Product::find($id);
            $nerd->name     = request()->name;
            $nerd->description = request()->description;
            $nerd->color    = request()->color;
            $nerd->size     = request()->size;
            $nerd->age      = request()->age;
            $nerd->cat_id   = request()->cat_id;
            $nerd->photo    = request()->photo;
            $nerd->active   = request()->active;
            $nerd->save();

            // redirect
            return redirect()->action('beheer\ProductController@index')->with('success', 'Product is gewijzigd!.');
        
        
        //return $request;
        //$product_number = $request->productNumber;
        $name = $request->name;
        $description = $request->description;
        $size =  $request->size;
        $color = $request->color;
        if ($size <= 68) {
            $ageTmp = str_replace("Maanden", "", $request->age);
            $age = $ageTmp;
        } else {
            $ageTmp = str_replace("Jaar", "", $request->age);
            $age = $ageTmp;
        }
        
        return redirect()->action('beheer\ProductController@index')->with('status', 'Product is gewijzigd.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
