<?php

namespace Database\Seeders\AppHumanResources\Attendance\Domain;

use App\Models\AppHumanResources\Attendance\Domain\AttendanceFault;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AttendanceFaultSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $attendanceFaults = AttendanceFault::factory()->count(40)->make()->toArray();
        DB::table('attendance_faults')->insert($attendanceFaults);
    }
}
