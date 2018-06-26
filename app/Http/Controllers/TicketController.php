<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ticket;
use App\Product;
use Carbon\Carbon;
use App\Draw;
use Illuminate\Database\Eloquent\SoftDeletes;
use DB;

class TicketController extends Controller
{
    use SoftDeletes;

    protected $product_id;
    protected $dates = ['deleted_at'];

    public function __construct()
    {
        $this->middleware('auth');
    }



    public function create()
    {
    }

    public function store(Request $request)
    {
        
        // Get Product ID and user id and product name
        $user_id = Auth()->user()->id;
        $product_id = request('product_id');
        //$productName = Product::where('id', '=', $product_id)->first();
        $productName = Product::where('id', '=', $product_id)->pluck('name')->first(); 
        $eindelotingDT = Carbon::now()->addHours(24);

        // Check if there is an active draw for $product_i
        $drawExists = Draw::where('product_id', $product_id)->first();
        
        if($drawExists)
        {
            // Draw exists no need to create a new entry
            // Check if user has a ticket for $product_id

            $userTicketExists = Ticket::where('user_id', $user_id)->where('draw_id', $drawExists->id)->first();
            #dd($userTicketExists);

            if($userTicketExists === null)
            {
                $newUserTicket = Ticket::create([
                    'user_id' => $user_id,
                    'draw_id' => $drawExists->id,
                ]);
               # return $newUserTicket;
               #return redirect()->action('CategoriesController@index')->with('success', 'Je loot mee op '. $productName); 
               return redirect()->back()->with('success', 'Je loot mee op '. $productName);   
            } else {
                // User also has a ticket for $product_id
                return redirect()->action('CategoriesController@index')->with('success', 'Je hebt al een lootje op '. $productName);        
            }

           
        } else {
            // Nieuwe Loting aanmaken
            $newDraw = Draw::create([
                'product_id' => $product_id,
                'einde_loting' => $eindelotingDT,
            ]);
        
            // Get last inserted ID
            $draw_id =  DB::getPdo()->lastInsertId();
            // Lootje voor $user_id maken

            $newUserTicket = Ticket::create([
                'user_id' => $user_id,
                'draw_id' => $draw_id,
            ]);
            return redirect()->action('CategoriesController@index')->with('success', 'Je loot mee op '. $productName);  
        }
        
      
    }
    
    public function getActiveTickets()
    {
        $user = auth()->user();
        $connectedProductIds = $user->tickets->pluck('draw_id')->toArray(); // 14 = id of record in draws table
        

       // $activeTickets = Draw::whereNotIn('id', $connectedProductIds)->get();
        
        
        $activeTickets = Draw::all();
        $activeTickets = Draw::join('products', 'draws.product_id', '=', 'products.id')->get();
        
        return view('lotingen', compact('activeTickets', 'connectedProductIds'));
    }
}
