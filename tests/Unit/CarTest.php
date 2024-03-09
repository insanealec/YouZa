<?php

namespace Tests\Unit;

use App\Models\Car;
use App\Models\Manufacturer;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CarTest extends TestCase
{
    use DatabaseMigrations, WithFaker;

    public function test_car_can_save(): void
    {
        $car = new Car;
        $car->name = $this->faker->name;

        $this->assertTrue($car->save());
    }

    public function test_car_has_manufacturer(): void
    {
        $manufactuer = new Manufacturer;
        $manufactuer->name = $this->faker->name;
        $this->assertTrue($manufactuer->save());

        $car = new Car;
        $car->name = $this->faker->name;
        $this->assertTrue($car->save());

        $this->assertNull($car->manufacturer);

        $car->manufacturer_id = $manufactuer->id;
        $this->assertTrue($car->save());
        $this->assertNotNull($car->manufacturer);
    }
}
