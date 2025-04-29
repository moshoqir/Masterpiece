@extends('layouts.user-layout')
@section('content')
    <div class="content-wrapper pb-4">
        <div class="container-fluid pt-5">
            <div class="row">
                {{-- # ======================================= # Dashboard Cards # ======================================= # --}}

                @role('admin')
                    {{-- Today Training Sessions --}}
                    <div class="col-lg-3 col-6 mb-4">
                        <div class="card border-0 shadow-lg bg-gradient-primary">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <h2 class="font-weight-bold text-white mb-0">{{ $trainingSessionsCount }}</h2>
                                        <p class="text-white mb-0">Today Training Sessions</p>
                                    </div>
                                    <div class="icon-circle bg-white text-primary">
                                        <i class="fas fa-calendar-alt" style="font-size: 1.5rem"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endrole

                @role('user')
                    {{-- My Reservations --}}
                    <div class="col-lg-3 col-6 mb-4">
                        <a href="{{ route('reservation') }}" class="text-decoration-none">
                            <div class="card border-0 shadow-lg bg-gradient-danger">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div>
                                            <h2 class="font-weight-bold text-white mb-0">{{ $reservationsCount }}</h2>
                                            <p class="text-white mb-0">My Reservations</p>
                                        </div>
                                        <div class="icon-circle bg-white text-danger">
                                            <i class="fas fa-clipboard-list" style="font-size: 1.5rem"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                @endrole

                @role('admin')
                    {{-- Coaches --}}
                    <div class="col-lg-3 col-6 mb-4">
                        <a href="{{ route('coach.list') }}" class="text-decoration-none">
                            <div class="card border-0 shadow-lg bg-gradient-success">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div>
                                            <h2 class="font-weight-bold text-white mb-0">{{ $coaches }}</h2>
                                            <p class="text-white mb-0">Coaches</p>
                                        </div>
                                        <div class="icon-circle bg-white text-success">
                                            <i class="fas fa-user-ninja" style="font-size: 1.5rem"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>

                    {{-- Users --}}
                    <div class="col-lg-3 col-6 mb-4">
                        <a href="{{ route('allUsers.list') }}" class="text-decoration-none">
                            <div class="card border-0 shadow-lg bg-gradient-warning">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div>
                                            <h2 class="font-weight-bold text-white mb-0">{{ $users }}</h2>
                                            <p class="text-white mb-0">Users</p>
                                        </div>
                                        <div class="icon-circle bg-white text-warning">
                                            <i class="fas fa-users" style="font-size: 1.5rem"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>

                    {{-- Products --}}
                    <div class="col-lg-3 col-6 mb-4">
                        <a href="/products" class="text-decoration-none">
                            <div class="card border-0 shadow-lg bg-gradient-info">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div>
                                            <h2 class="font-weight-bold text-white mb-0">{{ $products }}</h2>
                                            <p class="text-white mb-0">Products</p>
                                        </div>
                                        <div class="icon-circle bg-white text-info">
                                            <i class="fas fa-dumbbell" style="font-size: 1.5rem"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                @endrole

                {{-- # ======================================= # Coach Training Sessions # ======================================= # --}}
                @role('coach')
                    <div class="col-12 mb-4">
                        <h2 class="font-weight-bold text-dark mb-4">MY TRAINING SESSIONS</h2>
                    </div>

                    @foreach ($trainingSessions as $session)
                        <div class="col-lg-3 col-md-6 mb-4">
                            <div class="card border-0 shadow-sm h-100">
                                <div class="card-header bg-white border-0 py-3">
                                    <h4 class="font-weight-bold text-center text-primary mb-0">{{ $session->name }}</h4>
                                </div>
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-center border-bottom pb-3 mb-3">
                                        <div class="text-center">
                                            <p class="font-weight-bold mb-1">Starts at</p>
                                            <span class="text-muted">{{ $session->starts_at }}</span>
                                        </div>
                                        <div class="text-center">
                                            <p class="font-weight-bold mb-1">Ends at</p>
                                            <span class="text-muted">{{ $session->finishes_at }}</span>
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        <span class="badge badge-pill badge-primary px-3 py-2">{{ $session->day }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endrole
            </div>
        </div>
    </div>
@endsection

<style>
    .bg-gradient-primary {
        background: linear-gradient(135deg, #3a7bd5 0%, #00d2ff 100%) !important;
    }

    .bg-gradient-danger {
        background: linear-gradient(135deg, #e53935 0%, #e35d5b 100%) !important;
    }

    .bg-gradient-success {
        background: linear-gradient(135deg, #00b09b 0%, #96c93d 100%) !important;
    }

    .bg-gradient-warning {
        background: linear-gradient(135deg, #f46b45 0%, #eea849 100%) !important;
    }

    .bg-gradient-info {
        background: linear-gradient(135deg, #4b6cb7 0%, #182848 100%) !important;
    }

    .icon-circle {
        width: 50px;
        height: 50px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .card {
        border-radius: 12px;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1) !important;
    }

    .badge {
        font-size: 0.9rem;
    }
</style>
