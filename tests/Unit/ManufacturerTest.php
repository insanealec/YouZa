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
        $manufacturer = new Manufacturer;
        $manufacturer->name = $this->faker->name;

        $this->assertTrue($manufacturer->save());
    }

    public function test_manufacturer_has_cars(): void
    {
        $manufacturer = new Manufacturer;
        $manufacturer->name = $this->faker->name;
        $manufacturer->save();
        $this->assertEmpty($manufacturer->cars);

        $car1 = new Car;
        $car1->name = $this->faker->name;
        $car2 = new Car;
        $car2->name = $this->faker->name;

        $manufacturer->cars()->saveMany([$car1, $car2]);
        $manufacturer->refresh();
        $this->assertEquals($manufacturer->cars->count(), 2);
    }
}
