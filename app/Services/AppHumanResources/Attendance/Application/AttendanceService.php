<?php

namespace App\Services\AppHumanResources\Attendance\Application;

use PhpOffice\PhpSpreadsheet\IOFactory;
use App\Models\AppHumanResources\Attendance\Domain\Attendance;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Carbon;

class AttendanceService
{
    public function uploadAttendance(UploadedFile $file)
    {
        // Create a reader for the file
        $reader = IOFactory::createReaderForFile($file);
        $spreadsheet = $reader->load($file);

        // Get the first sheet
        $sheet = $spreadsheet->getSheet(0);

        // Get the highest row number
        $highestRow = $sheet->getHighestRow();

        $attendances = [];
        $now = now();

        // Iterate through the rows
        for ($row = 1; $row <= $highestRow; $row++) {
            // Skip header row if exists
            if (
                $row === 1 &&
                !is_numeric($sheet->getCellByColumnAndRow(1, $row)->getValue())
            ) {
                continue;
            }

            // Get the data from the current row
            $employeeId = $sheet->getCellByColumnAndRow(1, $row)->getValue();
            $scheduleId = $sheet->getCellByColumnAndRow(2, $row)->getValue();
            $date = $sheet->getCellByColumnAndRow(3, $row)->getFormattedValue();
            $checkin = $sheet->getCellByColumnAndRow(4, $row)->getFormattedValue();
            $checkout = $sheet->getCellByColumnAndRow(5, $row)->getFormattedValue();
            $totalWorkingHours = $sheet->getCellByColumnAndRow(6, $row)->getFormattedValue();

            // Calculate the total working hours
            $date = $date ? Carbon::createFromFormat('m/d/Y', $date) : null;
            $checkin = $checkin ? Carbon::createFromFormat('H:i:s', $checkin) : null;
            $checkout = $checkout ? Carbon::createFromFormat('H:i:s', $checkout) : null;
            // $totalWorkingHours = $checkin && $checkout ?
            //     $checkout->diffInSeconds($checkin) / 3600 :
            //     0;

            // Append current attendance to attendances array
            $attendances[] = [
                'employee_id' => $employeeId,
                'schedule_id' => $scheduleId,
                'date' => $date,
                'checkin' => $checkin,
                'checkout' => $checkout,
                'total_working_hours' => $totalWorkingHours,
                'created_at' => $now,
            ];
        }

        //Save attendances to the database
        Attendance::insert($attendances);

        return true;
    }

    public function getAllAttendance()
    {
        return Attendance::with('employee')
            ->join('employees', 'attendances.employee_id', '=', 'employees.id')
            ->select('attendances.*', 'employees.name as employee_name')
            ->orderBy('date', 'asc')
            ->orderBy('employee_id', 'asc')
            ->get();
    }
}
