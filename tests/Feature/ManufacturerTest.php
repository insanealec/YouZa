<?php

namespace Tests\Feature;

use App\Models\Car;
use App\Models\Manufacturer;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ManufacturerTest extends TestCase
{
  use DatabaseMigrations, WithFaker;

  public function setUp(): void
  {
      parent::setUp();
      $manufacturer = new Manufacturer;
      $manufacturer->name = $this->faker->name;
      $manufacturer->save();
  }

  public function test_can_view_manufacturers_page(): void
  {
      $response = $this->get('/manufacturers');

      $response->assertStatus(200);
  }

  public function test_can_view_manufacturer_creation_page(): void
  {
      $response = $this->get('/manufacturers/create');

      $response->assertStatus(200);
  }

  public function test_can_store_manufacturer(): void
  {
      $response = $this->post('/manufacturers', [
          'name' => 'Test Manufacturer',
      ]);

      $response
          ->assertSessionHasNoErrors()
          ->assertRedirect('/manufacturers');
  }

  public function test_can_show_manufacturer(): void
  {
      $response = $this->get('/manufacturers/1');

      $response->assertStatus(200);
  }

  public function test_can_view_manufacturer_edit_page(): void
  {
      $response = $this->get('/manufacturers/1/edit');

      $response->assertStatus(200);
  }

  public function test_can_update_manufacturer(): void
  {
      $response = $this->put('/manufacturers/1', [
          'name' => 'Test Manufacturer',
      ]);

      $response
          ->assertSessionHasNoErrors()
          ->assertRedirect('/manufacturers');
  }

  public function test_can_delete_manufacturer(): void
  {
      $response = $this->delete('/manufacturers/1');

      $response
          ->assertSessionHasNoErrors()
          ->assertRedirect('/manufacturers');
  }

  public function test_can_store_car(): void
  {
      $car = new Car;
      $car->name = $this->faker->name;
      $car->save();
      $response = $this->post('/manufacturers/1/cars', [
          'id' => $car->id,
      ]);

      $response
          ->assertSessionHasNoErrors()
          ->assertRedirect('/manufacturers/1');
  }
}
