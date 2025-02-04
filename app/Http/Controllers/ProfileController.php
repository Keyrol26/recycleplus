<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Collector;
use App\Models\WasteCategory;
use App\Models\User;
use App\Models\Address;
use App\Models\BookingActivity;
use Auth;
use function PHPUnit\Framework\isEmpty;
use App\Rules\DifferentEmail;
use Hash;

class ProfileController extends Controller
{
    public function profile($userId)
    {
        $loggedInUser = auth()->user(); // Get the logged-in user
        // Check if the logged-in user is superadmin, admin, or collector
        if ($loggedInUser->role == '0') {
            // Superadmins can access any profile
            $data = User::findOrFail($userId);
            return view('components.profile', compact('data'));
        } elseif ($loggedInUser->role == '1' || $loggedInUser->role == '3') {
            // Admins and collectors can only access their own profile
            if ($loggedInUser->id != $userId) {
                // If the logged-in user is not the same as the user in the URL, redirect
                return redirect()->route('multi-profile', $loggedInUser)->with('message', 'You do not have permission to access this profile.')->with('message_type', 'warning');
            }
            $data = User::findOrFail($userId);
            return view('components.profile', compact('data'));
        }

        // If role doesn't match, redirect (optional)
        return redirect()->route('multi-profile', $loggedInUser)->with('message', 'You do not have permission to access this profile.')->with('message_type', 'warning');
    }

    public function updateProfile($id, Request $request)
    {
        $user = User::findOrFail($id);

        $user->update([
            'name' => $request->input('full_name'),
            'updated_at' => now(),
        ]);

        $user->userprofile->update([
            'phoneno' => $request->input('phoneno'),
            'gender' => $request->input('gender'),
            'dob' => $request->input('dob'),
            'updated_at' => now(),
        ]);

        // Set the active tab to 'profile-profile' after updating
        return redirect()->route('multi-profile', $id)->with('message', "Profile has been updated")
            ->with('message_type', 'success')->with('tab', 'profile-profile');
    }
    public function updateEmail($id, Request $request)
    {
        $user = User::findOrFail($id);
        $request->validate([
            'email' => ['string', 'email', 'max:255', new DifferentEmail($user->email), 'unique:users'],
        ]);


        $user->update([
            'email' => $request->email,
            'updated_at' => now(),
        ]);

        return redirect()->route('multi-profile', $id)->with('message', "Email has been updated")
            ->with('message_type', 'success')->with('tab', 'profile-profile');
    }

    public function updateCollectorStatus($id, Request $request)
    {
        $collector = Collector::where('user_id', $id);
        // dd($request->status);

        $collector->update([
            'status' => $request->status,
            'updated_at' => now(),
        ]);

        return redirect()->route('multi-profile', $id)->with('message', "Duty Status has been updated")
            ->with('message_type', 'success')->with('tab', 'profile-profile');
    }

    public function updatePassword($id, Request $request)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'oldpassword' => 'required',
            'newpassword' => [
                'required',
                'string',
                'min:8',
                'different:oldpassword',
                'regex:/[A-Za-z]/', // Must contain letters
                'regex:/\d/',       // Must contain numbers
            ],
        ]);

        // Verify old password
        if (!Hash::check($request->oldpassword, Auth()->user()->password)) {
            return back()->with('message', ' Updated Failed! Incorrect password.')->with('message_type', 'warning');
        }
        // Update password
        $user = auth()->user();
        $user->update(['password' => Hash::make($request->newpassword), 'updated_at' => now(),]);
        return redirect()->route('multi-profile', $id)->with('message', "Password has been updated")
            ->with('message_type', 'success')->with('tab', 'profile-profile');
    }

    public function storeaddress($id, Request $request)
    {
        $user = User::findOrFail($id);
        $user = Address::create([
            'user_id' => $id,
            'address_type' => $request->input('label'),
            'street' => $request->input('street'),
            'city' => strtoupper($request->input('city')),
            'state' => strtoupper($request->input('state')),
            'postal_code' => $request->input('code'),
            'country' => strtoupper($request->input('country')),
        ]);

        // return back();
        return redirect()->route('multi-profile', $id)->with('message', "Address has been added")
            ->with('message_type', 'success')->with('tab', 'profile-profile');
    }

    public function updateaddress($userId,$addressId, Request $request)
    {
        $address = Address::findOrFail($addressId);
        // dd($request->all());

        $address->update([
            'user_id' => $userId,
            'address_type' => $request->label,
            'street' => $request->street,
            'city' => strtoupper($request->city),
            'state' => $request->state,
            'postal_code' => $request->code,
            'country' => $request->country,
            'updated_at' => now(),
        ]);

        // return back();
        return redirect()->route('multi-profile', $userId)->with('message', "Address has been Updated")
            ->with('message_type', 'success')->with('tab', 'profile-profile');
    }

    public function deleteaddress($userId,$addressId, Request $request)
    {
        $address = Address::findOrFail($addressId);
        // dd($request->all());

        $address->delete();

        // return back();
        return redirect()->route('multi-profile', $userId)->with('message', "Address has been Deleted")
            ->with('message_type', 'success')->with('tab', 'profile-profile');
    }
}
