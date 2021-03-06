<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Inicio</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js"></script>
    <script src="dist/js/adminlte.js"></script>

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('dist/css/adminlte.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/estilos.css') }}" rel="stylesheet">
    <style>
       

        [class*=sidebar-dark-] .user-panel .dropdown-item {
            margin-top:10px;

            color: #212529;
            background-color:white;
            border-radius: 10px;
        }
        [class*=sidebar-dark-] .user-panel .dropdown-item:hover {
            background-color:red;
        }
        .info{
            text-align: center;
            margin: 0 auto;
        }
        .sidebar {
            background:#283747;
        }
        .btn-secondary {
    color: #fff;
    background-color: #3490dc;
    border-color: #6c757d;
}
.btn-warning {
    border: 1px solid black;
    
}
.btn-danger {
    border: 1px solid black;
}
.card{
    width:600px;
}
    </style>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div id="app">
        <div class="wrapper">

            <!-- Navbar -->
            <nav class="main-header navbar navbar-expand navbar-white navbar-light">
                <!-- Left navbar links -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
                    </li>
                </ul>

                <!-- SEARCH FORM -->
                <form class="form-inline ml-3">
                    <div class="input-group input-group-sm">
                        <input class="form-control form-control-navbar" type="search" name="search" placeholder="Search"
                            aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn btn-navbar" type="submit">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                </form>

                
            </nav>
            <!-- /.navbar -->

            <!-- Main Sidebar Container -->
            <aside class="main-sidebar sidebar-dark-primary elevation-4">
                <!-- Brand Logo -->
                <a href="{{ url('/') }}" class="brand-link">
                    <img src="{{ asset('dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
                        style="opacity: .8">
                    <span class="brand-text font-weight-light">Clinica mental</span>
                </a>

                <!-- Sidebar -->
                <div class="sidebar">
                    <!-- Sidebar user panel (optional) -->
                    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                        
                        <div class="info">
                            <a href="#" class="d-block">
                                @guest
                                <a style="color:green;" class="nav-link" href="{{ route('login') }}">{{ __('Iniciar Sesi??n') }}</a>
                                @else
                                {{ Auth::user()->name }}
                                <a  class=" logaut dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                           document.getElementById('logout-form').submit();">
                                    Cerrar Sesi??n
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    style="display: none;">
                                    @csrf
                                </form>

                                @endguest
                            </a>
                        </div>
                    </div>

                    <!-- Sidebar Menu -->
                    <nav class="mt-2">
                        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                            data-accordion="false">
                            

                           

                            <li class="nav-item">
                                <a href="{{ route('usuarios.index')}}"
                                    class="{{ Request::path() === 'usuarios' ? 'nav-link active' : 'nav-link' }}">
                                    <i class="nav-icon fas fa-hospital-user"></i>
                                    <p>
                                        Doctores
                                        <?php $users_count = DB::table('users')->count(); ?>
                                        <span class="right badge badge-danger">{{ $users_count ?? '0' }}</span>
                                    </p>
                                </a>
                            </li>
                           
                            <li class="nav-item">
                                <a href="{{ route('doctores.index')}}"
                                    class="{{ Request::path() === 'doctores' ? 'nav-link active' : 'nav-link' }}">
                                    <i class="nav-icon fas fa-user"></i>
                                    <p>
                                        Pacientes
                                        <?php $pacientes_count = DB::table('pacientes')->count(); ?>
                                        <span class="right badge badge-danger">{{ $pacientes_count ?? '0' }}</span>
                                    </p>
                                </a>
                            </li>
                           
                            <li class="nav-item">
                                <a href="{{ route('reportes.index')}}"
                                    class="{{ Request::path() === 'reportes' ? 'nav-link active' : 'nav-link' }}">
                                    <i class="nav-icon fas fa-users"></i>
                                    <p>
                                        Todos los Pacientes
                                        <?php $pacientes_count = DB::table('pacientes')->count(); ?>
                                        <span class="right badge badge-danger">{{ $pacientes_count ?? '0' }}</span>
                                    </p>
                                </a>
                            </li>
                            
                            
                            <li class="nav-item">
                                <a href="{{ route('traslados.index')}}"
                                    class="{{ Request::path() === 'traslados' ? 'nav-link active' : 'nav-link' }}">
                                    <i class="nav-icon fas fa-exchange-alt"></i>
                                    <p>
                                        Traslados
                                        <?php $traslados_count = DB::table('traslados')->count(); ?>
                                        <span class="right badge badge-danger">{{ $traslados_count ?? '0' }}</span>
                                    </p>
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

                </div>
                <!-- /.content-header -->

                <!-- Main content -->
                <section class="content">
                    @yield('content')
                </section>
                <!-- /.content -->
            </div>
            <!-- /.content-wrapper -->
            <footer class="main-footer">
                <!-- NO QUITAR -->
                <strong>Clinica mental
                    <div class="float-right d-none d-sm-inline-block">
                        <b>Version</b> 1.0
                    </div>
            </footer>

            <!-- Control Sidebar -->
            <aside class="control-sidebar control-sidebar-dark">
                <!-- Control sidebar content goes here -->
            </aside>
            <!-- /.control-sidebar -->
        </div>
    </div>
</body>

</html>