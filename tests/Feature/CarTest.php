<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CarTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_can_view_cars_page(): void
    {
        $response = $this->get('/cars');

        $response->assertStatus(200);
    }

    public function test_can_view_car_creation_page(): void

    {
        $response = $this->get('/cars/create');

        $response->assertStatus(200);
    }

    public function test_can_store_car(): void
    {
        $response = $this->post('/cars', [
            'name' => 'Test Car',
            'manufacturer_id' => null
        ]);

        $response
            ->assertSessionHasNoErrors()
            ->assertRedirect('/cars');
    }

    public function test_can_show_car(): void
    {
        $response = $this->get('/cars/1');

        $response->assertStatus(200);
    }

    public function test_can_view_car_edit_page(): void
    {
        $response = $this->get('/cars/1/edit');

        $response->assertStatus(200);
    }

    public function test_can_update_car(): void
    {
        $response = $this->put('/cars/1', [
            'name' => 'Test Car',
            'manufacturer_id' => null
        ]);

        $response
            ->assertSessionHasNoErrors()
            ->assertRedirect('/cars');
    }

    public function test_can_delete_car(): void
    {
        $response = $this->delete('/cars/1');

        $response
            ->assertSessionHasNoErrors()
            ->assertRedirect('/cars');
    }
}
