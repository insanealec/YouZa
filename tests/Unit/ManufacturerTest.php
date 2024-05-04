<?php

namespace Tests\Unit;

use App\Models\Car;
use App\Models\Manufacturer;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ManufacturerTest extends TestCase
{
    use DatabaseMigrations, WithFaker;

    public function test_manufacturer_can_save(): void
    {
        $manufacturer = Manufacturer::factory()->make();

        $this->assertTrue($manufacturer->save());
    }

    public function test_manufacturer_has_cars(): void
    {
        $manufacturer = Manufacturer::factory()->create();
        $this->assertEmpty($manufacturer->cars);

        $manufacturer->cars()->saveMany([
          Car::factory()->make(),
          Car::factory()->make(),
        ]);
        $manufacturer->refresh();
        $this->assertEquals($manufacturer->cars->count(), 2);
    }
}
