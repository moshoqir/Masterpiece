<?php

namespace App\Http\Controllers;

use App\Models\GymClass;
use App\Http\Requests\StoreGymClassRequest;
use App\Http\Requests\UpdateGymClassRequest;
use Illuminate\Http\Request;

class GymClassController extends Controller
{

    public function index()
    {
      $classes=GymClass::orderBy('day')->orderBy('time_slot')->get();

      //groupBy time_slot
      $timeSlots=[
        '10:00 - 11:00'=>[],
        '2:00 - 3:00'=>[],
        '5:30 - 6:30'=>[],
        '7:00 - 8:00'=>[]
      ];

      $days= ['Saturday', 'Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday'];

      //initializing empty time_slot (for structuring)

      foreach ($timeSlots as $timeSlot => &$slots) {
        foreach ($days as $day) {
            $slots[$day] = null;
        }
    }

      //Fill the structure with the classes
      foreach($classes as $class){
        $timeSlots[$class->time_slot][$class->day]=$class;
      }

      return view('timeTable.index', compact('timeSlots', 'days'));
    }

    /**
     * Show the form for creating a new resource.
     *
     *
     */
    public function create()
    {
        $timeSlots=[
            '10:00 - 11:00',
            '2:00 - 3:00',
            '5:30 - 6:30',
            '7:00 - 8:00'
          ];

          $days= ['Saturday', 'Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday'];

          $classTypes=['HIIT','Step-Dumbell','Zumba','Hips&Abs','Body Pump','Mix Aerobics','Sticks','Core','Trampoline','RB','Circuit Training','Core&Balls','Body Shape','Step','Boxing'];

          return view('timeTable.create',compact('timeSlots','days','classTypes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreGymClassRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'=>'required|string|max:255',
            'day'=>'required|in:Saturday,Sunday,Monday,Tuesday,Wednesday,Thursday,Friday',
            'time_slot'=>'required|in:10:00 - 11:00,2:00 - 3:00,5:30 - 6:30,7:00 - 8:00',
            'class_type'=> 'required|in:HIIT,Step-Dumbell,Zumba,Hips&Abs,Body Pump,Mix Aerobics,Sticks,Core,Trampoline,RB,Circuit Training,Core&Balls,Body Shape,Step,Boxing',
            'dark_bg'=>'boolean',
        ]);

        //checking if class in a day in timeSlot is exists
        $existingClass= GymClass::where('day',$validated['day'])
        ->where('time_slot',$validated['time_slot'])->first();

        if($existingClass){
            return redirect()->back()->with('error', 'A class already exists for this day and time slot.');

        }

        GymClass::create($validated);

        return redirect()->route('timetable.index')->with('success','Class Created Successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\GymClass  $gymClass
     * @return \Illuminate\Http\Response
     */
    public function show(GymClass $gymClass)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\GymClass  $gymClass
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $class=GymClass::findOrFail($id);

        $timeSlots=[
            '10:00 - 11:00',
            '2:00 - 3:00',
            '5:30 - 6:30',
            '7:00 - 8:00'
          ];

          $days= ['Saturday', 'Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday'];

          $classTypes=['HIIT','Step-Dumbell','Zumba','Hips&Abs','Body Pump','Mix Aerobics','Sticks','Core','Trampoline','RB','Circuit Training','Core&Balls','Body Shape','Step','Boxing'];

          return view('timeTable.edit',compact('class','timeSlots','days','classTypes'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateGymClassRequest  $request
     * @param  \App\Models\GymClass  $gymClass
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $class=GymClass::findOrFail($id);

        $validated = $request->validate([
            'name'=>'required|string|max:255',
            'day'=>'required|in:Saturday,Sunday,Monday,Tuesday,Wednesday,Thursday,Friday',
            'time_slot'=>'required|in:10:00 - 11:00,2:00 - 3:00,5:30 - 6:30,7:00 - 8:00',
            'class_type'=> 'required|in:HIIT,Step-Dumbell,Zumba,Hips&Abs,Body Pump,Mix Aerobics,Sticks,Core,Trampoline,RB,Circuit Training,Core&Balls,Body Shape,Step,Boxing',
            'dark_bg'=>'boolean',
        ]);

        // Check if a class already exists for this day and time slot (excluding the current class)
        $existingClass = GymClass::where('day', $validated['day'])
            ->where('time_slot', $validated['time_slot'])
            ->where('id', '!=', $id)
            ->first();

            if ($existingClass) {
                return redirect()->back()->with('error', 'Another class already exists for this day and time slot.');
            }

            $class->update($validated);

            return redirect()->route('timetable.index')->with('success', 'Class updated successfully.');



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\GymClass  $gymClass
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $class = GymClass::findOrFail($id);
        $class->delete();

        return redirect()->route('timetable.index')->with('success', 'Class deleted successfully.');
    }
}
