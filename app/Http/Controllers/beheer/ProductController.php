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

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $request->user()->authorizeRoles(['Beheerder']);

        //$products = Product::paginate(25);
        $products = Product::join('sub_categories', 'products.cat_id', '=', 'sub_categories.id')
        ->select('products.*', 'sub_categories.name as catName')
        ->paginate(150);
        #return $products;
        $categories = Categories::all();


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
            //return redirect('/beheer/products')->with('status', 'Product is toegevoegd!');
            return redirect()->action('beheer\ProductController@index')->with('status', 'Product is toegevoegd!.');
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
        $product = Product::findOrFail($id);
        $categorieName = subCategories::find($product->cat_id);
        //return $categorieName->name;
        $catTests = Categories::with('subCategories')->get();
        //dd($catTest);
        return view('beheer.products.edit', compact('product', 'catTests', 'categorieName'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        #return $request;
        $product_number = $request->productNumber;
        $name = $request->productName;
        $description = $request->productDescription;
        $size =  $request->productSize;
        $color = $request->productColor;
        if ($size <= 68) {
            $ageTmp = str_replace("Maanden", "", $request->productAge);
            $age = $ageTmp;
        } else {
            $ageTmp = str_replace("Jaar", "", $request->productAge);
            $age = $ageTmp;
        }
        $updateRecord = Product::findOrFail($id);
        $getCatIdByName = $request->productCategorie;
        #dd($getCatIdByName);
        $cat_id = subCategories::where('name', '=', $getCatIdByName)->pluck('id')->first();
        #dd($cat_id);

        $updateRecord->product_number = $product_number;
        $updateRecord->name = $name;
        $updateRecord->description = $description;
        $updateRecord->size = $size;
        $updateRecord->color = $color;
        $updateRecord->age = $age;
        $updateRecord->cat_id = $cat_id;
        $updateRecord->save();
        #dd($updateRecord);
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
