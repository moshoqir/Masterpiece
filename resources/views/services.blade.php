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

                    </div>
                </div>
                <div class="col-lg-4 col-md-8">
                    <div class="sidebar-option">
                        <div class="so-categories">
                            <h5 class="title">Categories</h5>
                            <ul>
                                <li><a href="#calender">Yoga <span>12</span></a></li>
                                <li><a href="#calender">Runing <span>32</span></a></li>
                                <li><a href="#calender">Weightloss <span>86</span></a></li>
                                <li><a href="#calender">Cardio <span>25</span></a></li>
                                <li><a href="#calender">Body buiding <span>36</span></a></li>
                                <li><a href="#calender">Nutrition <span>15</span></a></li>
                            </ul>
                        </div>
                        <div class="so-latest">
                            <h5 class="title">LATEST ARTICLES</h5>
                            <div class="latest-large set-bg" data-setbg="img/blog/mentalhealth.png">
                                <div class="ll-text">
                                    <h5><a style="color: black" href="/article1">Physical Fitness Can Help Prevent
                                            Depression and Anxiety
                                        </a></h5>
                                    <ul style="color: black">
                                        <li>{{ date('Y-m-d') }}</li>

                                    </ul>
                                </div>
                            </div>
                            <div class="latest-item">
                                <div class="li-pic">
                                    <img src="img/letest-blog/absworkout.jpg" alt="">
                                </div>
                                <div class="li-text">
                                    <h6><a href="/article2">Fitness: The Best Exercises to Lose Belly Fat and Tone Up</a>
                                    </h6>
                                    <span class="li-time">{{ date('Y-m-d') }}</span>
                                </div>
                            </div>

                            <div class="latest-item">
                                <div class="li-pic">
                                    <img src="img/letest-blog/latest-4.jpg" alt="">
                                </div>
                                <div class="li-text">
                                    <h6><a href="#">Poulet au citron rôti à la poêle d'Ina Garten</a></h6>
                                    <span class="li-time">04/01/2022</span>
                                </div>
                            </div>
                            <div class="latest-item">
                                <div class="li-pic">
                                    <img src="img/letest-blog/latest-5.jpg" alt="">
                                </div>
                                <div class="li-text">
                                    <h6><a href="#">Les meilleures pommes de terre au four en semaine, 3 façons
                                            créatives</a></h6>
                                    <span class="li-time">23/12/2021</span>
                                </div>
                            </div>
                        </div>
                        <div class="so-banner set-bg" data-setbg="img/sidebar-banner.jpg">
                        </div>
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

                                        // Create a structured array to hold the timetable data
                                        $timeSlots = [
                                            '10:00 - 11:00' => [],
                                            '2:00 - 3:00' => [],
                                            '5:30 - 6:30' => [],
                                            '7:00 - 8:00' => [],
                                        ];

                                        $days = ['Saturday', 'Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday'];

                                        Log::info('days', $days);

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
@endsection
