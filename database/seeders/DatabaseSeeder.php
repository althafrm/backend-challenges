<?php

namespace Database\Seeders;

use Database\Seeders\AppHumanResources\Attendance\Domain\AttendanceFaultSeeder;
use Database\Seeders\AppHumanResources\Attendance\Domain\AttendanceSeeder;
use Database\Seeders\AppHumanResources\Attendance\Domain\EmployeeSeeder;
use Database\Seeders\AppHumanResources\Attendance\Domain\LocationSeeder;
use Database\Seeders\AppHumanResources\Attendance\Domain\ScheduleSeeder;
use Database\Seeders\AppHumanResources\Attendance\Domain\ShiftSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        $this->call([
            EmployeeSeeder::class,
            LocationSeeder::class,
            ShiftSeeder::class,
            ScheduleSeeder::class,
            // AttendanceSeeder::class,
            // AttendanceFaultSeeder::class,
        ]);
    }
}
