<?php

namespace App\Http\Controllers;
use App\Models\RecycleCenter;
use Illuminate\Support\Facades\Storage;
use App\Models\User;
use App\Models\Address;
use App\Models\WasteCategory;
use Illuminate\Http\RedirectResponse;
use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\WasteImages;
use App\Models\Clients;
use Illuminate\Http\Request;
use App\Rules\DifferentEmail;
use Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
class ClientController extends Controller
{
    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'phoneno' => ['integer', 'min:10'],
            'address' => ['string', 'max:255'],
            'dob' => ['required', 'date', 'before:today'],

        ]);
    }


    public function home()
    {
        $recycleCenters = RecycleCenter::select('id', 'name', 'latitude', 'longitude','address')
            ->get();
        $initialMarkers = $recycleCenters->map(function ($center) {
            return [
                'position' => [
                    'lat' => $center->latitude,
                    'lng' => $center->longitude,
                ],
                'name' => $center->name,
                'address' => $center->address,
                'googleMapsUrl' => "https://www.google.com/maps?q={$center->name}",
                'draggable' => false // Set to true or false based on your requirement
            ];
        })->toArray();

        // dd($initialMarkers);


        $user = User::findOrFail(Auth::id()); // Simplified Auth logic

        // Ensure addresses are always a Collection
        $addresses = collect($user->address);

        // Transform addresses into a readable format for the dropdown
        $fulladdress = $addresses->map(function ($address) {
            return [
                'id' => $address->id,
                'label' => $address->address_type ?? 'No data',
                'address' => ($address->street ?? 'No data') . ', ' .
                    ($address->postal_code ?? 'No data') . ' ' .
                    ($address->city ?? 'No data') . ', ' .
                    ($address->state ?? 'No data'),
            ];
        });
        // dd($fulladdress); // For debugging, this will output an array of addresses
        return view('user.index', compact('fulladdress','initialMarkers'));
    }

    public function storebooking(Request $request): RedirectResponse
    {
        // Generate the Order ID
        $imagePath = null;

        // // Handling image upload
        // if ($image = $request->file('image')) {
        //     $destinationPath = 'images_temp/';
        //     $postImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
        //     $image->move($destinationPath, $postImage);
        //     $imagePath = $postImage; // Storing only the filename
        // }

        // Handling image upload
        if ($image = $request->file('image')) {
            // Convert the file extension to lowercase
            $extension = strtolower($image->getClientOriginalExtension());

            // Generate a unique file name with the lowercase extension
            $fileName = date('YmdHis') . "." . $extension;

            // Store the file in the public disk
            Storage::disk('public')->putFileAs('', $image, $fileName);

            // Save the relative path to the file
            $imagePath = $fileName;
        }

        // Generate a unique Order ID
        $pickupId = 'PK-' . now()->format('Ymd') . '-' . Str::padLeft(Booking::max('id') + 1, 5, '0');

        $client_id = Clients::where('user_id', Auth::user()->id)->first()->id;

        //Convert String to Time Format
        $timeString = $request->input('pickuptime'); // Example: '08.00 AM'
        // Replace the dot with a colon
        $timeString = str_replace('.', ':', $timeString);
        // Convert the string to a Carbon instance
        $time = Carbon::createFromFormat('h:i A', $timeString);
        $timeFormatted = $time->toTimeString();


        $bookingId = Booking::create([
            'client_id' => $client_id,
            'pickup_id' => $pickupId,
            'address_id' => $request->input('address_id'),
            'status' => "Processing",
            'name' => $request->input('name'),
            'street' => $request->input('street'),
            'city' => $request->input('city'),
            'state' => $request->input('state'),
            'postal_code' => $request->input('code'),
            'country' => $request->input('country'),
            'phoneno' => $request->input('phoneno'),
            'alt_phoneno' => $request->input('altphoneno'),
            'est_weight' => $request->input('est_weight'),
            'note' => $request->input('note'),
            'pickup_date' => $request->input('pickupdate'),
            'pickup_time' => $timeFormatted,
        ]);


        // dd( $bookingId);
        WasteImages::create([
            'booking_id' => $bookingId->id,
            'recycle_image' => $imagePath, // Saving the image path separately
        ]);

        WasteCategory::create([
            'booking_id' => $bookingId->id,
            'paper' => request()->has('paper') ? 1 : 0,
            'plastic' => request()->has('plastic') ? 1 : 0,
            'electronic' => request()->has('electronic') ? 1 : 0,
            'aluminium' => request()->has('aluminium') ? 1 : 0,
            'steel' => request()->has('steel') ? 1 : 0,
            'cardboard' => request()->has('cardboard') ? 1 : 0,
            'textiles' => request()->has('textiles') ? 1 : 0,
            'metal' => request()->has('metal') ? 1 : 0,
            'glass' => request()->has('glass') ? 1 : 0,
        ]);

        return redirect()->to(route('history'))->with('message', 'Booking created successfully!')
            ->with('message_type', 'success');
    }
    public function storeaddress(Request $request): RedirectResponse
    {
        $data = User::findOrFail(Auth::user()->id);
        $data = Address::create([
            'user_id' => Auth::user()->id,
            'address_type' => $request->input('label'),
            'street' => $request->input('street'),
            'city' => strtoupper($request->input('city')),
            'state' => strtoupper($request->input('state')),
            'postal_code' => $request->input('code'),
            'country' => strtoupper($request->input('country')),
        ]);

        // Get the previous URL
        $previousUrl = url()->previous();
        // dd($previousUrl);

        // Redirect based on the previous URL
        if (strpos($previousUrl, 'profile') !== false) {
            return redirect()->route('profile')->with('message', 'New Address has been Added!')->with('message_type', 'success');
        }

        // return back();
        return redirect()->route('home')->withFragment('bookingform')->with('message', 'New Address have been Added!')
            ->with('message_type', 'success');
    }

    public function updateaddress($addressId, Request $request)
    {
        $address = Address::findOrFail($addressId);
        // dd($request->all());

        $address->update([
            'user_id' => Auth::user()->id,
            'address_type' => $request->label,
            'street' => $request->street,
            'city' => strtoupper($request->city),
            'state' => $request->state,
            'postal_code' => $request->code,
            'country' => $request->country,
            'updated_at' => now(),
        ]);

        // return back();
        return redirect()->route('profile')->with('message', "Address has been Updated")
            ->with('message_type', 'success');
    }

    public function deleteaddress($addressId, Request $request)
    {
        $address = Address::findOrFail($addressId);

        $address->delete();

        return to_route('profile')->with('message', "Address has been Deleted")
            ->with('message_type', 'success');
    }

    public function profile()
    {
        $id = Auth::user()->id;
        $data = User::with('userprofile', 'client')->findOrFail($id);
        // dd($data);
        return view('user.profile', compact('data'));
    }

    public function update(Request $request)
    {
        $id = Auth::user()->id;
        $user = User::findOrFail($id);

        // dd($request->all());
        // Validate the request data before updating
        // $request->validate([
        //     'name' => ['required', 'string', 'max:255'],
        //     'phoneno' => ['required'],
        //     'street' => ['required', 'max:255'],
        //     'state' => ['required', 'max:255'],
        //     'city' => ['required', 'max:255'],
        //     'postal_code' => ['required', 'max:5'],
        //     'country' => ['required', 'max:255'],
        //     'dob' => ['required', 'date', 'before:today'],
        // ]);

        $user->update([
            'name' => $request->input('name'),
            'updated_at' => now(),
        ]);

        $user->userprofile->update([
            'phoneno' => $request->input('phoneno'),
            'gender' => $request->input('gender'),
            'dob' => $request->input('dob'),
            'updated_at' => now(),
        ]);

        return to_route('profile', ['tab' => 'edit'])->with('message', 'Profile update succesfully!')
            ->with('message_type', 'success');

    }

    public function userpassupdate(Request $request)
    {
        // Validate the request data before updating
        $request->validate([
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $id = Auth::user()->id;
        $user = User::findOrFail($id);
        $user->update([
            'password' => Hash::make($request->password),
            'updated_at' => now(),
        ]);
        return to_route('profile', ['tab' => 'security'])->with('message', 'Password update succesfully!')
            ->with('message_type', 'success');
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     */
    public function useremailupdate(Request $request)
    {
        $id = Auth::user()->id;
        $user = User::findOrFail($id);
        $request->validate([
            'email' => ['required', 'string', 'email', 'max:255', new DifferentEmail($user->email), 'unique:users'],
        ]);
        $user->update([
            'email' => $request->email,
            'updated_at' => now(),
        ]);
        return to_route('profile', ['tab' => 'security'])->with('message', 'Email update succesfully!')
            ->with('message_type', 'success');
        // return to_route('profile', ['#security'])->with('status', 'Profile updated successfully');

    }
    public function history()
    {
        $client_id = Clients::where('user_id', Auth::user()->id)->first()->id;
        $history = Booking::with('image', 'category')
            ->where('client_id', $client_id)
            ->orderByDesc('id')
            ->paginate(9); // Paginate 9 items per page

        return view('user.history', compact('history'));
    }

    public function searchHistory(Request $request)
    {
        $client_id = Clients::where('user_id', Auth::user()->id)->first()->id;

        $query = $request->input('search');
        $history = Booking::with('image', 'category')
            ->where('client_id', $client_id)
            ->where('pickup_id', 'like', '%' . $query . '%')
            ->paginate(9); // Paginate the results

        return response()->json([
            'data' => $history->items(),             // Current page data
            'links' => $history->links('pagination::bootstrap-4')->render(),  // Pagination links
        ]);
    }


    public function historydetails($id)
    {
        // dd($id);
        $client_id = Clients::where('user_id', Auth::user()->id)->first()->id;
        $history = Booking::with('image', 'category')->where('client_id', $client_id)->orderByDesc('created_at')->take(5)->get();
        $detail = Booking::with('image', 'category')->where('id', $id)->first();
        // dd($history);
        return view('user.history-details', compact('history', 'detail'));
    }



}
