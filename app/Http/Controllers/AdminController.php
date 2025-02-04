<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Collector;
use App\Models\WasteCategory;
use App\Models\User;
use App\Models\WasteImages;
use App\Models\BookingActivity;
use Illuminate\Http\Request;
use DB;
use function PHPUnit\Framework\isEmpty;
use App\Rules\DifferentEmail;
use Hash;

class AdminController extends Controller
{
    public function home()
    {
        $total = Booking::count();
        $inprocess = Booking::where('status', 'Like', 'Processing')->where("pickup_status", Null)->count();
        $pending = Booking::where('status', 'Like', 'Pending')->where("pickup_status", Null)->count();
        $accepted = Booking::where('status', 'Like', 'Accepted')->where("pickup_status", Null)->count();
        $rejected = Booking::where('status', 'Like', 'Rejected')->where("pickup_status", Null)->count();
        $otw = Booking::where("pickup_status", "like", "OnTheWay")->count();
        $collected = Booking::where("pickup_status", "like", "Collected")->count();

        //Calendar
        $events = [];
        $data = Booking::get();
        $color = '';
        foreach ($data as $bookings) {
            if (is_null($bookings->pickup_status))
                switch ($bookings->status) {
                    case 'Accepted':
                        $color = '#28a745'; // Green
                        break;
                    case 'Pending':
                        $color = '#ffc107'; // Yellow
                        break;
                    case 'Rejected':
                        $color = '#dc3545'; // Red
                        break;
                    case 'Processing':
                        $color = '#f16a1b'; // Orange
                        break;
                }
            else
                switch ($bookings->pickup_status) {
                    case 'Collected':
                        $color = '#28a745'; // Green
                        break;
                    case 'OnTheWay':
                        $color = '#ffc107'; // Yellow
                        break;
                }
            $events[] = [
                'id' => $bookings->id,
                // 'start' => $bookings->pickup_date,
                'start' => $bookings->pickup_date . 'T' . $bookings->pickup_time, // Combine date and time
                'title' => $bookings->pickup_id ,
                'color' => $color,
            ];
        }

        //collector booking count today
        $bookingDate = date('Y-m-d');
        $maxDailyBookings = 3;
        $availableCollectors = Collector::select('collectors.*')
            ->where('status', 'Active')
            ->where(function ($query) use ($bookingDate, $maxDailyBookings) {
                // Collectors who have no bookings for the given date and time
                $query->whereDoesntHave('booking', function ($subQuery) use ($bookingDate) {
                    $subQuery->whereDate('pickup_date', $bookingDate);
                })
                    // OR Collectors who have bookings but at different times
                    // and they haven't reached the max daily bookings
                    ->orWhereHas('booking', function ($subQuery) use ($bookingDate, $maxDailyBookings) {
                    $subQuery->whereDate('pickup_date', $bookingDate)
                        ->groupBy('collector_id')
                        ->selectRaw('collector_id, COUNT(*) as booking_count')
                        ->having('booking_count', '<', $maxDailyBookings);
                });
            })
            ->withCount([
                'booking' => function ($query) use ($bookingDate) {
                    $query->whereDate('pickup_date', $bookingDate);
                }
            ])
            ->get();

        foreach ($availableCollectors as $collector) {
            $existingBookingsCount = $collector->booking()->whereDate('pickup_date', $bookingDate)->count();
            $availableSlots = $maxDailyBookings - $existingBookingsCount;

            $collector->available_slots = $availableSlots;
        }

        // dd($availableCollectors);

        $startOfMonth = date('Y-m-01'); // Start of this month
        $endOfMonth = date('Y-m-t');    // End of this month

        //New Booking
        $newbooking = Booking::orderByDesc('created_at')->limit(5)->get();
        $totalbookmonthly = Booking::whereBetween('created_at', [$startOfMonth, $endOfMonth])->count();

        //Processing Booking
        $probooking = Booking::where('status', 'like', 'Processing')->where('pickup_status', Null)->orderby('pickup_date')->limit(5)->get();
        $promonthly = Booking::where('status', 'like', 'Processing')->where('pickup_status', Null)->whereBetween('created_at', [$startOfMonth, $endOfMonth])->count();

        //Pending Booking
        $penbooking = Booking::where('status', 'like', 'Pending')->where('pickup_status', Null)->orderby('pickup_date')->limit(5)->get();
        $penmonthly = Booking::where('status', 'like', 'Pending')->where('pickup_status', Null)->whereBetween('created_at', [$startOfMonth, $endOfMonth])->count();

        //Accepted Booking
        $accbooking = Booking::where('status', 'like', 'Accepted')->where('pickup_status', Null)->orderby('pickup_date')->limit(5)->get();
        $accmonthly = Booking::where('status', 'like', 'Accepted')->where('pickup_status', Null)->whereBetween('created_at', [$startOfMonth, $endOfMonth])->count();

        //Rejected Booking
        $rejbooking = Booking::where('status', 'like', 'Rejected')->where('pickup_status', Null)->orderby('pickup_date')->limit(5)->get();
        $rejmonthly = Booking::where('status', 'like', 'Rejected')->where('pickup_status', Null)->whereBetween('created_at', [$startOfMonth, $endOfMonth])->count();

        //timeline
        $timeline = BookingActivity::orderBy('created_at', 'desc') // Order by oldest to newest
            ->limit(6)->get();

        return view('admin.index', [
            'bookings' => $events,
            'total' => $total,
            'inprocess' => $inprocess,
            'pending' => $pending,
            'accepted' => $accepted,
            'rejected' => $rejected,
            'otw' => $otw,
            'collected' => $collected,
            'availableCollectors' => $availableCollectors,
            'newbooking' => $newbooking,
            'monthly' => $totalbookmonthly,
            'probooking' => $probooking,
            'promonthly' => $promonthly,
            'penbooking' => $penbooking,
            'penmonthly' => $penmonthly,
            'accbooking' => $accbooking,
            'accmonthly' => $accmonthly,
            'rejbooking' => $rejbooking,
            'rejmonthly' => $rejmonthly,
            'timeline' => $timeline,
        ]);
    }

    // public function profile($userId)
    // {
    //     $loggedInUser = auth()->user(); // Get the logged-in user
    //     // Check if the logged-in user is superadmin, admin, or collector
    //     if ($loggedInUser->role == '0') {
    //         // Superadmins can access any profile
    //         $data = User::findOrFail($userId);
    //         return view('components.profile', compact('data'));
    //     } elseif ($loggedInUser->role == '1' || $loggedInUser->role == '3') {
    //         // Admins and collectors can only access their own profile
    //         if ($loggedInUser->id != $userId) {
    //             // If the logged-in user is not the same as the user in the URL, redirect
    //             return redirect()->route('multi-profile', $loggedInUser)->with('message', 'You do not have permission to access this profile.')->with('message_type', 'warning');
    //         }
    //         $data = User::findOrFail($userId);
    //         return view('components.profile', compact('data'));
    //     }

    //     // If role doesn't match, redirect (optional)
    //     return redirect()->route('multi-profile', $loggedInUser)->with('message', 'You do not have permission to access this profile.')->with('message_type', 'warning');
    // }

    // public function updateProfile($id, Request $request)
    // {
    //     $user = User::findOrFail($id);

    //     $user->update([
    //         'name' => $request->input('full_name'),
    //         'updated_at' => now(),
    //     ]);

    //     $user->userprofile->update([
    //         'phoneno' => $request->input('phoneno'),
    //         'gender' => $request->input('gender'),
    //         'dob' => $request->input('dob'),
    //         'updated_at' => now(),
    //     ]);

    //     // Set the active tab to 'profile-profile' after updating
    //     return redirect()->route('multi-profile', $id)->with('message', "Profile has been updated")
    //         ->with('message_type', 'success')->with('tab', 'profile-profile');
    // }
    // public function updateEmail($id, Request $request)
    // {
    //     $user = User::findOrFail($id);
    //     $request->validate([
    //         'email' => ['string', 'email', 'max:255', new DifferentEmail($user->email), 'unique:users'],
    //     ]);


    //     $user->update([
    //         'email' => $request->email,
    //         'updated_at' => now(),
    //     ]);

    //     return redirect()->route('multi-profile', $id)->with('message', "Email has been updated")
    //         ->with('message_type', 'success')->with('tab', 'profile-profile');
    // }

    // public function updateCollectorStatus($id, Request $request)
    // {
    //     $collector = Collector::where('user_id', $id);
    //     // dd($request->status);

    //     $collector->update([
    //         'status' => $request->status,
    //         'updated_at' => now(),
    //     ]);

    //     return redirect()->route('multi-profile', $id)->with('message', "Duty Status has been updated")
    //         ->with('message_type', 'success')->with('tab', 'profile-profile');
    // }

    // public function updatePassword($id, Request $request)
    // {
    //     $user = User::findOrFail($id);

    //     $request->validate([
    //         'oldpassword' => 'required',
    //         'newpassword' => [
    //             'required',
    //             'string',
    //             'min:8',
    //             'different:oldpassword',
    //             'regex:/[A-Za-z]/', // Must contain letters
    //             'regex:/\d/',       // Must contain numbers
    //         ],
    //     ]);

    //     // Verify old password
    //     if (!Hash::check($request->oldpassword, Auth()->user()->password)) {
    //         return back()->with('message', ' Updated Failed! Incorrect password.')->with('message_type', 'warning');
    //     }
    //     // Update password
    //     $user = auth()->user();
    //     $user->update(['password' => Hash::make($request->newpassword), 'updated_at' => now(),]);
    //     return redirect()->route('multi-profile', $id)->with('message', "Password has been updated")
    //         ->with('message_type', 'success')->with('tab', 'profile-profile');
    // }

    public function analytic()
    {
        $totals = WasteCategory::whereHas('booking', function ($query) {
            $query->where('status', 'Accepted'); // Filter by accepted status
        })->selectRaw('
            SUM(paper) as paper,
            SUM(plastic) as plastic,
            SUM(electronic) as electronic,
            SUM(aluminium) as aluminium,
            SUM(steel) as steel,
            SUM(cardboard) as cardboard,
            SUM(textiles) as textiles,
            SUM(metal) as metal,
            SUM(glass) as glass
        ')->first();

        // Estimated Weight Distribution (Histogram)
        $weightDistribution = Booking::selectRaw('CAST(est_weight AS UNSIGNED) as weight')
            ->where('status', 'Accepted')
            ->get()
            ->groupBy(function ($booking) {
                return floor($booking->weight / 1) * 1; // Group weights into bins of 10
            });

        // Trends in Waste Categories Over Time (Line Chart)
        $wasteTrends = WasteCategory::selectRaw('DATE(bookings.pickup_date) as date,
                SUM(paper) as paper, SUM(plastic) as plastic, SUM(electronic) as electronic, SUM(aluminium) as aluminium,
                SUM(steel) as steel, SUM(cardboard) as cardboard, SUM(textiles) as textiles, SUM(metal) as metal, SUM(glass) as glass')
            ->join('bookings', 'waste_categories.booking_id', '=', 'bookings.id')
            ->where('bookings.status', 'Accepted')
            ->groupBy('date')
            ->orderBy('date')
            ->get();

        // dd($wasteTrends);

        // Validation Status Distribution (Pie/Donut Chart)
        $validationStatus = WasteImages::selectRaw('validation_status, COUNT(*) as total')
            ->groupBy('validation_status')
            ->get();

        // Prediction Confidence Levels (Histogram/Box Plot)
        $confidenceLevels = WasteImages::select('confidence')
            ->whereNotNull('confidence')
            ->get();

        // Waste Image Predictions by Category (Bar Chart)
        $predictionsByCategory = WasteImages::selectRaw('prediction, COUNT(*) as total')
            ->whereNotNull('prediction')
            ->groupBy('prediction')
            ->get();

        return view('superadmin.analytic', compact(
            'weightDistribution',
            'wasteTrends',
            'validationStatus',
            'confidenceLevels',
            'predictionsByCategory',
            'totals',
        ));
        // return view('superadmin.analytic', compact('totals'));
    }

}
