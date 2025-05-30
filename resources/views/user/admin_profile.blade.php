@extends('layouts.user-layout')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper pb-4">
        @if (\Session::has('success'))
            <div class="alert alert-success">
                <ul>
                    <li>{!! \Session::get('success') !!}</li>
                </ul>
            </div>
        @endif
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">

                <div class="row mb-2">

                    <div class="col-sm-6">
                        <h4 class="text-white">Profile</h4>
                    </div>


                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                            <li class="breadcrumb-item active text-white"> User Profile</li>
                        </ol>
                    </div>

                </div>

            </div><!-- /.container-fluid -->
        </section>
        <!-- Main content -->
        <!-- Profile Image -->
        <div class="d-flex ">
            <div class="card card-purple card-outline w-25 m-auto">
                <div class="card-body box-profile">
                    <div class="text-center">
                        <img class="profile-user-img img-fluid img-circle"
                            src="{{ asset('storage/' . auth()->user()->profile_image) }}" alt="User profile picture">


                    </div>

                    <h3 class="profile-username text-center">{{ auth()->user()->name }}</h3>

                    <p class="text-muted text-center">{{ auth()->user()->role }}</p>

                    <ul class="list-group list-group-unbordered mb-3">
                        <li class="list-group-item">

                            <b>Name</b> <a style="color: purple" class="float-right">{{ auth()->user()->name }}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Email</b> <a style="color: purple" class="float-right">{{ auth()->user()->email }}</a>
                        </li>

                    </ul>

                    <a href="{{ route('user.edit_my_profile', auth()->user()->id) }}" class="btn  btn-block"
                        style="background-color: purple; color: white;"><b>Edit</b></a>


                </div>
                <!-- /.card-body -->
            </div>
        </div>
    </div>
@endsection
