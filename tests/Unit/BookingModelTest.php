<?php

use App\Models\Booking;
use App\Models\Tour;
use App\Models\User;

it('validates bookings required fields', function () {
    $booking = Booking::factory()->make(['tour_id' => null]);
    expect($booking->save())->toBeFalse();
});

it('belongs to a tour and user', function () {
    $booking = Booking::factory()->create();
    expect($booking->tour)->toBeInstanceOf(Tour::class);
    expect($booking->user)->toBeInstanceOf(User::class);
});

it('handles booking status transitions', function () {
    $booking = Booking::factory()->create(['status' => 'pending']);
    $booking->update(['status' => 'confirmed']);
    expect($booking->status)->toBe('confirmed');
});
