<?php

namespace App\Http\Controllers\beheer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Categories;
use App\subCategories;



class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Categories::all();
        return view('beheer.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         # dd(request());
        $catType = request('CatType');
        $belongsToCat = request('belongsToCat');
        $catName = request('catName');
        $catDescription = request('catDescription');

        // Check what we have to add new cat or sub cat
       if($catType === "subCat")
       {
            // Add new Category to existing main categorie
            subCategories::create([
                'name' => $catName,
                'description' => $catDescription,
                'slug' => strtolower($catName),
                'photo' => '/storage/store/noimage.png',
                'active' => '1',
                'categories_id' => $belongsToCat
            ]);

            // New category has been added, add a todo for me
            // Get Main Cat Name
            $mainCatName = Categories::find($belongsToCat)->first();
            Todo::create([
                'title' => "Categorie afbeelding toevoegen",
                'user_id' => 1,
                'description' => 'Voor de subcategorie: ' . $catName. ' in '.$mainCatName->name .' moet een afbeelding komen.',
                'priority' => "normaal",
                'completed' => 0,
            ]);
            return Redirect::to('beheer/categories');
       } else {
            // Create a New Parent Category
             Categories::create([
                'name' => $catName,
                'slug' => strtolower($catName),
                'description' => $catDescription,
                'photo' => '/storage/store/noimage.png',
                'active' => '1',
            ]);
             // New category has been added, add a todo for me
            // Get Main Cat Name

            Todo::create([
                'title' => "Categorie afbeelding toevoegen",
                'user_id' => 1,
                'description' => 'Voor de categorie: ' . $catName. ' moet een afbeelding komen.',
                'priority' => "normaal",
                'completed' => 0,
            ]);
            return Redirect::to('beheer/categories');
       }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('beheer.categories.edit');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        #return $id;
        $category = Categories::findOrFail($id);
        return view('beheer.categories.edit', compact('category'));
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
        $categoryUpdate = Categories::findOrFail($id);
        $input = $request->all();
        $test = $categoryUpdate->fill($input)->save();
        return redirect()->action('beheer\CategoryController@index')->with('status', 'Categorie is bijgewerkt.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        dd($id);
    }
}
