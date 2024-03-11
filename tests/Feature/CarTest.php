<?php

namespace Tests\Feature;

use App\Models\Car;
use App\Models\Manufacturer;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CarTest extends TestCase
{
    use DatabaseMigrations, WithFaker;

    private $car;

    public function setUp(): void
    {
        parent::setUp();
        $this->car = Car::factory()->create();
    }

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
        $response = $this->get("/cars/{$this->car->id}");

        $response->assertStatus(200);
    }

    public function test_can_view_car_edit_page(): void
    {
        $response = $this->get("/cars/{$this->car->id}/edit");

        $response->assertStatus(200);
    }

    public function test_can_update_car(): void
    {
        $response = $this->put("/cars/{$this->car->id}", [
            'name' => 'Test Car',
            'manufacturer_id' => null
        ]);

        $response
            ->assertSessionHasNoErrors()
            ->assertRedirect('/cars');
    }

    public function test_can_delete_car(): void
    {
        $response = $this->delete("/cars/{$this->car->id}");

        $response
            ->assertSessionHasNoErrors()
            ->assertRedirect('/cars');
    }

    public function test_can_dissociate_manufacturer(): void
    {
        $manufacturer = Manufacturer::factory()->create();
        $this->car->manufacturer()->associate($manufacturer);
        $this->car->save();
        $this->car->refresh();
        $this->assertNotNull($this->car->manufacturer);

        $response = $this->delete("/cars/{$this->car->id}/manufacturer");

        $response
            ->assertSessionHasNoErrors()
            ->assertRedirect("/cars/{$this->car->id}");
    }
}
