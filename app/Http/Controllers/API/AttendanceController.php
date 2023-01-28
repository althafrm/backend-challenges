<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Services\AppHumanResources\Attendance\Application\AttendanceService;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    private $attendanceService;

    public function __construct(AttendanceService $attendanceService)
    {
        $this->attendanceService = $attendanceService;
    }

    public function uploadAttendance(Request $request)
    {
        $validatedData = $request->validate([
            'file' => 'required|file|mimes:xlsx,xls'
        ]);

        if ($validatedData) {
            $uploadAttendance = $this->attendanceService->uploadAttendance($request->file);

            if ($uploadAttendance) {
                return response()->json(['message' => 'Attendance uploaded successfully']);
            } else {
                return response()->json(['message' => 'Attendance upload failed']);
            }
        } else {
            return response()->json(['message' => 'Invalid file format, upload an xls or xlsx file'], 400);
        }
    }

    public function getAttendance()
    {
        $attendance = $this->attendanceService->getAllAttendance();

        return response()->json(['attendance' => $attendance]);
    }
}
