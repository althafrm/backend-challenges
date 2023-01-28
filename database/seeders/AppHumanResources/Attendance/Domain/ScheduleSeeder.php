<?php

namespace Database\Seeders\AppHumanResources\Attendance\Domain;

use App\Models\AppHumanResources\Attendance\Domain\Schedule;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ScheduleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $schedules = Schedule::factory()->count(20)->make()->toArray();
        DB::table('schedules')->insert($schedules);
    }
}
