<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookingActivity extends Model
{
    use HasFactory;

    protected $fillable = ['booking_id','description','updated_by'];

    public function booking()
    {
        return $this->belongsTo(Booking::class , 'booking_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class , 'updated_by');
    }
}
