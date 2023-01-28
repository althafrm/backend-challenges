<?php

namespace Database\Factories\AppHumanResources\Attendance\Domain;

use App\Models\AppHumanResources\Attendance\Domain\Shift;
use Illuminate\Database\Eloquent\Factories\Factory;

class ShiftFactory extends Factory
{
    protected $model = Shift::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $start_time = $this->faker->time();
        $nonHumanNames = ['morning_shift', 'evening_shift', 'night_shift', 'weekend_shift', 'holiday_shift'];

        return [
            'name' => $this->faker->randomElement($nonHumanNames),
            'start_time' => $this->faker->dateTimeBetween('-5 days', $start_time)->format('H:i:s'),
            'end_time' => $this->faker->dateTimeBetween($start_time, '+5 days')->format('H:i:s'),
        ];
    }
}
