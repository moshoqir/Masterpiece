@extends('layouts.user-layout')

@section('content')
    @if ($errors->any())
        <div class="w-4/8 m-auto text-center">
            @foreach ($errors->all() as $error)
                <li class="text-red-500 list-none">
                    {{ $error }}
                </li>
            @endforeach
        </div>
    @endif

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper pb-4">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="text-white">Edit Class</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('timetable.index') }}">Class Timetable</a></li>
                            <li class="breadcrumb-item active text-white">Edit Class</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <form action="{{ route('timetable.update', $class->id) }}" method="POST" class="w-75 m-auto">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-12">
                        @if (session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif
                        <div class="card card-primary">
                            <div class="card-header" style="background-color: purple">
                                <h3 class="card-title">Editing Class</h3>
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
                                    <input type="text" id="name"
                                        class="form-control @error('name') is-invalid @enderror" name="name"
                                        value="{{ old('name', $class->name) }}" required>
                                    @error('name')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="day">Day</label>
                                            <select class="form-control @error('day') is-invalid @enderror" id="day"
                                                name="day" required>
                                                <option disabled value="">Select a day</option>
                                                @foreach ($days as $day)
                                                    <option value="{{ $day }}"
                                                        {{ old('day', $class->day) == $day ? 'selected' : '' }}>
                                                        {{ $day }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('day')
                                                <span class="invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="time_slot">Time Slot</label>
                                            <select class="form-control @error('time_slot') is-invalid @enderror"
                                                id="time_slot" name="time_slot" required>
                                                <option disabled value="">Select a time slot</option>
                                                @foreach ($timeSlots as $timeSlot)
                                                    <option value="{{ $timeSlot }}"
                                                        {{ old('time_slot', $class->time_slot) == $timeSlot ? 'selected' : '' }}>
                                                        {{ $timeSlot }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('time_slot')
                                                <span class="invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="class_type">Class Type</label>
                                            <select class="form-control @error('class_type') is-invalid @enderror"
                                                id="class_type" name="class_type" required>
                                                <option value="">Select a class type</option>
                                                @foreach ($classTypes as $type)
                                                    <option value="{{ $type }}"
                                                        {{ old('class_type', $class->class_type) == $type ? 'selected' : '' }}>
                                                        {{ ucfirst($type) }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('class_type')
                                                <span class="invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-check mt-4 pt-3">
                                            <input type="hidden" name="dark_bg" value="0">
                                            <input type="checkbox" class="form-check-input" id="dark_bg" name="dark_bg"
                                                value="1" {{ old('dark_bg', $class->dark_bg) ? 'checked' : '' }}>
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
                        <button type="submit" class="btn btn-warning float-right">Update Class</button>
                    </div>
                </div>
            </form>
        </section>
    </div>
@endsection
