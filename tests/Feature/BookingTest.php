<?php

it('allows a user to book a tour', function () {
    $user = User::factory()->create();
    $tour = Tour::factory()->create();

    $response = $this->actingAs($user)->post('/bookings', [
        'tour_id' => $tour->id,
        'slots' => 2,
    ]);

    $response->assertRedirect('/bookings');
    expect(Booking::where('tour_id', $tour->id)->exists())->toBeTrue();
});

it('allows a user to cancel a booking', function () {
    $user = User::factory()->create();
    $booking = Booking::factory()->create(['user_id' => $user->id]);

    $response = $this->actingAs($user)->put("/bookings/{$booking->id}", [
        'status' => 'cancelled'
    ]);

    $response->assertRedirect('/bookings');
    expect(Booking::find($booking->id))->toBeNull();
});
