<?php

namespace Database\Seeders\AppHumanResources\Attendance\Domain;

use App\Models\AppHumanResources\Attendance\Domain\Location;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $locations = Location::factory()->count(4)->make()->toArray();
        DB::table('locations')->insert($locations);
    }
}
