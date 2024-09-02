<?php

use App\Models\Booking;
use App\Models\Ticket;

it('validates tickets required fields', function () {
    $ticket = Ticket::factory()->make(['booking_id' => null]);
    expect($ticket->save())->toBeFalse();

    $ticket = Ticket::factory()->make(['ticket_number' => null]);
    expect($ticket->save())->toBeFalse();
});

it('belongs to a booking', function () {
    $ticket = Ticket::factory()->create();
    expect($ticket->booking)->toBeInstanceOf(Booking::class);
});
