@extends('layouts.user-layout')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h4>Contact Message</h4>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                            <li class="breadcrumb-item"><a href="/notifications">Notifications</a></li>
                            <li class="breadcrumb-item active">Message</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <!-- Default box -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Message Details</h3>
                    <div class="card-tools">
                        <a href="/notifications" class="btn btn-sm btn-primary">
                            <i class="fas fa-arrow-left"></i> Back
                        </a>
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label><strong>From:</strong></label>
                                <p class="form-control-plaintext">{{ $contact->name }}</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label><strong>Email:</strong></label>
                                <p class="form-control-plaintext">
                                    <a href="mailto:{{ $contact->email }}">{{ $contact->email }}</a>
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label><strong>Phone:</strong></label>
                                <p class="form-control-plaintext">{{ $contact->phone ?? 'Not provided' }}</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label><strong>Received:</strong></label>
                                <p class="form-control-plaintext">{{ $contact->created_at->format('M j, Y \a\t g:i a') }}
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label><strong>Subject:</strong></label>
                        <h4 class="form-control-plaintext">{{ $contact->subject }}</h4>
                    </div>

                    <div class="form-group">
                        <label><strong>Message:</strong></label>
                        <div class="border p-3 bg-light rounded">
                            {!! nl2br(e($contact->message)) !!}
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    {{-- Uncomment if you want delete functionality
                    <form action="{{ route('admin.contacts.destroy', $contact->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Delete this message?')">
                            <i class="fas fa-trash"></i> Delete
                        </button>
                    </form>
                    --}}

                    <a href="mailto:{{ $contact->email }}?subject=RE: {{ $contact->subject }}"
                        class="btn btn-primary float-right">
                        <i class="fas fa-reply"></i> Reply
                    </a>
                </div>
                <!-- /.card-footer -->
            </div>
            <!-- /.card -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
