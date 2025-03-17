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
            'email' => 'required|email|unique:emails,email,1,id', // Unique but allows updating the first row
        ]);

        Email::updateOrCreate(['id' => 1], ['email' => $request->email]); // Only update first row

        return redirect()->back()->with('success', 'Email updated successfully!');
    }
}
