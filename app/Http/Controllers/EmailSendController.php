<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Email;
use App\Models\Review;
class EmailSendController extends Controller
{
    public function index()
    {
        $email = Email::first(); // Get the first email
        $link = Review::first() ?: "";
        return view('email_form', compact('email', 'link'));
    }

    public function storeOrUpdate(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:emails,email,1,id', // Unique but allows updating the first row
        ]);

        Email::updateOrCreate(['id' => 1], ['email' => $request->email]); // Only update first row

        return redirect()->back()->with('success', 'Email updated successfully!');
    }
    public function storeOrUpdateLink(Request $request)
    {
        $request->validate([
            'link' => 'required|unique:reviews,link,1,id', // Ensures unique link but allows updating ID 1
        ]);
    
        Review::updateOrCreate(
            ['id' => 1], 
            ['link' => $request->link]
        ); // Updates only the first row
    
        return redirect()->back()->with('links', 'Link updated successfully!');
    }
    
}
