@extends('layouts.user-layout')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Edit Pricing Package</h3>
                        <div class="card-tools">
                            <a href="{{ route('pricing.index') }}" class="btn btn-sm btn-default">
                                <i class="fas fa-arrow-left"></i> Back to List
                            </a>
                        </div>
                    </div>
                    <form action="{{ route('pricing.update', $pricing->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            <div class="form-group">
                                <label for="name">Package Name</label>
                                <input type="text" class="form-control" id="name" name="name" required
                                    value="{{ old('name', $pricing->name) }}">
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="duration">Duration</label>
                                        <input type="text" class="form-control" id="duration" name="duration" required
                                            value="{{ old('duration', $pricing->duration) }}" placeholder="e.g., 3 Months">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="price">Price (JOD)</label>
                                        <input type="number" step="0.01" class="form-control" id="price"
                                            name="price" required value="{{ old('price', $pricing->price) }}">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="icon">Icon Class</label>
                                        <input type="text" class="form-control" id="icon" name="icon"
                                            value="{{ old('icon', $pricing->icon) }}" placeholder="e.g., fa-dumbbell">
                                        <small class="form-text text-muted">Font Awesome icon class</small>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="display_order">Display Order</label>
                                        <input type="number" class="form-control" id="display_order" name="display_order"
                                            value="{{ old('display_order', $pricing->display_order) }}">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" class="custom-control-input" id="is_popular"
                                                name="is_popular"
                                                {{ old('is_popular', $pricing->is_popular) ? 'checked' : '' }}>
                                            <label class="custom-control-label" for="is_popular">Mark as Popular</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" class="custom-control-input" id="is_active"
                                                name="is_active"
                                                {{ old('is_active', $pricing->is_active) ? 'checked' : '' }}>
                                            <label class="custom-control-label" for="is_active">Active</label>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Update Package</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

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
@endsection
