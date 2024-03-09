<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ManufacturerTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_can_view_manufacturers_page(): void
    {
        $response = $this->get('/manufacturers');

        $response->assertStatus(200);
    }
}
