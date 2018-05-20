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

    public function store()
    {
        $userId =  auth()->user()->id;
        $product_id = request('product_id');
        $productName = Product::where('id','=',$product_id)->first();

        // Check if a ticket for $product_id exists
        $ticketExist = Ticket::where('product_id','=', $product_id)->get();
        $userHasDraw = Draw::where('product_id', '=', $product_id)
        ->where('user_id', '=', $userId)
        ->first();
        #dd($userHasDraw);
        // Determine date and time when ticket will expire
        $ticketExpireDate = Carbon::now()->addHours(24);
        if($ticketExist != null)
        {
            if($userHasDraw != null){
                return redirect()->back()->with('status', 'Je hebt al een lootje op gevraagd op '. $productName->name);
            } else {
                $createTicket = Ticket::create([
                    'product_id' => $product_id,
                    'einde_loting' => $ticketExpireDate,
                ]);
                // User doesn't have a draw yet, lets add user to draws table
                $createDraw = Draw::create([
                    'user_id' => auth()->user()->id,
                    'product_id' => $product_id,
                    'einde_loting' => $ticketExpireDate,
                ]);
            }
        }
         // And we need to add entry to Pivot table draw_product
            $draw_id = Draw::where('product_id','=',$product_id)->first();
            #dd($draw_id);
            $product = Product::find($product_id);
            //dd($draw_idLast->id);
            $userId = auth()->user()->id;
            $draw = $product->draws()->attach( $draw_id->id, ['product_id' => $product_id, 'user_id' => $userId]);
            return redirect()->back()->with('status', 'Gefeliciteerd, je loot nu meer op '. $productName->name);
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
