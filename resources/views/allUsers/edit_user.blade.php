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
                        <h1 class="text-white">Edit User</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                            <li class="breadcrumb-item active text-white">Edit User</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- Main content -->
        <section class="content">
            <form action="{{ route('user.update', ['user' => $user['id']]) }}" method="post" enctype="multipart/form-data"
                class="w-75 m-auto">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-primary">
                            <div class="card-header" style="background-color: purple">
                                <h3 class="card-title">Editing</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"title="Collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" id="name" class="form-control" value="{{ $user->name }}"
                                        name="name">
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" id="email" class="form-control" value="{{ $user->email }}"
                                        name="email" readonly>

                                </div>
                                <div class="form-group">
                                    <label for="day">Subscription Start</label>
                                    <input type="date" id="dayStart" class="form-control"
                                        value="{{ $user->subscription_start }}" name="subscription_start">
                                </div>
                                <div class="form-group">
                                    <label for="day">Subscription End</label>
                                    <input type="date" id="dayEnd" class="form-control"
                                        value="{{ $user->subscription_end }}" name="subscription_end">
                                </div>

                                <div class="form-group mb-3">
                                    <label for="profile_image">User Image</label>
                                    @if ($user->profile_image)
                                        <div class="mb-2">
                                            <img src="{{ asset('storage/' . $user->profile_image) }}" width="100"
                                                alt="{{ $user->name }}">
                                        </div>
                                    @endif
                                    <input type="file" class="form-control @error('profile_image') is-invalid @enderror"
                                        id="profile_image" name="profile_image">
                                    @error('profile_image')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <a href="/allUsers/list" class="btn btn-secondary">Cancel</a>
                        <input type="submit" value="Update" class="btn btn-warning float-right">
                    </div>
                </div>
            </form>
        </section>
    </div>
@endsection
