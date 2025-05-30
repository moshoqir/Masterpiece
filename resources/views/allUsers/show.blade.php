@extends('layouts.user-layout')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h4 class="text-white">Show User Number {{ $singleUser->id }}</h4>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                            <li class="breadcrumb-item active text-white">Show</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="card">

                <div class="card-body p-0">
                    <table class="table table-striped projects">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th> Name</th>
                                <th>Email</th>
                                <th>Profile Picture</th>
                            </tr>
                        </thead>
                        <tbody>

                            <tr>
                                <td>{{ $singleUser->id }}</td>
                                <td>{{ $singleUser->name }} </td>
                                <td>{{ $singleUser->email }} </td>
                                <td><img alt="Avatar" class="table-avatar"
                                        src="{{ asset('storage/' . $singleUser->profile_image) }}"></td>
                            </tr>
                        </tbody>
                        <tbody>


                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->

        </section>
    </div>
    <!-- /.content-wrapper -->
@endsection
