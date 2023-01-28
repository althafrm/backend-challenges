<?php

namespace Database\Factories\AppHumanResources\Attendance\Domain;

use App\Models\AppHumanResources\Attendance\Domain\Attendance;
use App\Models\AppHumanResources\Attendance\Domain\Employee;
use App\Models\AppHumanResources\Attendance\Domain\Schedule;
use Illuminate\Database\Eloquent\Factories\Factory;

class AttendanceFactory extends Factory
{
    protected $model = Attendance::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'employee_id' => $this->faker->randomElement(Employee::pluck('id')->toArray()),
            'schedule_id' => $this->faker->randomElement(Schedule::pluck('id')->toArray()),
            'date' => $this->faker->dateTimeBetween('-1 week', 'now')->format('Y-m-d'),
            'checkin' => $this->faker->dateTimeBetween('-1 week', 'now'),
            'checkout' => $this->faker->dateTimeBetween('now', '+1 week'),
            'total_working_hours' => $this->faker->randomFloat(2, 0, 8),
        ];
    }
}
