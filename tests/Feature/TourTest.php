<?php

it('allows an admin to create a tour', function () {
    $admin = User::factory()->create();

    $response = $this->actingAs($admin)->post('/tours', [
        'name' => 'New Tour',
        'destination_id' => Destination::factory()->create()->id,
        'price' => 1000,
        'description' => 'A new tour description',
    ]);

    $response->assertRedirect('/tours');
    expect(Tour::where('name', 'New Tour')->exists())->toBeTrue();
});
