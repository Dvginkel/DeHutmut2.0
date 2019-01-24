<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\winners;
use App\User;
use Carbon\Carbon;
use App\Ticket;
use App\Draw;
use App\PushNotification;
use LaravelFCM\Message\OptionsBuilder;
use LaravelFCM\Message\PayloadDataBuilder;
use LaravelFCM\Message\PayloadNotificationBuilder;
use FCM;
use App\Mail\gewonnen;
use App\Traits\Push;
use App\Http\Controllers\Controller;

class WinnersController extends Controller
{
    use Push;
    public function index()
    {
        $winners = Winners::join('users', 'users.id', '=', 'winners.user_id')
            ->join('products', 'products.id', '=', 'winners.product_id')
            ->select(
                'winners.created_at',
                'users.name as username',
                'products.name as productname',
                'products.photo',
                'products.*'
            )
            ->get();
        return view('winners', compact('winners'));
    }

    public function drawWinner()
    {
        $currentDatTime = Carbon::now();
        //return $currentDatTime;
        // Get a list of expired tickets.
        $expiredTickets = Ticket::where('einde_loting', '<=', $currentDatTime)->get()->toArray();
        # dd($expiredTickets);

        $userDraws =  Draw::whereIn('product_id', $expiredTickets[0])
        ->join('users', 'users.id', '=', 'draws.user_id')
        ->join('products', 'products.id', '=', 'draws.product_id')
        ->select('users.name as user_name', 'users.id as user_id', 'products.name as product_name', 'products.id as product_id')
        ->get()->toArray();
        // return $userDraws;
        $rand_key = array_rand($userDraws, 1);
        $winner = $userDraws[$rand_key];
        #dd($winner);
        $username = $winner['user_name'];
        $productname = $winner['product_name'];
        $productId = $winner['product_id'];

        /* We have a winner next we need to
        1) Notify user about winning a product
        2) Notify admin(s) about a new winner.
        3) Disable / make ticket inactive.
        4) Remove product from website.
        5) Disable users draws on product_id
        6) Log winner name and date to database so we can produce metrics on user winnings.
        */
        // Check if user has push notifications enabled.
        $winnerUserId = $winner['user_id'];
        $pushActive = PushNotification::where('user_id', '=', $winnerUserId)->first();
        //dd($pushActive);
        $useremail =  auth()->user()->email;
        $username =  auth()->user();
        if ($pushActive === null) {
            // Gebruiker heeft geen actieve push token
            echo 'Geen Token voor push';

            #dd($username->name);
            \Mail::to($useremail)->send(new gewonnen($username));
        } else {
            $token = $pushActive['user_token'];
            // Store winners name and product into table
            $saveWinner = Winners::create([
                'user_id' => $winnerUserId,
                'product_id' => $productId,
            ]);
            // If record has been saved, send push notification and mail to user.
            // Send Push to Hutmut Admins
            // Disable product on website (softdelete)
            // softdelete ticket from tickets tbl
            // softdelete user record from draws tbl

            if ($saveWinner) {
                $this->sendPush($token, $username, $productname);
                \Mail::to($useremail)->send(new gewonnen($username));
            }
        }
    }
}
