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
                        <h1 class="text-white">New Coach</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                            <li class="breadcrumb-item active text-white">Create New Coach</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- Main content -->
        <section class="content">
            <form action="{{ route('coach.store') }}" method="post" enctype="multipart/form-data" class="w-75 m-auto">
                @csrf
                <div class="row">
                    <div class="col-md-12">
                        @if (session('status'))
                            <h6 class="alart-success">{{ session('status') }}</h6>
                        @endif
                        <div class="card card-primary">
                            <div class="card-header" style="background-color: purple">
                                <h3 class="card-title">Create</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                        title="Collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input autofocus required minlength="3" maxlength="50" type="text" id="name"
                                        class="form-control" value="" name="name">
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input required type="email" id="email" class="form-control" value=""
                                        name="email">
                                </div>
                                <div class="form-group">
                                    <label for="pass">Password</label>
                                    <input type="password" id="pass" class="form-control" value=""
                                        name="password">
                                </div>
                                <div class="row mb-3">
                                    <label for="profile_image"
                                        class="col-md-4 col-form-label text-md-end">{{ __('Profile Image') }}</label>

                                    <div class="col-md-6">
                                        <input id="profile_image" type="file"
                                            class="form-control @error('profile_image') is-invalid @enderror"
                                            name="profile_image">

                                        @error('profile_image')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <a href="#" class="btn btn-secondary">Cancel</a>
                        <input type="submit" value="Save Changes" class="btn btn-success float-right">
                    </div>
                </div>
            </form>
        </section>
    </div>
@endsection
