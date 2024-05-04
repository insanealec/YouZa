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
        $car = Car::factory()->make();

        $this->assertTrue($car->save());
    }

    public function test_car_has_manufacturer(): void
    {
        $manufactuer = Manufacturer::factory()->make();
        $this->assertTrue($manufactuer->save());

        $car = Car::factory()->make();
        $this->assertTrue($car->save());

        $this->assertNull($car->manufacturer);

        $car->manufacturer()->associate($manufactuer);
        $this->assertTrue($car->save());
        $car->refresh();
        $this->assertNotNull($car->manufacturer);
    }
}
