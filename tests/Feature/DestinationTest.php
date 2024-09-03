<?php

use App\Models\Destination;

it('allows admin to create a destination', function () {
    $response = $this->post('api/destinations', [
        'name' => 'New Destination',
        'description' => 'A new destination description',
    ]);

    $response->assertStatus(201);
    expect(Destination::where('name', 'New Destination')->exists())->toBeTrue();
});

