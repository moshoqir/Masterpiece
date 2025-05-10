@extends('layouts.user-layout')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h4 class="text-white">Manage Products</h4>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                            <li class="breadcrumb-item active text-white">Products</li>
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
                    <h3 class="card-title">Products</h3>
                    <div class="card-tools">
                        <a href="{{ route('products.create') }}" class="btn btn-primary">Add New Product</a>
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
                                <th class="project-state">ID</th>
                                <th class="project-state">Image</th>
                                <th class="project-state">Name</th>
                                <th class="project-state">Price</th>
                                <th class="project-state">Featured</th>
                                <th class="project-state">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                                <tr id="pid{{ $product->id }}">
                                    <td class="project-state">{{ $product->id }}</td>
                                    <td class="project-state">
                                        @if ($product->image)
                                            <img alt="Product Image" class="table-avatar"
                                                src="{{ asset('storage/' . $product->image) }}">
                                        @else
                                            No Image
                                        @endif
                                    </td>
                                    <td class="project-state">{{ $product->name }}</td>
                                    <td class="project-state">JOD{{ number_format($product->price, 2) }}</td>
                                    <td class="project-state">{{ $product->is_featured ? 'Yes' : 'No' }}</td>
                                    <td class="project-actions project-state">
                                        <a class="btn btn-info btn-sm" href="{{ route('products.show', $product->id) }}">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                        <a class="btn btn-warning btn-sm text-white"
                                            href="{{ route('products.edit', $product->id) }}">
                                            <i class="fas fa-pencil-alt"></i>
                                        </a>
                                        <a href="/products" onclick="deleteProduct({{ $product->id }})"
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
        function deleteProduct(id) {
            if (confirm("Are you sure you want to delete this product?")) {
                $.ajax({
                    url: '/products/' + id,
                    type: 'DELETE',
                    data: {
                        _token: $("input[name=_token]").val() // or use meta tag CSRF
                    },
                    success: function(response) {},
                    error: function(xhr) {
                        console.error(xhr.responseText);
                        alert("Error deleting product.");
                    }
                });
            }
        }
    </script>
@endsection
