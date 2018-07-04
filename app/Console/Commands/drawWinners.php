<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use App\Ticket;
use App\Draw;
use Carbon\Carbon;
use App\User;

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
        $expiredDraws  = Draw::where('einde_loting', '<', $currdt)->get();

        //echo $expiredDraws;
        // Get tickets for each draw
        foreach($expiredDraws as $draw)
        {
            $draw_id = $draw->id;
            $userId[] = Ticket::where('draw_id', '=', $draw_id)->pluck('user_id')->toArray();
           
        }


        // Draw a single winner for each draw
        $winner = array_rand($userId, 1);

        // Notify user of winning

        // notify admins of winning

        
       
        
        //echo $expiredDraws;

        foreach($expiredDraws as $draw)
        {
            
            // $userTickets = $draw->ticket;
            
            
            // foreach($userTickets as $test)
            // {
            //     echo $test;
            // }
        }
         

                       
    }
}
