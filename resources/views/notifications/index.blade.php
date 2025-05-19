@extends('layouts.user-layout')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h4 class="text-white">All Notifications</h4>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                            <li class="breadcrumb-item active text-white">Notifications</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Notifications</h3>
                    <div class="card-tools">
                        <form action="{{ route('admin.notifications.markAllAsRead') }}" method="POST" class="d-inline">
                            @csrf
                            <button type="submit" class="btn btn-sm btn-success">
                                <i class="fas fa-check-circle"></i> Mark All as Read
                            </button>
                        </form>
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body p-0">
                    <table class="table table-striped projects">
                        <thead>
                            <tr>
                                <th style="width: 10%">Status</th>
                                <th style="width: 25%">Type</th>
                                <th>Message</th>
                                <th style="width: 15%">Date</th>
                                <th style="width: 15%">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($notifications as $notification)
                                <tr class="{{ $notification->read_at ? '' : 'bg-light' }}">
                                    <td>
                                        @if ($notification->read_at)
                                            <span class="badge badge-secondary">Read</span>
                                        @else
                                            <span class="badge badge-primary">Unread</span>
                                        @endif
                                    </td>
                                    <td>
                                        {{ str_replace('App\\Notifications\\', '', $notification->type) }}
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.notifications.markAsRead', $notification->id) }}"
                                            class="{{ $notification->read_at ? 'text-muted' : 'font-weight-bold' }}">
                                            @if (isset($notification->data['subject']))
                                                {{ $notification->data['subject'] }}
                                            @elseif(isset($notification->data['message']))
                                                {{ Str::limit($notification->data['message'], 50) }}
                                            @else
                                                Notification
                                            @endif
                                        </a>
                                    </td>
                                    <td>{{ $notification->created_at->diffForHumans() }}</td>
                                    <td>
                                        <form action="{{ route('admin.notifications.destroy', $notification->id) }}"
                                            method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger"
                                                onclick="return confirm('Delete this notification?')">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center py-4">No notifications found</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                @if ($notifications->hasPages())
                    <div class="card-footer">
                        {{ $notifications->links() }}
                    </div>
                @endif
            </div>
        </section>
    </div>
@endsection
