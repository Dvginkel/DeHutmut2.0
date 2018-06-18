<?php

use Illuminate\Http\Request;
use App\Product;
use App\Categories;
use App\subCategories;
use App\Size;
use App\Faq;
use App\Post;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('product', function () {
    // If the Content-Type and Accept headers are set to 'application/json',
    // this will return a JSON structure. This will be cleaned up later.
    return Product::paginate();
});

Route::get('product/{id}', function ($id) {
    return Product::find($id);
});

Route::get('category/{id}', function (Request $request, $id) {
    return Categories::with('subCategories')->findOrFail($id);
});

Route::post('category/{id}/update', function (Request $request, $id) {
    $test = Categories::where('id', '=', $id)->first();

    $test->update([
        'active' => $request['active']
    ]);

    $msg = ['status', 'Task was successful!'];
    return json_encode($msg);
});

Route::get('size/{id}', function ($id) {
    //return Size::where('size','=',$id)->pluck('age');
    return Size::where('size', '=', $id)->get();
});

Route::get('age/{age}', function ($id) {
    //return Size::where('size','=',$id)->pluck('age');
    return Size::where('age', '=', $id)->get();
});

Route::get('faq/{id}', function ($id) {
    return Faq::where('id', '=', $id)->first();
});

Route::get('posts/{id}', function ($id) {
    // If the Content-Type and Accept headers are set to 'application/json',
    // this will return a JSON structure. This will be cleaned up later.
    return Post::findOrFail($id);
});


Route::POST('user/delete', function(Request $id){
    
    $user = App\User::findOrFail($id)->first();

    if($user){
        $user->delete();
    }
    $msg = ['message', 'Gebruiker is verwijderd.'];
    return json_encode($msg);
});
