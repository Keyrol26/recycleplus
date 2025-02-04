<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;
    protected $table = 'bookings';
    protected $fillable = [
        'client_id',
        'pickup_id',
        'collector_id',
        'address_id',
        'name',
        'status',
        'pickup_status',
        'phoneno',
        'alt_phoneno',
        'est_weight',
        'note',
        'pickup_date',
        'pickup_time',
    ];
    public function client()
    {
        return $this->belongsTo(Clients::class, 'client_id');
    }

    public function address()
    {
        return $this->belongsTo(Address::class, 'address_id');
    }

    public function image()
    {
        return $this->hasOne(WasteImages::class, 'booking_id');
    }

    public function timeline()
    {
        return $this->hasMany(BookingActivity::class, 'booking_id');
    }

    public function category()
    {
        return $this->hasOne(WasteCategory::class, 'booking_id');
    }
    public function collector()
    {
        return $this->belongsTo(Collector::class, 'collector_id');
    }
}
