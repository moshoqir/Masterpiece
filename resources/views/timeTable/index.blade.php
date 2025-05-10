@extends('layouts.user-layout')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h4>Gym Class Timetable</h4>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                            <li class="breadcrumb-item active">Timetable</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- Main content -->
        <section class="content">

            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <!-- Default box -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Class Schedule</h3>
                    <div class="card-tools">
                        <a href="{{ route('timetable.create') }}" class="btn btn-primary">
                            <i class="fas fa-plus"></i> Add New Class
                        </a>
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th style="width: 15%">Time/Day</th>
                                    @foreach ($days as $day)
                                        <th>{{ $day }}</th>
                                    @endforeach
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($timeSlots as $timeSlot => $slots)
                                    <tr>
                                        <td><strong>{{ $timeSlot }}</strong></td>
                                        @foreach ($days as $day)
                                            <td
                                                class="{{ !empty($slots[$day]) && $slots[$day]->dark_bg ? 'bg-dark text-white' : '' }}">
                                                @if (!empty($slots[$day]))
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <div>
                                                            <strong>{{ $slots[$day]->name }}</strong>
                                                            <small class="d-block">{{ $slots[$day]->class_type }}</small>
                                                        </div>
                                                        <div class="btn-group">
                                                            <a href="{{ route('timetable.edit', $slots[$day]->id) }}"
                                                                class="btn btn-sm btn-info">
                                                                <i class="fas fa-pencil-alt"></i>
                                                            </a>
                                                            <a href="/timetable"
                                                                onclick="deleteClass({{ $slots[$day]->id }})"
                                                                class="btn btn-sm btn-danger">
                                                                <i class="fas fa-trash"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                @else
                                                    <a href="{{ route('timetable.create', ['day' => $day, 'time_slot' => $timeSlot]) }}"
                                                        class="btn btn-sm btn-outline-secondary">
                                                        <i class="fas fa-plus"></i> Add Class
                                                    </a>
                                                @endif
                                            </td>
                                        @endforeach
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->

        </section>
    </div>
    <!-- /.content-wrapper -->
    <script>
        function deleteClass(id) {
            if (confirm('Are you sure you want to delete this class?')) {
                $.ajax({
                    url: '/timetable/' + id,
                    type: 'DELETE',
                    data: {
                        _token: $("input[name=_token]").val()
                    },
                    success: function(response) {
                        location.reload(); // Refresh the page to update the timetable
                    },
                    error: function(xhr) {
                        alert('Error deleting class: ' + xhr.responseText);
                    }
                });
            }
        }
    </script>
@endsection
