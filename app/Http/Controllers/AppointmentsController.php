<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use RealRashid\SweetAlert\Facades\Alert;
use App\Appointments;

class AppointmentsController extends Controller
{
    public function store()
    {

    }

    public function create(Product $productid, Request $request)
    {
        #return $request;
        // Store Appointment into Database.
        $userId = Auth()->user()->id;
        $userName = Auth()->user()->name;
        $productId = $request->product_id;

        $productsInfo = Product::where('id','=',$productId)->first()->toArray();
        #return $productsInfo;
        $AppointmentResult = Appointments::create([
            'user_id' => $userId,
            'to_user_id' => 3,
            'title' => "Afspraak maken voor " . $productsInfo->name,
            'message' => 'Hoi Doreth, Ik wil graag een afspraak maken voor ' . $productsInfo->name . ' Groeten, ' . $userName,
            'product_id' => $productId,
        ]);
        return back()->with('message', 'Je bericht om een afspraak te maken is verstuurd. Je krijgt spoedig een reactie terug.');
    }
}
