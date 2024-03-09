<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class ManufacturerTest extends TestCase
{
    use DatabaseMigrations;

    public function test_can_view_manufacturers_page(): void
    {
        $response = $this->get('/manufacturers');

        $response->assertStatus(200);
    }
}
