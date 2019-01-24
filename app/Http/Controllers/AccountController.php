<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PushNotification;
use LaravelFCM\Message\OptionsBuilder;
use LaravelFCM\Message\PayloadDataBuilder;
use LaravelFCM\Message\PayloadNotificationBuilder;
use FCM;
use RealRashid\SweetAlert\Facades\Alert;
use App\Winners;
use App\Draw;
use App\User;
use App\Appointments;
use App\Ticket;

class AccountController extends Controller
{
    public function index()
    {
        $user =  auth()->user();
        $userPushActivated = Auth()->user()->pushRegistration;
        //$test = Alert::success('Success Title', 'Success Message');
        return view('account.index', compact('user', 'userPushActivated'));
    }

    public function push()
    {
        return view('push');
    }

    public function pushRegister(Request $request)
    {
        $userId = Auth()->user()->id;
        $userToken = $request->user_token;
        $checkExisting = PushNotification::where('user_id', '=', $userId)->first();

        if ($checkExisting) {
            return redirect()->action('AccountController@index')->with('message', 'Je bent al aangemeld voor Push Notificaties');
        //return 'Je bent al aangemeld voor Push Notificaties.';
        } else {
            $test = PushNotification::create([
                'user_id' => $userId,
                'user_token' => $userToken,
            ]);
        }
    }

    public function afspraak()
    {
        $userId = Auth()->User()->id;
                
        
        $gewonnenProducten = Winners::where('user_id', '=', $userId)
        ->join('products', 'products.id', '=', 'winners.product_id')
        ->select('products.*', 'winners.*')
        ->get();
        #dd($gewonnenProducten);
        foreach($gewonnenProducten as $gewonnenProduct)
        {
            $test[] = $gewonnenProduct->product_id;
        }
        return view('account.afspraak', compact('gewonnenProducten', 'test'));
    }

    public function tickets()
    {
        $activeTickets =  Ticket::where('user_id', '=', auth()->user()->id)->get();

        
        //return view('account.tickets', compact('activeTickets'));
    }

    public function update(Request $request)
    {
        #return $request;
        $validatedData = $request->validate([
            'email' => 'required|email',
        ]);

        $newUserEmail = $request->email;
        $updateEmail = User::find(auth()->user()->id)->first();
        $updateEmail->email = $newUserEmail;
        $updateEmail->save();

        return $updateEmail;
    }

    public function inbox()
    {
        //$messages = Appointments::where("to_user_id", auth()->user()->id)->get();
        $messages = Appointments::with('user')->where('to_user_id', auth()->user()->id)->get();
        $users = User::all();
        //return $messages;
        return view('account.inbox', compact('messages', 'users'));
    }
}
