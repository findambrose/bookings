<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ticket extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'booking_id',
        'ticket_number'
    ];

    public function booking()
    {
        return $this->belongsTo(Booking::class)
            ->withDefault([
                'name' => 'Booking not found',
                'status' => 'Booking not found'
            ]);
    }
}
