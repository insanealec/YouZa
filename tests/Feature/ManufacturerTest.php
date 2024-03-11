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

  private $manufacturer;

  public function setUp(): void
  {
      parent::setUp();
      $this->manufacturer = Manufacturer::factory()->create();
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
      $response = $this->get("/manufacturers/{$this->manufacturer->id}");

      $response->assertStatus(200);
  }

  public function test_can_view_manufacturer_edit_page(): void
  {
      $response = $this->get("/manufacturers/{$this->manufacturer->id}/edit");

      $response->assertStatus(200);
  }

  public function test_can_update_manufacturer(): void
  {
      $response = $this->put("/manufacturers/{$this->manufacturer->id}", [
          'name' => 'Test Manufacturer',
      ]);

      $response
          ->assertSessionHasNoErrors()
          ->assertRedirect('/manufacturers');
  }

  public function test_can_delete_manufacturer(): void
  {
      $response = $this->delete("/manufacturers/{$this->manufacturer->id}");

      $response
          ->assertSessionHasNoErrors()
          ->assertRedirect('/manufacturers');
  }

  public function test_can_store_car(): void
  {
      $car = new Car;
      $car->name = $this->faker->name;
      $car->save();
      $response = $this->post("/manufacturers/{$this->manufacturer->id}/cars", [
          'id' => $car->id,
      ]);

      $response
          ->assertSessionHasNoErrors()
          ->assertRedirect("/manufacturers/{$this->manufacturer->id}");
  }

  public function test_can_remove_car(): void
  {
      $car = new Car;
      $car->name = $this->faker->name;
      $car->save();
      $this->manufacturer->cars()->save($car);
      $response = $this->delete("/manufacturers/{$this->manufacturer->id}/cars", [
          'id' => $car->id,
      ]);

      $response
          ->assertSessionHasNoErrors()
          ->assertRedirect("/manufacturers/{$this->manufacturer->id}");
  }
}
