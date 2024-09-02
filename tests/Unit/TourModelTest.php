<?php

use App\Models\Tour;

it('validates tours required fields', function () {
    $tour = Tour::factory()->make(['name' => null]);
    expect($tour->save())->toBeFalse();
});

it('belongs to a destination', function () {
    $tour = Tour::factory()->create();
    expect($tour->destination)->toBeInstanceOf(Destination::class);
});
