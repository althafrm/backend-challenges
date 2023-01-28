<?php

namespace Database\Factories\AppHumanResources\Attendance\Domain;

use App\Models\AppHumanResources\Attendance\Domain\Location;
use Illuminate\Database\Eloquent\Factories\Factory;

class LocationFactory extends Factory
{
    protected $model = Location::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $locationNames = [
            'Headquarters',
            'Client Site 1',
            'Client Site 2',
            'Client Site 3'
        ];

        $location = $this->faker->randomElement($locationNames);

        return [
            'name' => $location,
            'address' => $this->faker->address(),
        ];
    }
}
