<?php

namespace Database\Factories\AppHumanResources\Attendance\Domain;

use App\Models\AppHumanResources\Attendance\Domain\Attendance;
use App\Models\AppHumanResources\Attendance\Domain\AttendanceFault;
use App\Models\AppHumanResources\Attendance\Domain\Employee;
use Illuminate\Database\Eloquent\Factories\Factory;

class AttendanceFaultFactory extends Factory
{
    protected $model = AttendanceFault::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $employeeIds = Employee::pluck('id')->toArray();
        $attendanceIds = Attendance::pluck('id')->toArray();

        return [
            'employee_id' => $this->faker->randomElement($employeeIds),
            'attendance_id' => $this->faker->randomElement($attendanceIds),
            'reason' => $this->faker->sentence(),
        ];
    }
}
