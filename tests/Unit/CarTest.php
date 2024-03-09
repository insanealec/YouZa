<?php

namespace Tests\Unit;

use App\Models\Car;
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
}
