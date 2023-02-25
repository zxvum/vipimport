<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin | @yield('title')</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('admin-assets/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="{{ asset('admin-assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ asset('admin-assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- JQVMap -->
    <link rel="stylesheet" href="{{ asset('admin-assets/plugins/jqvmap/jqvmap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('admin-assets/dist/css/adminlte.min.css') }}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset('admin-assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{ asset('admin-assets/plugins/daterangepicker/daterangepicker.css') }}">
    <!-- summernote -->
    <link rel="stylesheet" href="{{ asset('admin-assets/plugins/summernote/summernote-bs4.min.css') }}">
    @livewireStyles
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

    <!-- Preloader -->
    <div class="preloader flex-column justify-content-center align-items-center">
        <img class="animation__shake" src="{{ asset('admin-assets/dist/img/AdminLTELogo.png') }}" alt="AdminLTELogo" height="60" width="60">
    </div>

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
        </ul>

        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
            <!-- Notifications Dropdown Menu -->
            <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#">
                    <i class="far fa-bell"></i>
                    <span class="badge badge-warning navbar-badge">15</span>
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                    <span class="dropdown-item dropdown-header">15 Notifications</span>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item">
                        <i class="fas fa-envelope mr-2"></i> 4 new messages
                        <span class="float-right text-muted text-sm">3 mins</span>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item">
                        <i class="fas fa-users mr-2"></i> 8 friend requests
                        <span class="float-right text-muted text-sm">12 hours</span>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item">
                        <i class="fas fa-file mr-2"></i> 3 new reports
                        <span class="float-right text-muted text-sm">2 days</span>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
                </div>
            </li>
        </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="{{ route('home') }}" class="brand-link">
            <img src="{{ asset('admin-assets/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
            <span class="brand-text font-weight-light">Vip-Import</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img src="{{ asset('admin-assets/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
                </div>
                <div class="info">
                    <a href="#" class="d-block">{{ auth()->user()->name }} {{ auth()->user()->surname }}</a>
                </div>
            </div>

            <!-- SidebarSearch Form -->
            <div class="form-inline">
                <div class="input-group" data-widget="sidebar-search">
                    <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                    <div class="input-group-append">
                        <button class="btn btn-sidebar">
                            <i class="fas fa-search fa-fw"></i>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <li class="nav-item">
                        <a href="{{ route('admin.main-view') }}" class="nav-link {{ request()->is('admin') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-home"></i>
                            <p>
                                Главная
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.main-view') }}" class="nav-link {{ request()->is('admin/settings/') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-cog"></i>
                            <p>
                                Настройки
                            </p>
                        </a>
                    </li>
                    <li class="nav-header">ПОЛЬЗОВАТЕЛИ</li>
                    <li class="nav-item {{ request()->is('admin/user*') ? 'menu-open' : '' }}">
                        <a href="javascript:void(0)" class="nav-link">
                            <i class="nav-icon fas fa-user-alt"></i>
                            <p>
                                Пользователи
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('admin.user.all-users') }}" class="nav-link {{ request()->is('admin/user') ? 'active' : '' }}">
                                    <i class="fas fa-user-alt nav-icon"></i>
                                    <p>Все пользователи</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link {{ request()->is('admin/user/create') ? 'active' : '' }}">
                                    <i class="fas fa-plus-circle nav-icon"></i>
                                    <p>Создать пользователи</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link {{ request()->is('admin/user/black-list') ? 'active' : '' }}">
                                    <i class="fas fa-user-alt-slash nav-icon"></i>
                                    <p>Черный список</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item {{ request()->is('admin/documents*') ? 'menu-open' : '' }}">
                        <a href="javascript:void(0)" class="nav-link">
                            <i class="nav-icon fas fa-user-alt"></i>
                            <p>
                                Документы
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('admin.documents.all') }}" class="nav-link {{ request()->is('admin/documents/') ? 'active' : '' }}">
                                    <i class="fas fa-file nav-icon"></i>
                                    <p>Все документы</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.documents.check.view') }}" class="nav-link {{ request()->is('admin/documents/check*') ? 'active' : '' }}">
                                    <i class="fas fa-check nav-icon"></i>
                                    <p>Проверка документов</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item {{ request()->is('admin/users/') ? 'active' : '' }}">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-credit-card"></i>
                            <p>
                                Счета и платежи
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link {{ request()->is('admin/users/') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-money-bill"></i>
                            <p>
                                Баланс
                            </p>
                        </a>
                    </li>
                    <li class="nav-header">ЗАКАЗЫ</li>
                    <li class="nav-item {{ request()->is('admin/user*') ? 'menu-open' : '' }}">
                        <a href="javascript:void(0)" class="nav-link">
                            <i class="nav-icon fas fa-user-alt"></i>
                            <p>
                                Заказы
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('admin.order.all') }}" class="nav-link">
                                    <i class="fas fa-user-alt nav-icon"></i>
                                    <p>Все заказы</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.order.create') }}" class="nav-link">
                                    <i class="fas fa-user-alt nav-icon"></i>
                                    <p>Новый заказ</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.shop.all') }}" class="nav-link {{ request()->is('admin/shop*') ? 'active' : '' }}">
                            <i class="fas fa-user-alt nav-icon"></i>
                            <p>Магазины</p>
                        </a>
                    </li>
                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-12">
                        <h1 class="m-0">@yield('title')</h1>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                @yield('content')
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
        <strong>Copyright &copy; 2021-2022 <a href="https://vipimport.ru">vipimport.ru</a>.</strong>
        Все права защищены.
        <div class="float-right d-none d-sm-inline-block">
            <b>Версия</b> 1.0.0
        </div>
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{ asset('admin-assets/plugins/jquery/jquery.min.js') }}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('admin-assets/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<script>
    $(document).ready(function(){
        setTimeout(function (){
            $('.alert').fadeOut(300);
        }, 8000)
    })
</script>
<!-- Bootstrap 4 -->
<script src="{{ asset('admin-assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- ChartJS -->
<script src="{{ asset('admin-assets/plugins/chart.js/Chart.min.js') }}"></script>
<!-- Sparkline -->
<script src="{{ asset('admin-assets/plugins/sparklines/sparkline.js') }}"></script>
<!-- JQVMap -->
<script src="{{ asset('admin-assets/plugins/jqvmap/jquery.vmap.min.js') }}"></script>
<script src="{{ asset('admin-assets/plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
<!-- jQuery Knob Chart -->
<script src="{{ asset('admin-assets/plugins/jquery-knob/jquery.knob.min.js') }}"></script>
<!-- daterangepicker -->
<script src="{{ asset('admin-assets/plugins/moment/moment.min.js') }}"></script>
<script src="{{ asset('admin-assets/plugins/daterangepicker/daterangepicker.js') }}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ asset('admin-assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
<!-- Summernote -->
<script src="{{ asset('admin-assets/plugins/summernote/summernote-bs4.min.js') }}"></script>
<!-- overlayScrollbars -->
<script src="{{ asset('admin-assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('admin-assets/dist/js/adminlte.js') }}"></script>
<!-- AdminLTE for demo purposes -->

<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ asset('admin-assets/dist/js/pages/dashboard.js') }}"></script>
<script src="{{ asset('admin-assets/plugins/bs-custom-file-input/bs-custom-file-input.js') }}"></script>

@yield('js')
@livewireScripts
</body>
</html>
