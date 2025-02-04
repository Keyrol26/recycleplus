<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Hash;
use Carbon\Carbon;
use Illuminate\Support\Str;
use App\Models\BookingActivity;
use App\Models\User;
use App\Models\Admins;
use App\Models\Superadmins;
use App\Models\Collector;
use App\Models\UserProfile;
use App\Models\Booking;
use App\Models\Clients;

class SuperadminController extends Controller
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
                'start' => $bookings->pickup_date . 'T' . $bookings->pickup_time, // Combine date and time
                'title' => $bookings->pickup_id ,
                'color' => $color,
            ];
        }
        $spadmin = Superadmins::count();
        $admin = Admins::count();
        $collector = Collector::count();
        $client = Clients::count();

        $newbooking = Booking::orderByDesc('created_at')->limit(5)->get();
        $startOfMonth = date('Y-m-01'); // Start of this month
        $endOfMonth = date('Y-m-t');    // End of this month
        $totalbookmonthly = Booking::whereBetween('created_at', [$startOfMonth, $endOfMonth])->count();
        // dd($endOfMonth);

        //timeline
        $timeline = BookingActivity::orderBy('created_at', 'desc') // Order by oldest to newest
            ->limit(8)->get();

        // dd($timeline);
        // Return data to the view
        return view('superadmin.index', [
            'bookings' => $events,
            'total' => $total,
            'inprocess' => $inprocess,
            'pending' => $pending,
            'accepted' => $accepted,
            'rejected' => $rejected,
            'otw' => $otw,
            'collected' => $collected,
            'spadmin' => $spadmin,
            'admin' => $admin,
            'collector' => $collector,
            'client' => $client,
            'newbooking' => $newbooking,
            'monthly' => $totalbookmonthly,
            'timeline' => $timeline,
        ]);
    }
    public function superadminlist()
    {
        return view('superadmin.userlist');
    }
    public function searchsuperadminlist(Request $request)
    {
        $query = $request->get('query');

        $data = User::where('role', 0)
            ->when($query, function ($query, $search) {
                return $query->where(function ($query) use ($search) {
                    $query->orWhere('users.name', 'like', "%{$search}%");
                });
            })
            ->orderBy('users.id')
            ->paginate(10);

        // Render the table rows view with the current data
        $view = view('components.user-table-row', [
            'data' => $data,
            'current_page' => $data->currentPage(),
            'per_page' => $data->perPage()
        ])->render();

        return response()->json([
            'table_data' => $view,
            'pagination' => (string) $data->links('components.bootstrap-4')
        ]);
    }
    public function adminlist()
    {
        return view('superadmin.userlist');
    }
    public function searchadminlist(Request $request)
    {
        $query = $request->get('query');

        $data = User::where('role', 1)
            ->when($query, function ($query, $search) {
                return $query->where(function ($query) use ($search) {
                    $query->orWhere('users.name', 'like', "%{$search}%");
                });
            })
            ->orderBy('users.id')
            ->paginate(10);

        // Render the table rows view with the current data
        $view = view('components.user-table-row', [
            'data' => $data,
            'current_page' => $data->currentPage(),
            'per_page' => $data->perPage()
        ])->render();

        return response()->json([
            'table_data' => $view,
            'pagination' => (string) $data->links('components.bootstrap-4')
        ]);
    }
    public function collectorlist()
    {
        return view('superadmin.userlist');
    }
    public function searchcollectorlist(Request $request)
    {
        $query = $request->get('query');

        $data = User::where('role', 3)
            ->when($query, function ($query, $search) {
                return $query->where(function ($query) use ($search) {
                    $query->orWhere('users.name', 'like', "%{$search}%");
                });
            })
            ->orderBy('users.id')
            ->paginate(10);

        // Render the table rows view with the current data
        $view = view('components.user-table-row', [
            'data' => $data,
            'current_page' => $data->currentPage(),
            'per_page' => $data->perPage()
        ])->render();

        return response()->json([
            'table_data' => $view,
            'pagination' => (string) $data->links('components.bootstrap-4')
        ]);
    }
    public function clientlist()
    {
        return view('superadmin.userlist');
    }
    public function searchclientlist(Request $request)
    {
        $query = $request->get('query');

        $data = User::where('role', 2)
            ->when($query, function ($query, $search) {
                return $query->where(function ($query) use ($search) {
                    $query->orWhere('users.name', 'like', "%{$search}%");
                });
            })
            ->orderBy('users.id')
            ->paginate(10);

        // Render the table rows view with the current data
        $view = view('components.user-table-row', [
            'data' => $data,
            'current_page' => $data->currentPage(),
            'per_page' => $data->perPage()
        ])->render();

        return response()->json([
            'table_data' => $view,
            'pagination' => (string) $data->links('components.bootstrap-4')
        ]);
    }

    public function adduser()
    {
        return view('superadmin.adduser');
    }

    public function createuser(Request $request)
    {
        //create domain email for staff
        $domain = '@rplus.com';
        //first 5 letter in the fname
        $f5name = substr(Str::lower($request->fname), 0, 5);
        //first 3 letter in the fname and first 3 letter in the lname
        $baseEmail = substr(Str::lower($request->fname), 0, 3) . substr(Str::lower($request->lname), 0, 3);
        $email = $baseEmail . '' . $domain;

        // Ensure uniqueness
        $counter = 1;
        while (User::where('email', $email)->exists()) {
            $email = $baseEmail . $counter . $domain; // Append a counter if email exists
            $counter++;
        }

        //password will be first 5 letter in the fname + day of birth for example Muham12
        $dob = Carbon::parse($request->dob)->format('d');
        $password = $f5name . '' . $dob;

        $user = User::create([
            'name' => $request->fname . ' ' . $request->lname,
            'email' => $email,
            'role' => $request->type,
            'password' => Hash::make($password),
            'created_at' => now(),
            'email_verified_at' => now(),
        ]);
        switch ($request->type) {
            case '0':
                Superadmins::create([
                    'user_id' => $user->id,
                ]);
                $msg = 'New Superadmin created Succesfully';
                $route = 'superadminlist';
                break;
            case '1':
                Admins::create([
                    'user_id' => $user->id,
                ]);
                $msg = 'New Admins created Succesfully';
                $route = 'adminlist';
                break;
            case '3':
                Collector::create([
                    'user_id' => $user->id,
                ]);
                $msg = 'New Collector created Succesfully';
                $route = 'sp.collectorlist';
                break;
        }

        UserProfile::create(['user_id' => $user->id, 'phoneno' => $request->phoneno, 'dob' => $request->dob]);


        // return back()->withSuccess('Thank You', 'Your Appointment Request Has Been Send. We Will Contact You Soon');
        return to_route($route)->with('message', $msg)
            ->with('message_type', 'success');
    }

    public function deleteuser($id, Request $request)
    {
        try {
            // Find the user or return a user-friendly error
            $user = User::findOrFail($id);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return back()->with('message', 'User not found!')->with('message_type', 'danger');
        }
        // Validate the request input
        $request->validate([
            'password' => 'required|string',
        ]);
        $currentPassword = $request->input('password');
        // dd($currentPassword);

        // Verify the provided password
        if (!Hash::check($currentPassword, Auth()->user()->password)) {
            return back()->with('message', ' Delete Failed! Incorrect password.')->with('message_type', 'warning');
        }

        // dd($user);
        switch ($user->role) {
            case '0':
                $msg = 'Superadmin have been Deleted';
                $route = 'superadminlist';
                break;
            case '1':
                $msg = 'Admin have been Deleted';
                $route = 'adminlist';
                break;
            case '3':
                $msg = 'Collector have been Deleted';
                $route = 'sp.collectorlist';
                break;
            case '2':
                $msg = 'Client have been Deleted';
                $route = 'clientlist';
                break;
        }

        // if (!Hash::check($currentPassword, Auth()->user()->password)) {
        //     return to_route($route)->with('message', 'Delete Failed! Incorrect password.')->with('message_type', 'danger');
        // }
        $user->delete();

        return to_route($route)->with('message', $msg)
            ->with('message_type', 'info');
    }
}
