@extends('layouts.home-layout')
@section('content')
    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="img/breadcrumb-bg.jpg"></section>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <!-- Breadcrumb Section End -->

    <!-- Class Details Section Begin -->
    <section class="class-details-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="class-details-text">
                        <div class="cd-pic">
                            <img src="img/classes/class-details/class-detailsl.jpg" alt="">
                        </div>
                        <div class="cd-text">
                            <div class="cd-single-item">
                                <h3>PERSONAL COACHES</h3>
                                <p>Do you have a goal in mind and need help and guidance to achieve it? Contact a personal
                                    trainer at our club. Use contact us to explore the different profiles and find the best
                                    match based on your preferences and goals. They each have their own specialty and
                                    approach to working, and most importantly, they are all certified professional coaches.
                                </p>
                            </div>
                            <div class="cd-single-item">
                                <h3>SPORTS MONITORING</h3>
                                <p>There are several options available at Dynamo Gym for fitness coaching. The 'Personal
                                    Training Intro' option allows you to be assisted by a qualified Personal Trainer for 60
                                    minutes. The personal trainer will help you achieve your goal, and thanks to their
                                    knowledge, you'll enjoy your workout more, achieve faster results, and reduce the risk
                                    of injury! You'll receive a personalized 12-week training program, nutrition advice, and
                                    weekly meetings with your trainer.</p>
                            </div>
                        </div>

                        <!-- Today's Training Sessions Section -->
                        @php
                            use App\Models\TrainingSession;
                            use Carbon\Carbon;

                            $today = Carbon::today()->toDateString();
                            $todaySessions = TrainingSession::whereDate('day', $today)->orderBy('starts_at')->get();
                        @endphp

                        @if ($todaySessions->isNotEmpty())
                            <div class="cd-single-item">
                                <h3 class="mb-2" style="color: #FFFFFF; font-weight: bold;">TODAY'S TRAINING SESSIONS</h3>
                                <div class="training-day">
                                    <h4>{{ Carbon::today()->format('l, F j, Y') }}</h4>
                                    <div class="session-list">
                                        @foreach ($todaySessions as $session)
                                            <div class="session-item">
                                                <div class="session-time">
                                                    <i class="far fa-clock"></i>
                                                    {{ Carbon::parse($session->starts_at)->format('h:i A') }} -
                                                    {{ Carbon::parse($session->finishes_at)->format('h:i A') }}
                                                </div>
                                                <div class="session-name">
                                                    <i class="fas fa-dumbbell"></i> {{ $session->name }}
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="col-lg-4 col-md-8">
                    <div class="sidebar-option">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Class Details Section End -->


    <!-- Class Timetable Section Begin -->
    <section class="class-timetable-section class-details-timetable spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="class-details-timetable_title">
                        <h5 id="calender">Timetable</h5>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="class-timetable details-timetable">
                        <table>
                            <thead>
                                <tr>
                                    <th>Time/Day</th>
                                    @php
                                        use App\Models\GymClass;
                                        $classes = GymClass::orderBy('day')->orderBy('time_slot')->get();
                                        $timeSlots = [
                                            '10:00 - 11:00' => [],
                                            '2:00 - 3:00' => [],
                                            '5:30 - 6:30' => [],
                                            '7:00 - 8:00' => [],
                                        ];
                                        $days = ['Saturday', 'Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday'];
                                        foreach ($timeSlots as $timeSlot => &$slots) {
                                            foreach ($days as $day) {
                                                $slots[$day] = null;
                                            }
                                        }
                                        foreach ($classes as $class) {
                                            if (in_array($class->day, $days)) {
                                                $timeSlots[$class->time_slot][$class->day] = $class;
                                            }
                                        }
                                    @endphp
                                    @foreach ($days as $day)
                                        <th>{{ $day }}</th>
                                    @endforeach
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($timeSlots as $timeSlot => $slots)
                                    <tr>
                                        <td style="color: white" class="class-time">{{ $timeSlot }}</td>
                                        @foreach ($days as $day)
                                            @if (!empty($slots[$day]))
                                                <td style="border: 1px solid purple"
                                                    class="{{ $slots[$day]->dark_bg ? 'dark-bg' : '' }} hover-dp ts-meta"
                                                    data-tsmeta="{{ $slots[$day]->class_type }}">
                                                    <h5 style="color: white;">{{ $slots[$day]->class_type }}
                                                    </h5>
                                                </td>
                                            @else
                                                <td style="border: 1px solid purple"
                                                    class="{{ $loop->iteration % 2 == 0 ? 'dark-bg' : '' }} blank-td"></td>
                                            @endif
                                        @endforeach
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Class Timetable Section End -->

    <style>
        .training-day {
            margin-bottom: 30px;
            padding: 15px;
            background-color: #f8f9fa;
            border-radius: 5px;
        }

        .training-day h4 {
            color: #7D276D;
            margin-bottom: 15px;
            padding-bottom: 10px;
            border-bottom: 1px solid #ddd;
        }

        .session-item {
            display: flex;
            justify-content: space-between;
            padding: 10px;
            margin-bottom: 8px;
            background-color: white;
            border-radius: 4px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .session-time,
        .session-name {
            display: flex;
            align-items: center;
        }

        .session-time i,
        .session-name i {
            margin-right: 8px;
            color: #7D276D;
        }

        .session-list {
            margin-top: 10px;
        }
    </style>
@endsection
