<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\Country;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }

    public function restricted_access()
    {
        $countries = Country::latest()->get(); 
 

        return view('restrict', compact('countries'));
        
    }
    public function toggleStatus(Request $request)
    {
        // Validate incoming request
        $request->validate([
            'id' => 'required|exists:countries,id'
        ]);
    
        // Find the country by ID
        $country = Country::findOrFail($request->id);
    
        // Toggle status (0 -> 1, 1 -> 0)
        $newStatus = ($country->status == 1) ? 0 : 1;
        $country->status = $newStatus;
        $country->save();
    
        // Return JSON response
        return response()->json([
            'success' => true,
            'message' => "Country status updated successfully!",
            'new_status' => $newStatus
        ]);
    }
    

}
