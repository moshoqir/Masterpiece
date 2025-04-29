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
                        <h1>Create Pricing Package</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('pricing.index') }}">Pricing Packages</a></li>
                            <li class="breadcrumb-item active">Create Package</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- Main content -->
        <section class="content">
            <form action="{{ route('pricing.store') }}" method="post" class="w-75 m-auto">
                @csrf
                <div class="row">
                    <div class="col-md-12">
                        @if (session('status'))
                            <h6 class="alart-success">{{ session('status') }}</h6>
                        @endif
                        <div class="card card-primary">
                            <div class="card-header" style="background-color: #007bff">
                                <h3 class="card-title">Package Details</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                        title="Collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="name">Package Name</label>
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
                                            <label for="duration">Duration</label>
                                            <input type="text" id="duration" name="duration"
                                                class="form-control @error('duration') is-invalid @enderror"
                                                value="{{ old('duration') }}" placeholder="e.g., 3 Months" required>
                                            @error('duration')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="price">Price (JOD)</label>
                                            <input type="number" step="0.01" id="price" name="price"
                                                class="form-control @error('price') is-invalid @enderror"
                                                value="{{ old('price') }}" required>
                                            @error('price')
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
                                            <label for="icon">Icon Class</label>
                                            <input type="text" id="icon" name="icon"
                                                class="form-control @error('icon') is-invalid @enderror"
                                                value="{{ old('icon') }}" placeholder="e.g., fa-dumbbell">
                                            <small class="form-text text-muted">Font Awesome icon class</small>
                                            @error('icon')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="display_order">Display Order</label>
                                            <input type="number" id="display_order" name="display_order"
                                                class="form-control @error('display_order') is-invalid @enderror"
                                                value="{{ old('display_order', 0) }}">
                                            @error('display_order')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="is_popular"
                                                name="is_popular" value="1" {{ old('is_popular') ? 'checked' : '' }}>
                                            <label class="form-check-label" for="is_popular">Mark as Popular</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="is_active"
                                                name="is_active" value="1"
                                                {{ old('is_active', true) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="is_active">Active</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group mt-3">
                                    <label>Package Features</label>
                                    <div id="features-container">
                                        <div class="input-group mb-2">
                                            <input type="text"
                                                class="form-control @error('features.0') is-invalid @enderror"
                                                name="features[]" value="{{ old('features.0') }}" placeholder="Feature"
                                                required>
                                            <div class="input-group-append">
                                                <button class="btn btn-outline-danger remove-feature"
                                                    type="button">Remove</button>
                                            </div>
                                            @error('features.0')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <button type="button" class="btn btn-sm btn-outline-primary" id="add-feature">
                                        <i class="fas fa-plus"></i> Add Feature
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <a href="{{ route('pricing.index') }}" class="btn btn-secondary">Cancel</a>
                        <button type="submit" class="btn btn-success float-right">Create Package</button>
                    </div>
                </div>
            </form>
        </section>
    </div>

    @push('scripts')
        <script>
            $(document).ready(function() {
                // Add feature
                $('#add-feature').click(function() {
                    const index = $('#features-container .input-group').length;
                    $('#features-container').append(`
                        <div class="input-group mb-2">
                            <input type="text" class="form-control" name="features[]" required placeholder="Feature">
                            <div class="input-group-append">
                                <button class="btn btn-outline-danger remove-feature" type="button">Remove</button>
                            </div>
                        </div>
                    `);
                });

                // Remove feature
                $(document).on('click', '.remove-feature', function() {
                    if ($('#features-container .input-group').length > 1) {
                        $(this).closest('.input-group').remove();
                    } else {
                        alert('You need at least one feature');
                    }
                });
            });
        </script>
    @endpush
@endsection
