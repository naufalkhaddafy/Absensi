<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title')</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="{{ asset('template') }}/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('template') }}/bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{ asset('template') }}/bower_components/Ionicons/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('template') }}/dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="{{ asset('template') }}/dist/css/skins/_all-skins.min.css">
    <link rel="stylesheet" href="{{ asset('DataTables') }}/datatables.min.css" />


    <!-- Google Font -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition skin-blue sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">

        <header class="main-header">
            <!-- Logo -->
            <a href="{{ url('/dashboard') }}" class="logo">

                <span class="logo-mini"><img src="{{ asset('foto/') }}/Loggo.png" alt="a"></span>

                <span class="logo-lg"><b><img src="{{ asset('foto/') }}/Loggo.png" alt="a"></b>Sijalu</span>
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top">
                <!-- Sidebar toggle button-->
                <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>

                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <img src="{{ url('foto1/' . Auth::user()->foto) }}" class="user-image"
                                    alt="User Image">
                                <span class="hidden-xs">{{ Auth::user()->name }}</span>
                                <span class="glyphicon glyphicon-menu-down"></span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="user-header">
                                    <img src="{{ url('foto1/' . Auth::user()->foto) }}" class="img-circle"
                                        alt="User Image">

                                    <p>
                                        {{ Auth::user()->name }} - {{ Auth::user()->divisi }}
                                        <small>{{ Auth::user()->email }}</small>
                                    </p>
                                </li>
                                <!-- Menu Body -->

                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <div class="pull-left">
                                        <a href="{{ url('/profile') }}" class="btn btn-default btn-flat"><span
                                                class="glyphicon glyphicon-user"> Profile</a>
                                    </div>
                                    <div class="pull-right">
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                            @csrf
                                            <button type="submit" class="btn btn-light">
                                                <span class="glyphicon glyphicon-log-out"></span> Logout
                                            </button>
                                        </form>

                                    </div>

                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>

        <!-- =============================================== -->

        <!-- Left side column. contains the sidebar -->
        <aside class="main-sidebar">
            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">

                <div class="user-panel">

                    <div class="pull-left image">
                        <img src="{{ url('foto1/' . Auth::user()->foto) }}" class="img-circle" alt="User Image">
                    </div>
                    <div class="pull-left info">
                        <p>{{ Auth::user()->name }}</p>
                        <a><i class="fa fa-circle text-success"></i></a>
                        @if (auth()->user()->level == 'admin')
                            Admin
                        @elseif(auth()->user()->level == 'user')
                            Online
                        @endif
                    </div>
                    <br></br>
                </div>

                <form action="#" method="get" class="sidebar-form">
                    <div class="input-group">
                        <input type="text" name="q" class="form-control" placeholder="Search...">
                        <span class="input-group-btn">
                            <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i
                                    class="fa fa-search"></i>
                            </button>
                        </span>
                    </div>
                </form>

                <!-- /.search form -->
                <!-- sidebar menu: : style can be found in sidebar.less -->
                @include('a_layout.a_navbar')
            </section>


        </aside>

        <!-- =============================================== -->

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    @yield('title')
                </h1>

            </section>

            <!-- Main content -->
            <section class="content">

                @yield('content')
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <footer class="main-footer">
            <div class="pull-right hidden-xs">

            </div>
            <strong>Made with <span class="fa fa-fw fa-heart"></span> <a> by IT UMM 2018</a>.</strong> in 2021
        </footer>



        <div class="control-sidebar-bg"></div>
    </div>
    <!-- ./wrapper -->

    <script src="{{ asset('template') }}/bower_components/jquery/dist/jquery.min.js"></script>
    <script src="{{ asset('template') }}/bower_components/jquery-ui/jquery-ui.min.js"></script>
    <script src="{{ asset('template') }}/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="{{ asset('template') }}/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
    <script src="{{ asset('template') }}/bower_components/fastclick/lib/fastclick.js"></script>
    <script src="{{ asset('template') }}/dist/js/adminlte.min.js"></script>
    <script src="{{ asset('template') }}/dist/js/demo.js"></script>
    <script src="{{ asset('DataTables') }}/datatables.min.js"></script>


    <script>
        $(document).ready(function() {
            $('.sidebar-menu').tree()
        });

    </script>
    <script>
        $(document).ready(function() {
            $('#tb').DataTable({
                "scrollX": true

            });
        });

    </script>

    <script type="text/javascript">
        $(function() {
            $("#btnSubmit").click(function() {
                var password = $("#password").val();
                var confirmPassword = $("#password-confirm").val();
                if (password != confirmPassword) {
                    alert("Password Konfirmasi Anda tidak sama");
                    return false;
                }
                return true;
            });
        });

    </script>

</body>

</html>
