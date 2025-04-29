@extends('layouts.user-layout')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h2>Edit Class</h2>
                    </div>
                    <div class="card-body">
                        @if (session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif

                        <form method="POST" action="{{ route('timetable.update', $class->id) }}">
                            @csrf
                            @method('PUT')

                            <div class="form-group mb-3">
                                <label for="name">Class Name</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                    id="name" name="name" value="{{ old('name', $class->name) }}" required>
                                @error('name')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label for="day">Day</label>
                                <select class="form-control @error('day') is-invalid @enderror" id="day"
                                    name="day" required>
                                    <option disabled value="">Select a day</option>
                                    @foreach ($days as $day)
                                        <option value="{{ $day }}"
                                            {{ old('day', $class->day) == $day ? 'selected' : '' }}>{{ $day }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('day')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label for="time_slot">Time Slot</label>
                                <select class="form-control @error('time_slot') is-invalid @enderror" id="time_slot"
                                    name="time_slot" required>
                                    <option disabled value="">Select a time slot</option>
                                    @foreach ($timeSlots as $timeSlot)
                                        <option value="{{ $timeSlot }}"
                                            {{ old('time_slot', $class->time_slot) == $timeSlot ? 'selected' : '' }}>
                                            {{ $timeSlot }}</option>
                                    @endforeach
                                </select>
                                @error('time_slot')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label for="class_type">Class Type</label>
                                <select class="form-control @error('class_type') is-invalid @enderror" id="class_type"
                                    name="class_type" required>
                                    <option value="">Select a class type</option>
                                    @foreach ($classTypes as $type)
                                        <option value="{{ $type }}"
                                            {{ old('class_type', $class->class_type) == $type ? 'selected' : '' }}>
                                            {{ ucfirst($type) }}</option>
                                    @endforeach
                                </select>
                                @error('class_type')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-check mb-3">
                                <input type="hidden" name="dark_bg" value="0">
                                <!-- Ensures the value is sent when unchecked -->
                                <input type="checkbox" class="form-check-input" id="dark_bg" name="dark_bg" value="1"
                                    {{ old('dark_bg', $class->dark_bg) ? 'checked' : '' }}>
                                <label class="form-check-label" for="dark_bg">Dark Background</label>
                            </div>


                            <div class="d-flex justify-content-between">
                                <a href="{{ route('timetable.index') }}" class="btn btn-secondary">Cancel</a>
                                <button type="submit" class="btn btn-primary">Update Class</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
