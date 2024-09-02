<?php

use App\Models\Destination;

it('validates destination required fields', function () {
    $destination = Destination::factory()->make(['name' => null]);
    expect($destination->save())->toBeFalse();
});

it('has many tours', function () {
    $destination = Destination::factory()->hasTours(3)->create();
    expect($destination->tours)->toHaveCount(3);
});
