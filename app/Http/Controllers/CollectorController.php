<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Collector;
use App\Models\BookingActivity;
use Illuminate\Http\Request;
use Carbon\Carbon;
class CollectorController extends Controller
{
    public function home()
    {
        $UserId = Auth()->user()->id;
        $collectorId = Collector::where('user_id', $UserId)->pluck('id');

        //panel
        $total = Booking::where("collector_id", $collectorId)->count();
        $assigned = Booking::where("collector_id", $collectorId)->where("pickup_status", Null)->count();
        $otw = Booking::where("collector_id", $collectorId)->where("pickup_status", "like", "OnTheWay")->count();
        $collected = Booking::where("collector_id", $collectorId)->where("pickup_status", "like", "Collected")->count();

        //slot Monthly
        $startOfMonth = date('Y-m-01'); // Start of this month
        $endOfMonth = date('Y-m-t');    // End of this month
        $maxMontlyBookings = 60;

        $availableCollectors = Collector::withCount([
            'booking' => function ($query) use ($startOfMonth, $endOfMonth) {
                $query->whereBetween('pickup_date', [$startOfMonth, $endOfMonth]);
            }
        ])
            ->where("id", $collectorId)
            ->having('booking_count', '<', $maxMontlyBookings)
            ->get();

        // Add available slots dynamically
        $availableCollectors->map(function ($collector) use ($maxMontlyBookings) {
            $collector->available_slots = $maxMontlyBookings - $collector->booking_count;
            return $collector;
        });

        $slot = $availableCollectors->pluck('available_slots')->first();

        //slot Dai;y
        $bookingDate = date('Y-m-d');
        $maxDailyBookings = 3;
        $dailyavailableCollectors = Collector::withCount([
            'booking' => function ($query) use ($bookingDate) {
                $query->whereDate('pickup_date', $bookingDate);
            }
        ])
            ->where("id", $collectorId)
            ->having('booking_count', '<', $maxDailyBookings)
            ->get();

        // Add available slots dynamically
        $dailyavailableCollectors->map(function ($collector) use ($maxDailyBookings) {
            $collector->available_slots = $maxDailyBookings - $collector->booking_count;
            return $collector;
        });

        $dailyslot = $dailyavailableCollectors->pluck('available_slots')->first();

        //Calendar
        $events = [];
        $data = Booking::where("collector_id", $collectorId)->get();
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

        //All Booking
        $allbooking = Booking::where("collector_id", $collectorId)->orderByDesc('created_at')->limit(5)->get();
        $allmonthly = Booking::where("collector_id", $collectorId)->whereBetween('created_at', [$startOfMonth, $endOfMonth])->count();

        //otw Booking
        $otwbooking = Booking::where("collector_id", $collectorId)->where('pickup_status', 'like', 'OnTheWay')->orderby('pickup_date')->limit(5)->get();
        $otwmonthly = Booking::where("collector_id", $collectorId)->where('pickup_status', 'like', 'OnTheWay')->whereBetween('created_at', [$startOfMonth, $endOfMonth])->count();

        //Collected Booking
        $colbooking = Booking::where("collector_id", $collectorId)->where('pickup_status', 'like', 'Collected')->orderby('pickup_date')->limit(5)->get();
        $colmonthly = Booking::where("collector_id", $collectorId)->where('pickup_status', 'like', 'Collected')->whereBetween('created_at', [$startOfMonth, $endOfMonth])->count();

        //Assigned Booking
        $assbooking = Booking::where("collector_id", $collectorId)->where('status', 'like', 'Accepted')->where('pickup_status', Null)->orderby('pickup_date')->limit(5)->get();
        $assmonthly = Booking::where("collector_id", $collectorId)->where('status', 'like', 'Accepted')->where('pickup_status', Null)->whereBetween('created_at', [$startOfMonth, $endOfMonth])->count();

        //timeline
        $timeline = BookingActivity::whereHas('booking', function ($query) use ($collectorId) {
            $query->where('collector_id', $collectorId);
        })
            ->orderBy('created_at', 'desc')
            ->limit(6)
            ->get();

        return view('collector.index', [
            'bookings' => $events,
            'total' => $total,
            'assigned' => $assigned,
            'otw' => $otw,
            'collected' => $collected,
            'slot' => $slot,
            'dailyslot' => $dailyslot,
            'allbooking' => $allbooking,
            'allmonthly' => $allmonthly,
            'otwbooking' => $otwbooking,
            'otwmonthly' => $otwmonthly,
            'colbooking' => $colbooking,
            'colmonthly' => $colmonthly,
            'assbooking' => $assbooking,
            'assmonthly' => $assmonthly,
            'timeline' => $timeline,
        ]);
    }

    public function assignedbooking()
    {
        return view('collector.assignedlist');
    }

    public function searchassigned(Request $request)
    {
        $query = $request->get('query');
        $UserId = Auth()->user()->id;
        $collectorId = Collector::where('user_id', $UserId)->pluck('id');
        $data = Booking::
            where('pickup_status', Null)
            ->where('status', 'like', 'Accepted')
            ->where("collector_id", 'like', $collectorId)
            ->when($query, function ($query, $search) {
                return $query->where(function ($query) use ($search) {
                    $query->orWhere('bookings.pickup_id', 'like', "%{$search}%");
                });
            })
            ->orderBy('bookings.pickup_id')
            ->paginate(10);

        // Render the table rows view with the current data
        $view = view('components.table-row', [
            'data' => $data,
            'current_page' => $data->currentPage(),
            'per_page' => $data->perPage()
        ])->render();

        return response()->json([
            'table_data' => $view,
            'pagination' => (string) $data->links('components.bootstrap-4')
        ]);
    }

    public function otwbooking()
    {
        return view('collector.otwlist');
    }

    public function searchotw(Request $request)
    {
        $query = $request->get('query');
        $UserId = Auth()->user()->id;
        $collectorId = Collector::where('user_id', $UserId)->pluck('id');
        $data = Booking::
            where('pickup_status', 'like', 'OnTheWay')
            ->where("collector_id", 'like', $collectorId)
            ->when($query, function ($query, $search) {
                return $query->where(function ($query) use ($search) {
                    $query->orWhere('bookings.pickup_id', 'like', "%{$search}%");
                });
            })
            ->orderBy('bookings.pickup_id')
            ->paginate(10);

        // Render the table rows view with the current data
        $view = view('components.table-row', [
            'data' => $data,
            'current_page' => $data->currentPage(),
            'per_page' => $data->perPage()
        ])->render();

        return response()->json([
            'table_data' => $view,
            'pagination' => (string) $data->links('components.bootstrap-4')
        ]);
    }

    public function historybooking()
    {
        return view('collector.history');
    }

    public function searchhistory(Request $request)
    {
        $query = $request->get('query');
        $UserId = Auth()->user()->id;
        $collectorId = Collector::where('user_id', $UserId)->pluck('id');
        $data = Booking::
            where('pickup_status', 'like', 'Collected')
            ->where("collector_id", 'like', $collectorId)
            ->when($query, function ($query, $search) {
                return $query->where(function ($query) use ($search) {
                    $query->orWhere('bookings.pickup_id', 'like', "%{$search}%");
                });
            })
            ->orderBy('bookings.pickup_id')
            ->paginate(10);

        // Render the table rows view with the current data
        $view = view('components.table-row', [
            'data' => $data,
            'current_page' => $data->currentPage(),
            'per_page' => $data->perPage()
        ])->render();

        return response()->json([
            'table_data' => $view,
            'pagination' => (string) $data->links('components.bootstrap-4')
        ]);
    }

    public function routemap()
    {
        $UserId = Auth()->user()->id;
        $collectorId = Collector::where('user_id', $UserId)->pluck('id');

        $point1 = Booking::where("collector_id", $collectorId)->first();
        $fulladress1 = $point1->address->street . ', ' . $point1->address->postal_code . ' ' . $point1->address->city . ', ' . $point1->address->state;

        $point2 = Booking::where("collector_id", $collectorId)->orderByDesc('id')->first();
        $fulladress2 = $point2->address->street . ', ' . $point2->address->postal_code . ' ' . $point2->address->city . ', ' . $point2->address->state;
        // dd( $fulladress2);
        $key = env('GOOGLE_MAPS_API_KEY');
        return view('collector.routemap', compact('fulladress1', 'fulladress2', 'key'));
    }

    // public function routemap()
    // {
    //     $UserId = Auth()->user()->id;
    //     $collectorId = Collector::where('user_id', $UserId)->pluck('id');

    //     $point1 = Booking::where("collector_id", $collectorId)->first();
    //     $fulladdress1 = $point1->address->street . ', ' . $point1->address->postal_code . ' ' . $point1->address->city . ', ' . $point1->address->state;

    //     $point2 = Booking::where("collector_id", $collectorId)->orderByDesc('id')->first();
    //     $fulladdress2 = $point2->address->street . ', ' . $point2->address->postal_code . ' ' . $point2->address->city . ', ' . $point2->address->state;
    //     $key = env('GOOGLE_MAPS_API_KEY');
    //     // dd($key);
    //     $response = GoogleMaps::load('directions')
    //         ->setParamByKey('origin', $fulladdress1) // Set the origin
    //         ->setParamByKey('destination', $fulladdress2) // Set the destination
    //         ->setParamByKey('key', $key)
    //         ->get();
    //     // dd($response);

    //     return response()->json(json_decode($response));
    // }
}
