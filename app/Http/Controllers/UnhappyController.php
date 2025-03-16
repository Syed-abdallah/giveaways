<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Unhappy;
use App\Models\User;
use Illuminate\Support\Facades\Mail;

class UnhappyController extends Controller
{
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'option' => 'required|string',
            'option2' => 'required|string',
            'amazon_id' => 'nullable|string',
            'email' => 'required|email',
            'name' => 'required|string',
            'shipping_address' => 'nullable|string',
            
        ]);
        
        $order = new Unhappy();
        $order->amazon_id = $request->input('amazon_id');
        $order->noid = $request->input('noid');
        $order->email = $request->input('email');
        $order->option = $request->input('option');
        $order->option2 = $request->input('option2');
        $order->name = $request->input('name');
        $order->shipping_address = $request->input('shippingAddress');
        $order->reason = $request->input('reason');
        // dd($request->all());

        $order->save();



        $admin = User::first();
        

        if ($admin) {
            $adminEmail = $admin->email;
        } else {
           
        }

   Mail::send('email.admin-notification', [
       'order' => $order,
   ], function ($message) use ($adminEmail) {
       $message->to($adminEmail)->subject('New Review Received');
   });


   Mail::send('email.contact-confirmation', ['order' => $order], function ($message) use ($request) {
       $message->to($request->email)->subject('Review Confirmation');
   });



   return redirect('/success')->with('success', 'Order saved successfully.');
    }
}
