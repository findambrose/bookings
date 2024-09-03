<?php

use App\Models\Booking;
use App\Models\Tour;

it('allows a user to book a tour', function () {
    $tour = Tour::factory()->create();

    $response = $this->post('api/bookings', [
        'tour_id' => $tour->id,
        'user_name' => 'John Doe',
        'email_address' => 'test@test.com',
        'slots' => 2,
        'total_price' => 200,
    ]);

    $response->assertStatus(201);

    expect(Booking::where('tour_id', $tour->id)->exists())->toBeTrue();
});
