<?php

namespace Database\Seeders\AppHumanResources\Attendance\Domain;

use App\Models\AppHumanResources\Attendance\Domain\Employee;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $employees = Employee::factory()->count(20)->make()->toArray();
        DB::table('employees')->insert($employees);
    }
}
