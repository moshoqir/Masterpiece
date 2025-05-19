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
                        <h1 class="text-white">Edit Pricing Package</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('pricing.index') }}">Pricing Packages</a></li>
                            <li class="breadcrumb-item active text-white">Edit Package</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <form action="{{ route('pricing.update', $pricing->id) }}" method="POST" class="w-75 m-auto">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-primary">
                            <div class="card-header" style="background-color: purple">
                                <h3 class="card-title">Editing Pricing Package</h3>
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
                                    <input type="text" id="name"
                                        class="form-control @error('name') is-invalid @enderror" name="name"
                                        value="{{ old('name', $pricing->name) }}" required>
                                    @error('name')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="duration">Duration</label>
                                            <input type="text" id="duration"
                                                class="form-control @error('duration') is-invalid @enderror" name="duration"
                                                value="{{ old('duration', $pricing->duration) }}" required
                                                placeholder="e.g., 3 Months">
                                            @error('duration')
                                                <span class="invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="price">Price (JOD)</label>
                                            <input type="number" step="0.01" id="price"
                                                class="form-control @error('price') is-invalid @enderror" name="price"
                                                value="{{ old('price', $pricing->price) }}" required>
                                            @error('price')
                                                <span class="invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="icon">Icon Class</label>
                                            <input type="text" id="icon"
                                                class="form-control @error('icon') is-invalid @enderror" name="icon"
                                                value="{{ old('icon', $pricing->icon) }}" placeholder="e.g., fa-dumbbell">
                                            <small class="form-text text-muted">Font Awesome icon class</small>
                                            @error('icon')
                                                <span class="invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="display_order">Display Order</label>
                                            <input type="number" id="display_order"
                                                class="form-control @error('display_order') is-invalid @enderror"
                                                name="display_order"
                                                value="{{ old('display_order', $pricing->display_order) }}">
                                            @error('display_order')
                                                <span class="invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-check">
                                            <input type="hidden" name="is_popular" value="0">
                                            <input type="checkbox" class="form-check-input" id="is_popular"
                                                name="is_popular" value="1"
                                                {{ old('is_popular', $pricing->is_popular) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="is_popular">Mark as Popular</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-check">
                                            <input type="hidden" name="is_active" value="0">
                                            <input type="checkbox" class="form-check-input" id="is_active"
                                                name="is_active" value="1"
                                                {{ old('is_active', $pricing->is_active) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="is_active">Active</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <a href="{{ route('pricing.index') }}" class="btn btn-secondary">Cancel</a>
                        <button type="submit" class="btn btn-warning float-right">Update Package</button>
                    </div>
                </div>
            </form>
        </section>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            // Add feature
            $('#add-feature').click(function() {
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
