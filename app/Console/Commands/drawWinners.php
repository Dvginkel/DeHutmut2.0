<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use App\Ticket;
use App\Draw;
use Carbon\Carbon;
use App\User;
use App\Product;
use \App\Mail\DrawWon;

class drawWinners extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'beheer:winners';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Draw Winners';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        // Current Date and Time
        $currdt = Carbon::now();
        // Get expired draws
        //$expiredDraws  = Draw::where('einde_loting', '<', $currdt)->get();
        $expiredDraws  = Draw::with('tickets')->where('einde_loting', '<=', $currdt)->get();

        foreach($expiredDraws as $expiredDraw)
        {
            $drawProductId = $expiredDraw->product_id;
            $productInfo = Product::findOrFail($drawProductId);
            $numberOfTickets = count($expiredDraw->tickets);
            $tickets = $expiredDraw->tickets;
            $productNaam = Product::findOrFail($drawProductId);

            if($numberOfTickets == 1)
            {
                $array = json_decode($tickets, true);
                $one_item = $array[rand(0, count($array) - 1)];
                $winnerUserId = $one_item['user_id'];
                
            } else {
                $array = json_decode($tickets, true);
                $one_item = $array[rand(0, count($array) - 1)];
                $winnerUserId = $one_item['user_id'];

                $user = User::findOrFail($winnerUserId);
                                
                \Mail::to($user)->send(new DrawWon($user, $productInfo));   
            }
        }
        //echo $expiredDraws;

        
        // Notify user of winning

        // notify admins of winning 
    }
}
