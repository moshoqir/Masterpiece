<!doctype html>
<html lang="en">

<head>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <base href="{{ \URL::to('/') }}">
    {{-- icon link --}}
    <link rel="icon" type="image/x-icon" href="{{ asset('img/logo-modified.png') }}">
    {{-- --- --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <meta name="csrf-token" content="{{ csrf_token() }}">


    {{-- JS --}}

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">
    @yield('dataTable')
    <title>Gym System</title>
</head>
<style>
    .fa,
    .fas,
    .fa {
        font-size: .9rem !important;
    }

    body {
        position: relative;
    }

    .dataTables_wrapper .dataTables_length {
        margin-left: 20px !important;
        margin-top: 10px !important;
    }

    .dataTables_wrapper .dataTables_filter,
    .dataTables_wrapper .dataTables_info,
    .dataTables_wrapper .dataTables_paginate {
        margin: 10px 20px !important;
    }

    @media (min-width: 768px) {

        body:not(.sidebar-mini-md):not(.sidebar-mini-xs):not(.layout-top-nav) .content-wrapper,
        body:not(.sidebar-mini-md):not(.sidebar-mini-xs):not(.layout-top-nav) .main-footer,
        body:not(.sidebar-mini-md):not(.sidebar-mini-xs):not(.layout-top-nav) .main-header {
            margin-left: 200px;
        }
    }
</style>
@yield('stripeStyle')

<body class="sidebar-collapse">
    <!-- Preloader -->
    <div class="preloader flex-column justify-content-center align-items-center">
        <img class="animation__shake" src="imgs/weight.png" alt="GymSystemLogo" height="150" width="150">
    </div>
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light" style="font-size: 14px;">

        <!-- Left navbar links -->
        <ul class="navbar-nav">

            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button" id="asideIcon"><i
                        class="fas fa-bars"></i></a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="/dashboard" class="nav-link">Dashboard</a>
            </li>


            <!--  <li class="nav-item d-none d-sm-inline-block">
                <a href="#" class="nav-link">Contact</a>
            </li> -->
        </ul>

        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">

            @if (Auth::user()->hasRole('admin'))
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="far fa-bell"></i>
                        <span
                            class="badge badge-warning navbar-badge notification-badge {{ auth()->user()->unreadNotifications->count() ? '' : 'd-none' }}">
                            {{ auth()->user()->unreadNotifications->count() }}
                        </span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <span class="dropdown-header">{{ auth()->user()->unreadNotifications->count() }}
                            Notifications</span>
                        <div class="dropdown-divider"></div>
                        @foreach (auth()->user()->unreadNotifications as $notification)
                            <a href="{{ $notification->data['url'] ?? '#' }}" class="dropdown-item"
                                onclick="event.preventDefault(); window.location.href='{{ $notification->data['url'] ?? '#' }} '">
                                <i class="fas fa-envelope mr-2"></i>
                                New message from {{ $notification->data['name'] ?? 'Unknown Sender' }}
                                <span class="float-right text-muted text-sm">
                                    {{ $notification->created_at->diffForHumans() }}
                                </span>
                            </a>
                            <div class="dropdown-divider"></div>
                        @endforeach
                        <a href="{{ route('admin.notifications') }}" class="dropdown-item dropdown-footer">See All
                            Notifications</a>
                    </div>
                </li>
            @endif

            <li class="dropdown user user-menu" style="cursor:pointer;">
                <div class="media align-items-center">
                    <img src="{{ asset('storage/' . auth()->user()->profile_image) }}" alt="User Avatar"
                        class="mr-2 mt-1 img-size-32 img-circle mr-2">
                    <div class="media-body">
                        <h6 class="dropdown-item-title text-dark" style="font-size: 14px">
                            {{ auth()->user()->name }}
                        </h6>
                    </div>
                </div>

                <ul class="dropdown-menu" style="width:200px">
                    <li class="user-header mb-1" style="height: 140px;">
                        <img class="profile-user-img img-fluid img-circle"
                            src="{{ asset('storage/' . auth()->user()->profile_image) }}" alt="User profile picture">
                        <p class="mb-0">
                            {{ auth()->user()->name }}
                        </p>
                    </li>
                    <li class="user-footer d-flex justify-content-between">
                        <div class="pull-left">
                            <a href="{{ route('user.show_my_profile') }}" class="btn btn-default btn-flat">Profile</a>
                        </div>
                        <div class="pull-right">
                            <a href="{{ route('logout') }}" class="btn btn-default btn-flat"
                                onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">Logout</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-widget="fullscreen" role="button">
                    <i class="fas fa-expand-arrows-alt"></i>
                </a>
            </li>
        </ul>
    </nav>
    <!-- /.navbar -->
    <!-- Main Sidebar Container -->


    <aside class="main-sidebar sidebar-dark-primary elevation-4" style="font-size: 14px;width: 200px;">
        <!-- Brand Logo -->
        <a href="{{ route('welcome') }}" class="brand-link px-2">
            <span class="brand-text font-weight-light px-4">Dynamo Gym </span>
        </a>
        <!-- Sidebar -->.
        <div class="sidebar">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img src="{{ asset('storage/' . auth()->user()->profile_image) }}" class="img-circle elevation-2"
                        alt="User Image">
                </div>
                <div class="info">
                    <a href="{{ route('user.admin_profile', auth()->user()->id) }}" class="d-block">
                        {{ auth()->user()->name }}
                    </a>
                </div>

            </div>
        </div>
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                @role('admin')
                    {{-- # ======================================= # Coaches # ======================================= # --}}
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-user-ninja"></i>
                            <p> Coaches
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="coach/list" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p> All Coaches </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="coach/create" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p> Add New </p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    {{-- # ======================================= # Users # ======================================= # --}}
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-users"></i>
                            <p> Users
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="/allUsers/list" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p> All Users </p>
                                </a>
                            </li>
                        </ul>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="/allUsers/create" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p> Add User </p>
                                </a>
                            </li>
                        </ul>
                    </li>


                    {{-- # ======================================= # Products # ======================================= # --}}
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-dumbbell"></i>
                            <p> Products
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="/products" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p> All Products </p>
                                </a>
                            </li>
                        </ul>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="/products/create" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p> Add Product </p>
                                </a>
                            </li>
                        </ul>
                    </li>


                    {{-- # ======================================= # Packages # ======================================= # --}}

                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-medal"></i>
                            <p> Packages
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="/pricing" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p> All Packages </p>
                                </a>
                            </li>
                        </ul>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="/pricing/create" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p> Add Package </p>
                                </a>
                            </li>
                        </ul>
                    </li>


                    {{-- # ======================================= # Timetable # ======================================= # --}}
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-calendar-alt"></i>
                            <p> Timetable
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="/timetable" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p> Show Timetable </p>
                                </a>
                            </li>
                        </ul>

                    </li>
                @endrole
                {{-- # ======================================= # Training Session # ======================================= # --}}
                <li class="nav-item">
                    <a href="pages/kanban.html" class="nav-link">
                        <i class="nav-icon fas fa-cube"></i>
                        <p> Training Session
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        @role('admin|user')
                            <li class="nav-item">
                                <a href="{{ route('TrainingSessions.listSessionsAdmin') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p> All Sessions </p>
                                </a>
                            </li>
                        @endrole
                        @role('coach')
                            <li class="nav-item">
                                <a href="{{ route('TrainingSessions.listSessionsCoach') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p> My Sessions </p>
                                </a>
                            </li>
                        @endrole
                        @role('admin|coach')
                            <li class="nav-item">
                                <a href="{{ route('TrainingSessions.training_session') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p> Add New </p>
                                </a>
                            </li>
                        @endrole
                    </ul>
                </li>


                {{-- # ======================================= # Reservations # ======================================= # --}}

                @role('admin')
                    <li class="nav-item">
                        <a href="/listReservationsAdmin" class="nav-link">
                            <i class="nav-icon fas fa-book"></i>
                            <p> Reservations </p>
                            </p>
                        </a>
                        </a>
                    </li>
                @endrole
                @role('user')
                    <li class="nav-item">
                        <a href="/listReservationsUser" class="nav-link">
                            <i class="nav-icon fas fa-book"></i>
                            <p> My Reservations </p>
                            </p>
                        </a>
                        </a>
                    </li>
                @endrole

                {{-- # ======================================= # Banned Users # ======================================= # --}}
                @role('admin')
                    <li class="nav-item">
                        <a href="{{ route('user.listBanned') }}" class="nav-link">
                            <i class="nav-icon fa fa-user-lock"></i>
                            <p> Banned Users </p>
                        </a>
                    </li>
                @endrole

                @role('coach')
                    <li class="nav-item">
                        <a href="/listReservationsCoach" class="nav-link">
                            <i class="nav-icon fas fa-book"></i>
                            <p> Reservations </p>
                            </p>
                        </a>
                        </a>
                    </li>
                @endrole
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>





    @yield('content')
    <div id="sidebar-overlay"></div>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <footer class="main-footer d-flex justify-content-center" style="font-size:13px;">
        <span> Copyright &copy;
            <script>
                document.write(new Date().getFullYear());
            </script> <span class="px-2 py-1" style=" background-color: purple;color: white"> DYNAMO
                GYM </span>
        </span> All rights reserved.
    </footer>
    <!-- jQuery -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="plugins/jquery-ui/jquery-ui.min.js"></script>
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <script src="plugins/sparklines/sparkline.js"></script>
    <script src="plugins/moment/moment.min.js"></script>
    <script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <script src="plugins/daterangepicker/daterangepicker.js"></script>
    <script src="dist/js/adminlte.js"></script>
    <script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <script src="plugins/summernote/summernote-bs4.min.js"></script>
    <!-- DataTables  & Plugins -->
    <script src="../../plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="../../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="../../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="../../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="../../plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="../../plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="../../plugins/jszip/jszip.min.js"></script>
    <script src="../../plugins/pdfmake/pdfmake.min.js"></script>
    <script src="../../plugins/pdfmake/vfs_fonts.js"></script>
    <script src="../../plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="../../plugins/datatables-buttons/js/buttons.print.min.js"></script>
    {{-- <script src="../../plugins/datatables-buttons/js/buttons.colVis.min.js"></script> --}}
    <script src="dist/js/main.js"></script>
    <script>
        $(function() {
            $("#proj").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print"]
            }).buttons().container().appendTo('#proj_wrapper .col-md-6:eq(0)');
        });
    </script>
    @yield('dataTableScript')


</body>
@yield('stripeScript')

</html>
