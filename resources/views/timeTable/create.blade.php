@extends('layouts.user-layout')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper pb-4">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="col-sm-6">
                        <h1 class="text-white">Add New Class</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('timetable.index') }}">Class Timetable</a></li>
                            <li class="breadcrumb-item active text-white">Add Class</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- Main content -->
        <section class="content">
            <form action="{{ route('timetable.store') }}" method="POST" class="w-75 m-auto">
                @csrf
                <div class="row">
                    <div class="col-md-12">
                        @if (session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif
                        <div class="card card-primary">
                            <div class="card-header" style="background-color: purple">
                                <h3 class="card-title">Class Details</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                        title="Collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="name">Class Name</label>
                                    <input type="text" id="name" name="name"
                                        class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}"
                                        required>
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="day">Day</label>
                                            <select id="day" name="day"
                                                class="form-control @error('day') is-invalid @enderror" required>
                                                <option value="">Select a day</option>
                                                @foreach ($days as $day)
                                                    <option value="{{ $day }}"
                                                        {{ old('day') == $day ? 'selected' : '' }}>
                                                        {{ $day }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('day')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="time_slot">Time Slot</label>
                                            <select id="time_slot" name="time_slot"
                                                class="form-control @error('time_slot') is-invalid @enderror" required>
                                                <option value="">Select a time slot</option>
                                                @foreach ($timeSlots as $timeSlot)
                                                    <option value="{{ $timeSlot }}"
                                                        {{ old('time_slot') == $timeSlot ? 'selected' : '' }}>
                                                        {{ $timeSlot }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('time_slot')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="class_type">Class Type</label>
                                            <select id="class_type" name="class_type"
                                                class="form-control @error('class_type') is-invalid @enderror" required>
                                                <option value="">Select a class type</option>
                                                @foreach ($classTypes as $type)
                                                    <option value="{{ $type }}"
                                                        {{ old('class_type') == $type ? 'selected' : '' }}>
                                                        {{ ucfirst($type) }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('class_type')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-check mt-4 pt-3">
                                            <input type="checkbox" class="form-check-input" id="dark_bg" name="dark_bg"
                                                value="1" {{ old('dark_bg') ? 'checked' : '' }}>
                                            <label class="form-check-label" for="dark_bg">Dark Background</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <a href="{{ route('timetable.index') }}" class="btn btn-secondary">Cancel</a>
                        <button type="submit" class="btn btn-success float-right">Save Class</button>
                    </div>
                </div>
            </form>
        </section>
    </div>
@endsection
