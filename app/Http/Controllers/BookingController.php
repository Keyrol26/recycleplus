<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Collector;
use App\Models\WasteImages;

class BookingController extends Controller
{
    public function bookingdetails($id)
    {
        $data = Booking::findOrFail($id);

        // dd($data->image->recycle_image);
        //location pin
        $fulladress = $data->address->street . ', ' . $data->address->postal_code . ' ' . $data->address->city . ', ' . $data->address->state;
        $address = urlencode($fulladress);  // Encode address for URL
        $key = env('GOOGLE_MAPS_API_KEY');
        $mapUrl = "https://www.google.com/maps/embed/v1/place?key={$key}={$address}";

        $bookingDate = $data->pickup_date;
        $bookingTime = $data->pickup_time;
        $maxDailyBookings = 3;

        $availableCollectors = Collector::select('collectors.*')
            ->where('status', 'Active')
            ->where(function ($query) use ($bookingDate, $bookingTime, $maxDailyBookings) {
                // Collectors who have no bookings for the given date and time
                $query->whereDoesntHave('booking', function ($subQuery) use ($bookingDate, $bookingTime) {
                    $subQuery->whereDate('pickup_date', $bookingDate)
                        ->whereTime('pickup_time', $bookingTime);
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

        return view('components.booking-details', compact('data', 'mapUrl', 'availableCollectors'));
    }
    public function updatestatus($bookingId, Request $request)
    {
        $booking = Booking::findOrFail($bookingId);

        // Check if 'pickup_status' is provided in the request
        $data = [
            // 'status' => $request->input('status'),
            'updated_at' => now(),
        ];
        if ($request->filled('status')) {
            $data['status'] = $request->input('status');
        }

        if ($request->filled('pickup_status')) {
            $data['pickup_status'] = $request->input('pickup_status');
        }

        $booking->update($data);

        return back()->with('message', 'Booking Status Update Succesfully.')->with('message_type', 'success');
    }

    public function updatevalidationstatus($bookingId, Request $request)
    {
        try {
            $booking = Booking::findOrFail($bookingId);
            $image = WasteImages::where('booking_id', $bookingId);

            $image->update([
                'validation_status' => $request->input('status'),
                'updated_at' => now(),
            ]);

            $status = ($request->input('status') == 'Valid') ? 'Pending' : 'Rejected';

            $booking->update([
                'status' => $status,
                'updated_at' => now(),
            ]);

            return back()->with('message', 'Image Validation Updated Successfully.')
                ->with('message_type', 'success');
        } catch (\Exception $e) {
            return back()->with('message', 'Failed to update validation status. Please try again.')
                ->with('message_type', 'error');
        }
    }

    public function assignedcollector($bookingId, $collectorId)
    {
        $booking = Booking::findOrFail($bookingId);

        $booking->update([
            'collector_id' => $collectorId,
            'updated_at' => now(),
        ]);
        return back()->with('message', 'Collecter assigned Successfully.')
            ->with('message_type', 'success');
    }
    public function unsignedcollector($bookingId)
    {
        $booking = Booking::findOrFail($bookingId);

        $booking->update([
            'collector_id' => Null,
            'updated_at' => now(),
        ]);
        return back()->with('message', 'Collecter have been Unsigned.')
            ->with('message_type', 'info');
    }

    public function collectorstatus($collectorId, Request $request)
    {
        $collector = Collector::findOrFail($collectorId);

        $validatedStatus = $request->validate([
            'status' => 'required|in:Active,Inactive', // Ensure only valid statuses are passed
        ]);

        $collector->update([
            'status' => $validatedStatus['status'],
            'updated_at' => now(),
        ]);

        return back()->with('message', 'Collecter status update Succesfully.')
            ->with('message_type', 'info');
    }

    public function assignedbookingfor($collectorId, Request $request)
    {
        $colldata = Collector::findOrFail($collectorId);
        // dd($name->user->name);
        return view('collector.assignedlist', compact('colldata'));
    }

    public function searchassignedbookingfor($collectorId, Request $request)
    {
        $query = $request->get('query');
        $data = Booking::
            where("collector_id", 'like', $collectorId)
            ->when($query, function ($query, $search) {
                return $query->where(function ($query) use ($search) {
                    $query->orWhere('bookings.pickup_id', 'like', "%{$search}%");
                });
            })
            ->orderBy('bookings.pickup_id')
            ->paginate(10);
        $name = Collector::findOrFail($collectorId);

        // Render the table rows view with the current data
        $view = view('components.table-row', [
            'name' => $name,
            'data' => $data,
            'current_page' => $data->currentPage(),
            'per_page' => $data->perPage()
        ])->render();

        return response()->json([
            'table_data' => $view,
            'pagination' => (string) $data->links('components.bootstrap-4')
        ]);
    }


    public function allbooking()
    {
        $data = Booking::orderBy('bookings.pickup_id')->get();
        // dd($data);
        return view('admin.booking-list.allbookinglist', compact('data'));
    }
    public function searchall(Request $request)
    {
        $query = $request->get('query');

        $data = Booking::where('status', 'like', 'Rejected')
            ->Orwhere('status', 'like', 'Pending')
            ->Orwhere('status', 'like', 'Accepted')
            ->where('pickup_status', Null)
            ->when($query, function ($query, $search) {
                return $query->where(function ($query) use ($search) {
                    $query->orWhere('bookings.pickup_id', 'like', "%{$search}%");
                });
            })
            ->orderByDesc('bookings.pickup_id')
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

    public function acceptbooking()
    {
        return view('admin.booking-list.acceptlist');
    }
    public function searchaccept(Request $request)
    {
        $query = $request->get('query');

        $data = Booking::where('pickup_status', Null)
            ->where('status', 'like', 'Accepted')
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

    public function rejectbooking()
    {
        return view('admin.booking-list.rejectlist');
    }

    public function searchreject(Request $request)
    {
        $query = $request->get('query');

        $data = Booking::where('pickup_status', Null)
            ->where('status', 'like', 'Rejected')
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

    public function inprocessbooking()
    {
        return view('admin.booking-list.inprogresslist');
    }

    public function searchprocess(Request $request)
    {
        $query = $request->get('query');

        $data = Booking::where('pickup_status', Null)
            ->where('status', 'like', 'Processing')
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

    public function pendingbooking()
    {
        return view('admin.booking-list.pendinglist');
    }

    public function searchpending(Request $request)
    {
        $query = $request->get('query');

        $data = Booking::where('pickup_status', Null)
            ->where('status', 'like', 'Pending')
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

    public function unsignedbooking()
    {
        return view('admin.booking-list.unsignedlist');
    }

    public function searchunsigned(Request $request)
    {
        $query = $request->get('query');

        $data = Booking::where('pickup_status', Null)
            ->where('status', 'like', 'Accepted')
            ->where("collector_id", Null)
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

    public function collectorlist(Request $request)
    {
        return view('admin.collectorlist');
    }

    public function searchcollector(Request $request)
    {
        $query = $request->get('query');
        $startOfMonth = date('Y-m-01'); // Start of this month
        $endOfMonth = date('Y-m-t');    // End of this month
        $maxMontlyBookings = 60;

        $availableCollectors = Collector::withCount([
            'booking' => function ($query) use ($startOfMonth, $endOfMonth) {
                $query->whereBetween('pickup_date', [$startOfMonth, $endOfMonth]);
            }
        ])
            ->having('booking_count', '<', $maxMontlyBookings)
            ->when($query, function ($mainQuery, $search) {
                $mainQuery->whereHas('user', function ($userQuery) use ($search) {
                    $userQuery->where('users.name', 'like', "%{$search}%");
                });
            })
            ->paginate(10);

        // Add available slots dynamically
        $availableCollectors->map(function ($collector) use ($maxMontlyBookings) {
            $collector->available_slots = $maxMontlyBookings - $collector->booking_count;
            return $collector;
        });
        // Render the table rows view with the current data
        $view = view('components.collector-table-row', [
            'data' => $availableCollectors,
            'current_page' => $availableCollectors->currentPage(),
            'per_page' => $availableCollectors->perPage()
        ])->render();

        return response()->json([
            'table_data' => $view,
            'pagination' => (string) $availableCollectors->links('components.bootstrap-4')
        ]);
    }

    public function otwbooking()
    {
        return view('admin.pickup-mgmt.otwlist');
    }

    public function searchotw(Request $request)
    {
        $query = $request->get('query');

        $data = Booking::
            where('pickup_status', 'like', 'OnTheWay')
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

    public function collectedbooking()
    {
        return view('admin.pickup-mgmt.collectlist');
    }

    public function searchcollected(Request $request)
    {
        $query = $request->get('query');

        $data = Booking::where('pickup_status', 'like', 'Collected')
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
}
