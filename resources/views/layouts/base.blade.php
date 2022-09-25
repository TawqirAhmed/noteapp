<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Greeva - Responsive Bootstrap 4 Admin Dashboard</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="{{asset('assets/images/favicon.ico')}}">

        <!-- jvectormap -->
        <link href="{{asset('assets/libs/jqvmap/jqvmap.min.css')}}" rel="stylesheet" />

        <!-- DataTables -->
        <link href="{{asset('assets/libs/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css"/>
        <link href="{{asset('assets/libs/datatables/responsive.bootstrap4.min.css')}}" rel="stylesheet" type="text/css"/>
        
        <!-- App css -->
        <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('assets/css/app.min.css')}}" rel="stylesheet" type="text/css" />

        <!-- Summernote css -->
        <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">

        @livewireStyles
    </head>

    <body class="left-side-menu-dark enlarged"  data-keep-enlarged="true">

        <!-- Begin page -->
        <div id="wrapper">

            <!-- Topbar Start -->
            <div class="navbar-custom">
                <ul class="list-unstyled topnav-menu float-right mb-0">

                    

                    <li class="dropdown notification-list">
                        <a class="nav-link dropdown-toggle nav-user mr-0 waves-effect waves-light" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                            {{-- <img src="assets/images/users/avatar-4.jpg" alt="user-image" class="rounded-circle"> --}}
                            <span class="pro-user-name ml-1">
                                {{ Auth::user()->name }} <i class="mdi mdi-chevron-down"></i> 
                            </span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                            <!-- item-->
                            <div class="dropdown-item noti-title">
                                <h6 class="m-0">
                                    Welcome !
                                </h6>
                            </div>

                            

                            <!-- item-->
                            <a href="{{ route('profile.show') }}" class="dropdown-item notify-item">
                                <i class="dripicons-gear"></i>
                                <span>Settings</span>
                            </a>

                            

                            <div class="dropdown-divider"></div>

                            <!-- item-->
                            <a href="{{ route('logout') }}"onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="dropdown-item notify-item">
                                <i class="dripicons-power"></i>
                                <span>Logout</span>
                            </a>
                            <form id="logout-form" method="POST" action="{{ route('logout') }}">
                                @csrf
                            </form>
                        </div>
                    </li>

                    {{-- <li class="dropdown notification-list">
                        <a href="javascript:void(0);" class="nav-link right-bar-toggle waves-effect waves-light">
                            <i class="fe-settings noti-icon"></i>
                        </a>
                    </li> --}}

                </ul>

                <ul class="list-unstyled menu-left mb-0">
                    <li class="float-left">
                        <a href="index.html" class="logo">
                            <span class="logo-lg">
                                <img src="assets/images/logo-dark.png" alt="" height="22">
                            </span>
                            <span class="logo-sm">
                                <img src="assets/images/logo-sm.png" alt="" height="24">
                            </span>
                        </a>
                    </li>
                    <li class="float-left">
                        <a class="button-menu-mobile navbar-toggle">
                            <div class="lines">
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>
                        </a>
                    </li>
                    {{-- <li class="app-search d-none d-md-block">
                        <form>
                            <input type="text" placeholder="Search..." class="form-control">
                            <button type="submit" class="sr-only"></button>
                        </form>
                    </li> --}}
                </ul>
            </div>
            <!-- end Topbar -->

            <!-- ========== Left Sidebar Start ========== -->
            <div class="left-side-menu">

                <div class="slimscroll-menu">

                    <!--- Sidemenu -->
                    <div id="sidebar-menu">

                        <ul class="metismenu" id="side-menu">

                            <li class="menu-title">Navigation</li>

                            <li>
                                <a href="{{ route('notes') }}">
                                    <i class="fas fa-user-lock"></i>
                                    <span> Notes </span>
                                </a>
                            </li>

                            {{-- <li>
                                <a href="{{ route('category') }}">
                                    <i class="fas fa-th-list"></i>
                                    <span> Category </span>
                                </a>
                            </li> --}}
                            

                            <li>
                                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <i class="dripicons-power"></i>
                                    <span> Logout </span>
                                </a>
                                <form id="logout-form" method="POST" action="{{ route('logout') }}">
                                    @csrf
                                </form>
                            </li>

                        </ul>

                    </div>
                    <!-- End Sidebar -->

                    <div class="clearfix"></div>

                </div>
                <!-- Sidebar -left -->

            </div>
            <!-- Left Sidebar End -->

            <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->

            <div class="content-page">
                <div class="content">

                    <!-- Start Content-->
                    <div class="container-fluid">
                        
                        <!-- start page title -->
                        {{-- <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Greeva</a></li>
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Layouts</a></li>
                                            <li class="breadcrumb-item active">Dark Leftbar</li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title">Dark Leftbar</h4>
                                </div>
                            </div>
                        </div> --}}     
                        <!-- end page title --> 

                        {{ $slot }}
                        
                    </div> <!-- container -->

                </div> <!-- content -->

                <!-- Footer Start -->
                <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12 text-center">
                                2018 - 2019 &copy; Greeva theme by <a href="">Coderthemes</a> 
                            </div>
                        </div>
                    </div>
                </footer>
                <!-- end Footer -->

            </div>

            <!-- ============================================================== -->
            <!-- End Page content -->
            <!-- ============================================================== -->


        </div>
        <!-- END wrapper -->

       

        <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>

        <!-- Vendor js -->
        <script src="{{ asset('assets/js/vendor.min.js') }}"></script>

        <!-- KNOB JS -->
        <script src="{{ asset('assets/libs/jquery-knob/jquery.knob.min.js') }}"></script>
        <!-- Chart JS -->
        <script src="{{ asset('assets/libs/chart-js/Chart.bundle.min.js') }}"></script>

        <!-- Jvector map -->
        <script src="{{ asset('assets/libs/jqvmap/jquery.vmap.min.js') }}"></script>
        <script src="{{ asset('assets/libs/jqvmap/jquery.vmap.usa.js') }}"></script>
        
        <!-- Datatable js -->
        <script src="{{ asset('assets/libs/datatables/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('assets/libs/datatables/dataTables.bootstrap4.min.js') }}"></script>
        <script src="{{ asset('assets/libs/datatables/dataTables.responsive.min.js') }}"></script>
        <script src="{{ asset('assets/libs/datatables/responsive.bootstrap4.min.js') }}"></script>
        
        <!-- Dashboard Init JS -->
        <script src="{{ asset('assets/js/pages/dashboard.init.js') }}"></script>
        
        <!-- App js -->
        <script src="{{ asset('assets/js/app.min.js') }}"></script>

        <!--Summernote js-->
        <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>

        @stack('scripts')

        @livewireScripts


        <script type="text/javascript">
      window.livewire.on('addDepartment', () => {
          $('#modalcategories').modal('hide');
          $('#modalEditCategory').modal('hide');
          $('#modalvault').modal('hide');
          $('#modalEditInfo').modal('hide');
          $('#modalDeleteComponent').modal('hide');
      });
  </script>

    </body>
</html>