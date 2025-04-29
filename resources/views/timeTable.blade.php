@extends('layouts.home-layout')
@section('content')
    <section class="class-timetable-section class-details-timetable spad" style="padding-top: 50px; padding-bottom: 50px;">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10 mt-4">
                    <div class="class-details-timetable_title text-center ">
                        <h2 id="calender" style="color: #7d276d; font-weight: 700;" class="mt-5">CLASS TIMETABLE</h2>
                    </div>

                    <div class="table-responsive">
                        <div class="class-timetable details-timetable" style="overflow-x: auto;">
                            <table style="width: 100%; margin: 0 auto; border-collapse: separate; border-spacing: 5px;">
                                <thead>
                                    <tr>
                                        <th style="background: #7d276d; color: white; padding: 15px; text-align: center;">
                                            Time/Day</th>
                                        @foreach ($days as $day)
                                            <th
                                                style="background: #7d276d; color: white; padding: 15px; text-align: center;">
                                                {{ $day }}</th>
                                        @endforeach
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($timeSlots as $timeSlot => $slots)
                                        <tr>
                                            <td class="class-time"
                                                style="background: #000; color: white; padding: 15px; text-align: center; font-weight: 600;">
                                                {{ $timeSlot }}</td>
                                            @foreach ($days as $day)
                                                @if (!empty($slots[$day]))
                                                    <td class="{{ $slots[$day]->dark_bg ? 'dark-bg' : '' }} hover-bg ts-meta"
                                                        data-tsmeta="{{ $slots[$day]->class_type }}"
                                                        style="background: #0a0a0a; color: white; padding: 15px; text-align: center; border: 1px solid #363636; vertical-align: middle;">
                                                        <h5 style="color: #7d276d; font-weight: 600; margin-bottom: 5px;">
                                                            {{ $slots[$day]->class_type }}</h5>
                                                        @if (isset($slots[$day]->trainer))
                                                            <span
                                                                style="color: #c4c4c4; font-size: 12px;">{{ $slots[$day]->trainer }}</span>
                                                        @endif
                                                    </td>
                                                @else
                                                    <td class="{{ $loop->iteration % 2 == 0 ? 'dark-bg' : '' }} blank-td"
                                                        style="background: #0a0a0a; border: 1px solid #363636;"></td>
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
        </div>
    </section>

    <style>
        .class-timetable-section {
            background: #151515;
        }

        .class-timetable table {
            width: 100%;
            margin: 0 auto;
            border-radius: 5px;
            overflow: hidden;
        }

        .class-timetable th {
            font-weight: 600;
            text-transform: uppercase;
        }

        .class-timetable td.hover-bg:hover {
            background: #7d276d !important;
            transition: all 0.3s ease;
        }

        .class-timetable td.hover-bg:hover h5 {
            color: white !important;
        }

        .table-responsive {
            padding: 20px 0;
        }

        @media (max-width: 768px) {
            .class-timetable table {
                font-size: 14px;
            }

            .class-timetable th,
            .class-timetable td {
                padding: 10px !important;
            }
        }
    </style>
@endsection
