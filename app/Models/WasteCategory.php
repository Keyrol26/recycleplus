<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WasteCategory extends Model
{
    use HasFactory;
    protected $fillable = [
        'booking_id',
        'paper',
        'plastic',
        'electronic',
        'aluminium',
        'steel',
        'cardboard',
        'textiles',
        'metal',
        'glass'
    ];
    public function booking()
    {
        return $this->belongsTo(Booking::class, 'id');
    }
}
