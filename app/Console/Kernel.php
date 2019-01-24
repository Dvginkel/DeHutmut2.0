<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Carbon\Carbon;
use App\Ticket;
use App\Draw;
use App\User;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        

         // the call method
        $schedule->call(function () {
            $currdt = Carbon::now();

            // Get expired tickets
            $tickets = \App\Ticket::select('product_id', 'einde_loting')
            ->where('einde_loting', '<', $currdt)
            ->get();

            foreach($tickets as $ticket)
            {
                // Get users who have a draw on expired ticket
                $users = Draw::where('product_id', $ticket->product_id)
                
                ->get();

                // Pick a random winner
                $test = array_rand($users, 1);

                echo $test;

                // foreach($users as $user)
                // {
                //     // Random draw a 
                //     //echo "             ". $user->user_id;

                //     $userInfo = User::find($user->user_id);

                //     echo $userInfo->name. "        ";
                // }
            }

        })->everyMinute();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
