<?php

it('has ticket page', function () {
    $response = $this->get('/ticket');

    $response->assertStatus(200);
});
