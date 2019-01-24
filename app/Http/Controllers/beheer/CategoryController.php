<?php

namespace App\Http\Controllers\beheer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Categories;
use App\subCategories;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Carbon;

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
        $categories1 = Categories::pluck('name', 'description', 'id');
        return view('beheer.categories.index', compact('categories', 'categories1'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $categoryName = $request->name;
        $categoryDescription = $request->description;

        $currentDT = Carbon\Carbon::now()->format('d_M_Y_H_i_s');

        if ($request->hasFile('photo')) {
            if ($request->file('photo')->isValid()) {
                $path = $request->file('photo')->storeAs('public/store/categories/',  '' .$categoryName. '_'.$currentDT.'.jpg');
                $categoryCoverImage = str_replace('public','storage', $path);
            } 
        } else {
            $categoryCoverImage = "storage/store/noimage.png";
            // Notify developer / designer. An image has to be created for added category.
        }
       
        $catNameToSlug = strtolower($categoryName);
        $slug = str_replace(" ", '', $catNameToSlug);

        $category = new Categories;
        $category->name = $categoryName;
        $category->slug = $slug;
        $category->description = $categoryDescription;
        $category->photo = $categoryCoverImage;
        $category->active = 1;
        $test = $category->save();

        if ($test) {
            return redirect()->action('beheer\CategoryController@index')->with('success', 'Categorie is toegevoegd.');
        }
    }

    /**
     * Store Sub Category.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       #dd($request);
        $categoryName = $request->name;
        $catDescription = $request->description;
        $belongsToCat = $request->manCatId;
        $currentDT = Carbon\Carbon::now()->format('d_M_Y_H_i_s');

        if ($request->hasFile('subCatPhoto')) {
            if ($request->file('subCatPhoto')->isValid()) {
                $path = $request->file('subCatPhoto')->storeAs('public/store/categories/',  '' .$categoryName. '_'.$currentDT.'.jpg');
                $categoryCoverImage = str_replace('public','/storage', $path);
            } 
        } else {
            $categoryCoverImage = "/storage/store/noimage.png";
            // Notify developer / designer. An image has to be created for added category.
        }
      
        // Add new Category to existing main categorie
        subCategories::create([
            'name' => $categoryName,
            'description' => $catDescription,
            'slug' => strtolower($categoryName),
            'photo' => $categoryCoverImage,
            'active' => '1',
            'categories_id' => $belongsToCat
        ]);

        return redirect()->action('beheer\CategoryController@index')->with('success', 'Sub Categorie is toegevoegd.');

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
