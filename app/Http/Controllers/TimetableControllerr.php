<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GymClass;
use Illuminate\Support\Facades\Log;

class TimetableControllerr extends Controller
{
    public function index()
    {
        // Get all classes and organize them by time slot and day
        $classes = GymClass::orderBy('day')->orderBy('time_slot')->get();

        // Create a structured array to hold the timetable data
        $timeSlots=[
            '10:00 - 11:00'=>[],
            '2:00 - 3:00'=>[],
            '5:30 - 6:30'=>[],
            '7:00 - 8:00'=>[]
          ];

        $days = ['Saturday', 'Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday'];


        Log::info('days',$days);

        // Initialize the structure with empty slots
        foreach ($timeSlots as $timeSlot => &$slots) {
            foreach ($days as $day) {
                $slots[$day] = null;
            }
        }

        // Fill in the structure with actual classes
        foreach ($classes as $class) {
            if (in_array($class->day, $days)) {
                $timeSlots[$class->time_slot][$class->day] = $class;
            }
        }

        return view('timeTable', compact('classes', 'timeSlots', 'days'));
    }
}
