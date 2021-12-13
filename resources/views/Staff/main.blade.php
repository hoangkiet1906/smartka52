<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Staff</title>
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="{{ asset('Admin/plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="{{ asset('Admin/dist/css/adminlte.min.css') }}">
    <link rel="stylesheet" href="{{ asset('Admin/footer.css') }}">
    <link rel="stylesheet" type="{{ asset('Admin/text/css') }}"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css"
        integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i
                            class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="{{route('Sthome')}}" class="nav-link">Home</a>
                </li>
                
            </ul>
            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Navbar Search -->
                <li class="nav-item">
                    <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                        <i class="fas fa-search"></i>
                    </a>
                    <div class="navbar-search-block">
                        <form class="form-inline">
                            <div class="input-group input-group-sm">
                                <input class="form-control form-control-navbar" type="search" placeholder="Search"
                                    aria-label="Search">
                                <div class="input-group-append">
                                    <button class="btn btn-navbar" type="submit">
                                        <i class="fas fa-search"></i>
                                    </button>
                                    <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </li>

                {{-- <!-- Messages Dropdown Menu -->
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="far fa-comments"></i>
                        <span class="badge badge-danger navbar-badge">{{count(Session::get('support'))}}</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        @foreach (Session::get('support') as $item)

                        <a href="#" class="dropdown-item">
                            <!-- Message Start -->
                            <div class="media">
                                <img src="{{ asset('User')}}/assets/images/avatar/{{Session::get('img')[$item->user_name][0]->avatar}}" alt="User Avatar"
                                    class="img-size-50 mr-3 img-circle">
                                <div class="media-body">
                                    <h3 class="dropdown-item-title">
                                        {{$item->user_name}}
                                        <span class="float-right text-sm text-danger"><i
                                                class="fas fa-star"></i></span>
                                    </h3>
                                    <p class="text-sm">{{$item->mess}}</p>
                                    <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i>{{$item->date}}</p>
                                </div>
                            </div>
                            <!-- Message End -->
                        </a>
                        <div class="dropdown-divider"></div>
                            
                        @endforeach
                        
                        <a href="#" class="dropdown-item dropdown-footer">View all messages</a>
                    </div>
                </li> --}}
                

            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="{{route('login')}}" class="brand-link"
                style="display: flex; flex-direction: column; justify-content: center; align-items: center;">
                <img src="{{ asset('Admin/dist/img/team.png') }}" style="width: 100px; ">
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex"
                    style="display: flex; flex-direction: column; justify-content: center; align-items: center;">

                    <img src="{{ asset("Admin/dist/img/$st->avatar") }}" style="width: 50px; border-radius: 50%;">


                    <a href="#" style="margin-top: 5px; margin-bottom: -10px;">{{$st->fullname}}<i
                            style="color: #00A7FB; font-size: 13px; position: absolute; top: 61px; left: 160px;"
                            class="far fa-star"></i></a>

                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
                   with font-awesome or any other icon font library -->
                        
                        

                        <li class="nav-item">
                            @if ($page == 'work')
                            <a href="{{route('Sthome')}}" class="nav-link active">
                            @else
                            <a href="{{route('Sthome')}}" class="nav-link">
                            @endif
                                <i class="nav-icon far fa-paper-plane"></i>
                                <p>
                                    Current Job
                                </p>
                            </a>

                        </li>
                        <li class="nav-item">
                            @if ($page == 'done')
                            <a href="{{route('Stdone')}}" class="nav-link active">
                            @else
                            <a href="{{route('Stdone')}}" class="nav-link">
                            @endif
                                <i class="nav-icon fas fa-check"></i>
                                <p>
                                    Work Done
                                </p>
                            </a>

                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>



        @yield('content')



        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->

        <!-- Main Footer -->
        <!-- <footer class="main-footer">
    
  </footer> -->
        <footer class="footer">
            <div class="container">
                <div class="row">

                    <div class="footer-col">

                        <h4>STeam</h4>
                        <ul>
                            <li><a href="#">About us</a></li>
                            <li><a href="#">Service</a></li>
                            <li><a href="#">Security</a></li>
                            <li><a href="#">Link</a></li>
                        </ul>
                    </div>
                    <div class="footer-col">
                        <h4>Sponsor</h4>
                        <ul>
                            <li><a href="#"><img style="width: 50px" src="{{ asset('Admin/footer/vku.png') }}"></a>
                            </li>
                            <li><a href="#"><img style="width: 50px" src="{{ asset('Admin/footer/fpt.png') }}"></a>
                            </li>
                            <li><a href="#"><img style="width: 50px" src="{{ asset('Admin/footer/apple.png') }}"></a>
                            </li>
                            <li><a href="#"><img style="width: 50px" src="{{ asset('Admin/footer/nasa.png') }}"></a>
                            </li>
                        </ul>
                    </div>
                    <div class="footer-col">
                        <h4>Product</h4>
                        <ul>
                            <li><a href="#">Camera</a></li>
                            <li><a href="#">Lights</a></li>
                            <li><a href="#">Air Conditioning</a></li>
                            <li><a href="#">Fridge</a></li>
                        </ul>
                    </div>
                    <div class="footer-col">
                        <h4>Follow</h4>
                        <div class="social-links">
                            <a href="#"><i style="color:  #0067EE" class="fab fa-facebook-f"></i></a>
                            <a href="#"><i style="color:  #009523" class="fab fa-twitter"></i></a>
                            <a href="#"><i style="color:  #FF0000" class="fab fa-instagram"></i></a>
                            <a href="#"><i style="color:  #D87205" class="fab fa-youtube"></i></a>
                        </div>

                        <img src="{{ asset('Admin/team.png') }}" style="width: 100px; margin-top: 20px">

                    </div>
                </div>
            </div>
        </footer><!-- End Footer -->
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <script src="{{ asset('Admin/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap -->
    <script src="{{ asset('Admin/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- overlayScrollbars -->
    <script src="{{ asset('Admin/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('Admin/dist/js/adminlte.js') }}"></script>

    <!-- PAGE PLUGINS -->
    <!-- jQuery Mapael -->
    <script src="{{ asset('Admin/plugins/jquery-mousewheel/jquery.mousewheel.js') }}"></script>
    <script src="{{ asset('Admin/plugins/raphael/raphael.min.js') }}"></script>
    <script src="{{ asset('Admin/plugins/jquery-mapael/jquery.mapael.min.js') }}"></script>
    <script src="{{ asset('Admin/plugins/jquery-mapael/maps/usa_states.min.js') }}"></script>
    <!-- ChartJS -->
    <script src="{{ asset('Admin/plugins/chart.js/Chart.min.js') }}"></script>

    <!-- AdminLTE for demo purposes -->
    <script src="{{ asset('Admin/dist/js/demo.js') }}"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="{{ asset('Admin/dist/js/pages/dashboard2.js') }}"></script>
    <script src="{{ asset('Admin/dist/js/pages/dashboard3.js') }}"></script>

    
</body>

</html>
