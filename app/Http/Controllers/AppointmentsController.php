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
        // Store Appointment into Database.
        $userId = Auth()->user()->id;
        $productId = $request->product_id;

        $productsInfo = Product::where('id','=',$productId)->first()->toArray();

        $AppointmentResult = Appointments::create([
            'user_id' => $userId,
            'to_user_id' => 3,
            'product_id' => $productId,
        ]);
        return back()->with('message', 'Afspraak is verstuurd. Je krijgt spoedig een reactie terug.');
    }
}
