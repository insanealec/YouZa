<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CarTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function can_view_cars_page(): void
    {
        $response = $this->get('/cars');

        $response->assertStatus(200);
    }
}
