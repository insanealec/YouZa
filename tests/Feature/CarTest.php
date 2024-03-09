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

    public function setUp(): void
    {
        parent::setUp();
        $car = new Car;
        $car->name = $this->faker->name;
        $car->save();
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

    public function test_can_dissociate_manufacturer(): void
    {
        $manufacturer = new Manufacturer;
        $manufacturer->name = $this->faker->name;
        $manufacturer->save();
        $car = new Car;
        $car->name = $this->faker->name;
        $car->manufacturer()->associate($manufacturer);
        $car->save();
        $car->refresh();
        $this->assertNotNull($car->manufacturer);

        $response = $this->post('/cars/'.$car->id.'/manufacturer');

        $response
            ->assertSessionHasNoErrors()
            ->assertRedirect('/cars/'.$car->id);
    }
}
