<?php

namespace Database\Seeders\AppHumanResources\Attendance\Domain;

use App\Models\AppHumanResources\Attendance\Domain\Shift;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ShiftSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $shifts = Shift::factory()->count(2)->make()->toArray();
        DB::table('shifts')->insert($shifts);
    }
}
