<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ticket;
use App\Product;
use Carbon\Carbon;
use App\Draw;
use Illuminate\Database\Eloquent\SoftDeletes;

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
        // Get Product ID and user id and get product name
        $user_id = Auth()->user()->id;
        $product_id = request('product_id');
        $productName = Product::where('id', '=', $product_id)->first();
        $eindelotingDT = Carbon::now()->addHours(24);

        

        // Check if there is already a ticket present
        $ticketExist =  Ticket::where('product_id', $product_id)->first();
        #dd($ticketExist);
        // If ticket exists, we don't need to create a new product
        if($ticketExist === null)
        {
            // Create new Record for $product_id
            $newTicket =  Ticket::create([
                'product_id' => $product_id,
                'einde_loting' => $eindelotingDT,
            ]);

            // Create record for user in draws table
            $userTicket = Draw::create([
                'user_id' => $user_id,
                'product_id' => $product_id,
                'einde_loting' => $eindelotingDT,
            ]);
            $drawId =  Draw::where('product_id', $product_id)->where('user_id', $user_id)->first();
               # return $drawId;
                
                $draw = $productName->draws()->attach($product_id, ['draw_id' => $drawId->id, 'user_id' => $user_id]);
                return redirect()->back()->with('status', 'Gefeliciteerd, je loot nu meer op '. $productName->name);
        } else {
            // $ticketExist isn't NULL
            //check if current user has a draw on $product_id
            $userDraw = Draw::where('user_id', $user_id)
            ->where('product_id', $product_id)
            ->first();
           #dd($userDraw);
            if($userDraw === null)
            {
                // Create a draw's record for $user_id
                $createDraw = Draw::create([
                    'user_id' => $user_id,
                    'product_id' => $product_id,
                    'einde_loting' => $ticketExist->einde_loting,
                ]);
                #dd($productName);
                //$draw = $productName->draws()->attach(['draw_id' => null, 'product_id' => $product_id, 'user_id' => $user_id]);

                $drawId =  Draw::where('product_id', $product_id)->where('user_id', $user_id)->first();
               # return $drawId;
                
            $draw = $productName->draws()->attach($product_id, ['draw_id' => $drawId->id, 'user_id' => $user_id]);
            return redirect()->back()->with('status', 'Gefeliciteerd, je loot nu meer op '. $productName->name);
                
            } 

        } 
     
      

        // // Create Pivot Table connection (draw_product)
        
        // // Redirect user with message he / she is in the running
        // return redirect()->back()->with('status', 'Gefeliciteerd, je loot nu meer op '. $productName->name);


        
        
        // $ticketExpireDate = Carbon::now()->addHours(24);
        // // Check if a ticket for $product_id exists
        // $ticketExist = Ticket::where('product_id', '=', $product_id)->first();
        // $drawExists = Draw::where('product_id', '=', $product_id)
        // ->where('user_id', $userId)
        // ->get();
        // #return $drawExists;
        // //return $ticketExist->einde_loting;

        // if($ticketExist)
        // {
        //     if($drawExists)
        //     {
        //         return redirect()->back()->with('status', 'Gebruiker heeft al een draw op product');
        //     }
        //      else {
        //         // Add userId to draws table
        //         $createDraw = Draw::create([
        //             'user_id' => auth()->user()->id,
        //             'product_id' => $product_id,
        //             'einde_loting' => $ticketExist->einde_loting,
        //             ]);

        //         // And we need to add entry to Pivot table draw_product
        //         $draw_id = Draw::where('user_id', '=', $userId)->first();
        //         $product = Product::find($product_id);
                     
        //      }         
        // }

        // $userHasDraw = Draw::where('product_id', '=', $product_id)
        // ->where('user_id', '=', $userId)
        // ->first();
        // #dd($userHasDraw);
        // // Determine date and time when ticket will expire
       
        // if ($ticketExist != null) {
        //     if ($userHasDraw != null) {
        //         return redirect()->back()->with('status', 'Je hebt al een lootje op gevraagd op '. $productName->name);
        //     } else {
        //         $createTicket = Ticket::create([
        //             'product_id' => $product_id,
        //             'einde_loting' => $ticketExpireDate,
        //         ]);
        //         // User doesn't have a draw yet, lets add user to draws table
        //         $createDraw = Draw::create([
        //             'user_id' => auth()->user()->id,
        //             'product_id' => $product_id,
        //             'einde_loting' => $ticketExpireDate,
        //         ]);
        //     }
        // }
        // // And we need to add entry to Pivot table draw_product
        // $draw_id = Draw::where('product_id', '=', $product_id)->first();
        // #dd($draw_id);
        // $product = Product::find($product_id);
        // //dd($draw_idLast->id);
        // $userId = auth()->user()->id;
        // $draw = $product->draws()->attach($draw_id->id, ['product_id' => $product_id, 'user_id' => $userId]);
        // return redirect()->back()->with('status', 'Gefeliciteerd, je loot nu meer op '. $productName->name);
    }
    //  $winners = Winners::join('users', 'users.id', '=', 'winners.user_id')
    //     ->join('products', 'products.id', '=', 'winners.product_id')
    //     ->select('winners.created_at','users.name as username', 'products.name as productname')
    //     ->get();
    // return view('winners', compact('winners'));



    public function getActiveTickets()
    {
        $user = auth()->user();
        $connectedProductIds = $user->draws->pluck('product_id')->toArray();
        //dd($connectedProductIds);
        $activeTickets = Ticket::join('products', 'products.id', '=', 'tickets.product_id')
        ->select('tickets.*', 'products.*')
        ->get();
        #dd($activeTickets);
        return view('lotingen', compact('activeTickets', 'connectedProductIds'));
    }
}
