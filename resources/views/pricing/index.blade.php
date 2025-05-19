@extends('layouts.user-layout')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h4 class="text-white">Manage Pricing Packages</h4>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                            <li class="breadcrumb-item active text-white">Pricing Packages</li>
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
                    <h3 class="card-title">Pricing Packages</h3>
                    <div class="card-tools">
                        <a href="{{ route('pricing.create') }}" class="btn btn-primary">Add New Package</a>
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body p-0">
                    <table class="table table-striped projects" id="proj">
                        <thead>
                            <tr>
                                <th class="project-state">Order</th>
                                <th class="project-state">Name</th>
                                <th class="project-state">Duration</th>
                                <th class="project-state">Price</th>
                                <th class="project-state">Popular</th>
                                <th class="project-state">Status</th>
                                <th class="project-state">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($packages as $package)
                                <tr id="pid{{ $package->id }}">
                                    <td class="project-state">{{ $package->display_order }}</td>
                                    <td class="project-state">{{ $package->name }}</td>
                                    <td class="project-state">{{ $package->duration }}</td>
                                    <td class="project-state">JOD{{ number_format($package->price, 2) }}</td>
                                    <td class="project-state">
                                        @if ($package->is_popular)
                                            <span class="badge badge-success">Yes</span>
                                        @else
                                            <span class="badge badge-secondary">No</span>
                                        @endif
                                    </td>
                                    <td class="project-state">
                                        @if ($package->is_active)
                                            <span class="badge badge-success">Active</span>
                                        @else
                                            <span class="badge badge-danger">Inactive</span>
                                        @endif
                                    </td>
                                    <td class="project-actions project-state">
                                        {{-- <a class="btn btn-info btn-sm" href="{{ route('pricing.show', $package->id) }}">
                                            <i class="fa fa-eye"></i>
                                        </a> --}}
                                        <a class="btn btn-warning btn-sm text-white"
                                            href="{{ route('pricing.edit', $package->id) }}">
                                            <i class="fas fa-pencil-alt"></i>
                                        </a>
                                        <a href="/pricing" onclick="deletePackage({{ $package->id }})"
                                            class="btn btn-danger btn-sm">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->

        </section>
    </div>
    <!-- /.content-wrapper -->
    <script>
        function deletePackage(id) {
            if (confirm("Are you sure you want to delete this package?")) {
                $.ajax({
                    url: '/pricing/' + id,
                    type: 'DELETE',
                    data: {
                        _token: $("input[name=_token]").val()
                    },
                    success: function(response) {
                        $("#pid" + id).remove();
                    }
                });
            }
        }
    </script>
@endsection
