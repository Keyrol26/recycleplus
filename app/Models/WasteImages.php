<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WasteImages extends Model
{
    use HasFactory;

    protected $fillable = ['booking_id','recycle_image','validation_status','confidence','prediction'];
    public function booking()
    {
        return $this->belongsTo(Booking::class , 'id');
    }
}
