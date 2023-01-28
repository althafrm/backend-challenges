<?php

namespace Database\Factories\AppHumanResources\Attendance\Domain;

use App\Models\AppHumanResources\Attendance\Domain\Employee;
use App\Models\AppHumanResources\Attendance\Domain\Location;
use App\Models\AppHumanResources\Attendance\Domain\Schedule;
use App\Models\AppHumanResources\Attendance\Domain\Shift;
use Illuminate\Database\Eloquent\Factories\Factory;

class ScheduleFactory extends Factory
{
    protected $model = Schedule::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'employee_id' => $this->faker->unique()->numberBetween(1, 20),
            'location_id' => $this->faker->numberBetween(1, 4),
            'shift_id' => $this->faker->numberBetween(1, 2),
        ];
    }
}
