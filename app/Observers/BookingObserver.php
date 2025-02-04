<?php

namespace App\Observers;

use App\Models\Booking;
use App\Models\BookingActivity;
use Auth;

class BookingObserver
{
    /**
     * Handle the Booking "created" event.
     */
    public function created(Booking $booking): void
    {
        BookingActivity::create([
            'booking_id' => $booking->id,
            'description' => 'New booking created #' . $booking->pickup_id,
            'updated_by' => Auth::id(),
        ]);
    }

    /**
     * Handle the Booking "updated" event.
     */
    public function updated(Booking $booking): void
    {
        if ($booking->isDirty('status')) {
            BookingActivity::create([
                'booking_id' => $booking->id,
                'description' => $booking->pickup_id . ' booking status updated to ' . $booking->status,
                'updated_by' => Auth::id(),
            ]);
        }

        if ($booking->isDirty('collector_id')) {
            $status = $booking->collector_id ? 'have been assigned' : 'have been unassigned';
            BookingActivity::create([
                'booking_id' => $booking->id,
                'description' => 'Collector for #' . $booking->pickup_id . ' ' . $status,
                'updated_by' => Auth::id(),
            ]);
        }

        if ($booking->isDirty('pickup_status')) {
            BookingActivity::create([
                'booking_id' => $booking->id,
                'description' => $booking->pickup_id . ' pickup status updated to ' . $booking->pickup_status,
                'updated_by' => Auth::id(),
            ]);
        }
    }

    /**
     * Handle the Booking "deleted" event.
     */
    public function deleted(Booking $booking): void
    {
        //
    }

    /**
     * Handle the Booking "restored" event.
     */
    public function restored(Booking $booking): void
    {
        //
    }

    /**
     * Handle the Booking "force deleted" event.
     */
    public function forceDeleted(Booking $booking): void
    {
        //
    }
}
