<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use App\Ticket;
use App\Draw;
use Carbon\Carbon;

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
        // Get tickets that are expired.
        // $expiredTickets = Ticket::where('einde_loting', '<', $currdt)
        // ->select('id', 'product_id', 'einde_loting')
        // ->get()
        // ->toArray();

        //$ticket = Ticket::where('einde_loting', '<', $currdt)->get();
        $tests = Ticket::where('einde_loting', '<', $currdt)->pluck('product_id')->toArray();

        

        foreach($tests as $test)
        {
            //echo $test;
            $users = Draw::where('product_id', $test)
            ->join('users', 'users.id', '=', 'draws.user_id')
            ->select('draws.id', 'draws.product_id', 'draws.einde_loting', 'users.name', 'users.id', 'users.email')
            ->get();
            //echo $users;
            
            
            
        }
         

                       
    }
}
