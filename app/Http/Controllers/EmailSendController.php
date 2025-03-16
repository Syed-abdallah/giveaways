<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Email;
class EmailSendController extends Controller
{
    public function index()
    {
 
        $email = Email::first(); // Get the first email
        return view('email_form', compact('email'));
    }

 
    public function storeOrUpdate(Request $request)
{
    $request->validate([
        'email' => 'required|email|unique:emails,email,1,id', // Ensure only one email exists
    ]);

    // Update if exists, otherwise create a new email with id = 1
    Email::updateOrCreate(
        ['id' => 1], // Find row with id = 1
        ['email' => $request->email] // Update email field
    );

    return redirect()->back()->with('success', 'Email updated successfully!');
}

}

