<?php
namespace App\Http\Controllers\beheer;

use App\User;
use App\Categories;
use App\subCategories;
use App\Product;
use Image;
use Storage;
use Illuminate\Http\Request;
use App\Todo;
use Redirect;
use App\Winners;
use App\Role;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Controllers\Controller;

class ControlPanelController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $request->user()->authorizeRoles(['Beheerder']);
        return view('beheer.index');
    }

    public function products(Request $request)
    {
    }

    public function store(Request $request)
    {
    }

    public function getSubCatFromMainCat($id)
    {
        $getCatId = Categories::all()->where('id', '=', $id)->first();
        $mainCatId = $getCatId->id;
        $categories = subCategories::find($mainCatId)->subCategories;
        return $categories;
    }

    public function update($id)
    {
    }

    public function categories()
    {
    }

    public function categoriesStore()
    {
    }
    public function users()
    {
    }

    public function adminWinners()
    {
        $winners = Winners::join('users', 'users.id', '=', 'winners.user_id')
            ->join('products', 'products.id', '=', 'winners.product_id')
            ->select('winners.created_at', 'users.name as username', 'products.name as productname')
            ->get();
        return view('beheer.winners', compact('winners'));
    }
}
