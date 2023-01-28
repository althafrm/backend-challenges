<?php

namespace Database\Factories\AppHumanResources\Attendance\Domain;

use App\Models\AppHumanResources\Attendance\Domain\Employee;
use Illuminate\Database\Eloquent\Factories\Factory;

class EmployeeFactory extends Factory
{
    protected $model = Employee::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'email' => $this->faker->email(),
            'password' => bcrypt('password'),
        ];
    }
}
