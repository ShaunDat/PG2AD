<?php

namespace App\Http\Controllers;

use App\AllClass;
use App\Attendance;
use App\Trainer;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class ReportController extends Controller
{
    function __construct()
    {
        $this->middleware('role:admin');
    }

    function index()
    {
        $trainers = Trainer::latest()->get();
        $classes = AllClass::latest()->get();

        return view('report.create', compact('trainers', 'classes'));
    }

    function create(Request $request)
    {
        $request->validate([
            'trainer_id' => 'required|numeric',
            'class_id' => 'required|numeric',
            'attendance_date' => 'required',
        ]);

        $attendance_date = explode('/', $request->attendance_date);
        $month = $attendance_date[0];
        $year = $attendance_date[1];

        $attendances = Attendance::with('user', 'userAsStudent.student', 'class', 'student')
            ->where('trainer_id', $request->trainer_id)
            ->where('class_id', $request->class_id)
            ->whereMonth('attendance_date', '=', $month)
            ->whereYear('attendance_date', '=', $year)
            ->latest()->get();

        if($attendances->count() == 0){
            return "<h2 style='text-align: center'>Sorry, Attendance not found to create report</h2>";
        }

        $pdf = PDF::loadView('report.make_report', compact('attendances', 'month', 'year'));
        return $pdf->stream('report.pdf');
    }
}
