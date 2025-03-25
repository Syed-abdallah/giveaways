<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Happy;
use App\Models\User;
use App\Models\Email;
use Illuminate\Support\Facades\Mail;
class HappyController extends Controller
{
    public function store(Request $request)
    {
         // Validate input fields and image
        $request->validate([
            'order_id' => 'required|string',
            'email' => 'required|email',
            'amazon_name' => 'required|string',
            'shippingAddress' => 'required|string',
            'pic' => 'nullable|image|mimes:jpg,jpeg,png',
        ]);

    // Create a new Order instance
        $order = new Happy();
        $order->order_id = $request->input('order_id');
        $order->email = $request->input('email');
        $order->options = $request->input('opHappy');
        $order->name = $request->input('amazon_name');
        $order->shipping_address = $request->input('shippingAddress');

    // // Handle Image Upload (Save in Storage)
    // if ($request->hasFile('pic')) {
    //     $image = $request->file('pic');
    //     $imageName = date('YmdHis') . '.' . $image->getClientOriginalExtension();
    
    //     // Save image in storage/app/public/orders/
    //     $image->storeAs('public/orders', $imageName);
    
    //     // Save only the image path for easy access
    //     $order->image_path = 'orders/' . $imageName;
    // } else {
    //     $order->image_path = null;
    // }
    if ($request->hasFile('pic')) {
        $image = $request->file('pic');
        $imageName = date('YmdHis') . '.' . $image->getClientOriginalExtension();
        // $imageResized = Image::make($image)->height(650);
        $image->move(public_path('image/happyorder'), $imageName);
        $order->image_path = $imageName;
     } else {
            $order->image_path = null;
        }
    

    // Save order to database
    $order->save();
    $admin = Email::first();
    

    if ($admin) {
        $adminEmail = $admin->email;
    } else {
       
    }

     Mail::send('email.admin-notification', [
         'order' => $order,
     ], function ($message) use ($adminEmail) {
         $message->to($adminEmail)->subject('New Review Received');
     });
 
     // Send confirmation email to user
     Mail::send('email.happy', ['order' => $order], function ($message) use ($request) {
         $message->to($request->email)->subject('Review Confirmation');
     });


     return redirect('/success')->with('success', 'Order saved successfully.');
}


    
public function updateFollowing(Request $request)
{
    $request->validate([
        'order_id' => 'required|integer',
        'following' => 'required|string'
    ]);

    $order = Happy::find($request->order_id);
    if (!$order) {
        return response()->json(['success' => false, 'message' => 'Order not found'], 404);
    }

    $order->following = $request->following;
    if ($order->save()) {
        return response()->json(['success' => true, 'message' => 'Following updated successfully']);
    } else {
        return response()->json(['success' => false, 'message' => 'Failed to update following'], 500);
    }
}
}
