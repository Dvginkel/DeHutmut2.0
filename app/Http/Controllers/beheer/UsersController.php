<?php

namespace App\Http\Controllers\beheer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Role;
use App\Todo;
use App\Draw;
use App\Ticket;
use App\Product;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        \Carbon\Carbon::setLocale('nl_NL');
        //$users = User::all();
        $users = User::with('roles')->get();
        $draws = User::with('draws')->where('id','=', Auth()->user()->id)->get();
        //$draws = User::with('draws')->get();
        $roles = Role::all();
        return view('beheer.users.index', compact('users', 'roles', 'todos', 'draws'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       
        // Get user info and display 
        $user = User::where('id', $id)->first();
        //return $user;
        $userDraws = $user->tickets->pluck('draw_id')->toArray();
      
        $userDraw = Draw::whereIn('id', $userDraws)->pluck('product_id')->toArray();
        $productNames = Product::whereIn('id', $userDraw)->paginate(10);
        
        
        return view('beheer.users.edit', compact('user', 'productNames'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        // Lootje van de gebruiker uitschakelen
        $productId = $request->productId;
        $userId = $request->userId;
        
        $result = Draw::where('product_id' ,$productId)->first();
        $drawId = $result->id;

        $disableUserTicket = Ticket::where('draw_id', $drawId)->where('user_id', $userId)->first();
        $disableUserTicket->active = 0;
        $disableUserTicket->save();
        //return $disableUserTicket;
        $disableUserTicket->delete();
        
        return redirect()->action('beheer\UsersController@index')->with('success', 'Lootje is succesvol gedeactiveerd.');


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
