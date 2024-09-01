<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Booking extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'tour_id',
        'status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class)
            ->withDefault([
                'name' => 'User not found'
            ]);
    }

    public function tour()
    {
        return $this->belongsTo(Tour::class)
            ->withDefault([
                'name' => 'Tour not found'
            ]);
    }

}
