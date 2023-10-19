<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>Admin</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('') }}plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet"
        href="{{ asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- JQVMap -->
    <link rel="stylesheet" href="{{ asset('plugins/jqvmap/jqvmap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{ asset('plugins/daterangepicker/daterangepicker.css') }}">
    <!-- summernote -->
    <link rel="stylesheet" href="{{ asset('plugins/summernote/summernote-bs4.min.css') }}">

    <!-- Boxicons -->
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.js"></script>

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>



    <style>
        a {
            text-decoration: none;
        }

    </style>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="{{ asset('assets/images/logotouch.png') }}" alt="Saura Dental Clinic">
        </div>

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i
                            class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button">@yield('title')</a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <span class="nav-link">Welcome, Admin</span>
                </li>
                <li class="nav-item">
                    <span class="nav-link">
                        <i id="toggleLogout" class="text-danger fas fa-sign-out-alt" style="cursor: pointer"></i>
                    </span>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-light-primary elevation-2">
            <!-- Brand Logo -->
            <a href="#" class="brand-link">
                <img src="{{ asset('assets/images/logo512.png') }}" alt="Saura Logo" class="brand-image">
                <span class="ml-3">Saura Dental Clinic</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">

                        <li class="nav-item">
                            <a href="#"
                                @if ($page_open == 'dashboard') class="nav-link active" @else class="nav-link" @endif>
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Dashboard
                                </p>
                            </a>
                        </li>

                        <li @if ($page_title == 'content') class="nav-item menu-open" @else class="nav-item" @endif>
                            <a href="#"
                                @if ($page_title == 'content') class="nav-link active" @else class="nav-link" @endif>
                                <i class="nav-icon fas fa-file"></i>
                                <p>
                                    Content MS
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="#"
                                        @if ($page_open == 'home') class="nav-link active" @else class="nav-link" @endif>
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Home Page</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#"
                                        @if ($page_open == 'about') class="nav-link active" @else class="nav-link" @endif>
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>About Page</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#"
                                        @if ($page_open == 'contact') class="nav-link active" @else class="nav-link" @endif>
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Contact Page</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#"
                                        @if ($page_open == 'owners') class="nav-link active" @else class="nav-link" @endif>
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Bakeshop Owners</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#"
                                        @if ($page_open == 'devs') class="nav-link active" @else class="nav-link" @endif>
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>System Developers</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#"
                                        @if ($page_open == 'post') class="nav-link active" @else class="nav-link" @endif>
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Post</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#"
                                        @if ($page_open == 'messages') class="nav-link active" @else class="nav-link" @endif>
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Messages</p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li
                            @if ($page_title == 'inventory') class="nav-item menu-open" @else class="nav-item" @endif>
                            <a href="#"
                                @if ($page_title == 'inventory') class="nav-link active" @else class="nav-link" @endif>
                                <i class="nav-icon fas fa-chart-pie"></i>
                                <p>
                                    Inventory MS
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="#"
                                        @if ($page_open == 'orders') class="nav-link active" @else class="nav-link" @endif>
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Orders</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#"
                                        @if ($page_open == 'products') class="nav-link active" @else class="nav-link" @endif>
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Products</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#"
                                        @if ($page_open == 'categories') class="nav-link active" @else class="nav-link" @endif>
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Categories</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#"
                                        @if ($page_open == 'ingredients') class="nav-link active" @else class="nav-link" @endif>
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Ingredients</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#"
                                        @if ($page_open == 'log') class="nav-link active" @else class="nav-link" @endif>
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Inventory Log</p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li
                            @if ($page_title == 'sales') class="nav-item menu-open" @else class="nav-item" @endif>
                            <a href="#"
                                @if ($page_title == 'sales') class="nav-link active" @else class="nav-link" @endif>
                                <i class="nav-icon fas fa-book"></i>
                                <p>
                                    Sales Report
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="#"
                                        @if ($page_open == 'sales') class="nav-link active" @else class="nav-link" @endif>
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Sales</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#"
                                        @if ($page_open == 'expenses') class="nav-link active" @else class="nav-link" @endif>
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Expenses</p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper p-4">
            @yield('content')
        </div>
        <!-- /.content-wrapper -->
        <footer class="main-footer">
            <span>Copyright &copy; <strong>Capstone</strong>.</span>
            All rights reserved.
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    {{-- <script src="plugins/jquery/jquery.min.js"></script> --}}
    <!-- jQuery UI 1.11.4 -->
    <script src="{{ asset('plugins/jquery-ui/jquery-ui.min.js') }}"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- ChartJS -->
    <script src="{{ asset('plugins/chart.js/Chart.min.js') }}"></script>
    <!-- Sparkline -->
    <script src="{{ asset('plugins/sparklines/sparkline.js') }}"></script>
    <!-- JQVMap -->
    <script src="{{ asset('plugins/jqvmap/jquery.vmap.min.js') }}"></script>
    <script src="{{ asset('plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
    <!-- jQuery Knob Chart -->
    <script src="{{ asset('plugins/jquery-knob/jquery.knob.min.js') }}"></script>
    <!-- daterangepicker -->
    <script src="{{ asset('plugins/moment/moment.min.js') }}"></script>
    <script src="{{ asset('plugins/daterangepicker/daterangepicker.js') }}"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="{{ asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
    <!-- Summernote -->
    <script src="{{ asset('plugins/summernote/summernote-bs4.min.js') }}"></script>
    <!-- overlayScrollbars -->
    <script src="{{ asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('dist/js/adminlte.js') }}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{ asset('dist/js/demo.js') }}"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="{{ asset('dist/js/pages/dashboard.js') }}"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('#toggleLogout').on('click', function(event) {
        event.preventDefault();

        var url = "{{ route('logout') }}";
        $.ajax({
            type: "POST",
            url: url,
            success: function(response) {
                window.location.href = "/";
            }
        });
    });
</script>

</html>
