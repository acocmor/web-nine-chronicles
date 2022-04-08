<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pandora Nine BTC</title>
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">
    @yield('css')
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('dist/css/adminlte.min.css')}}">
<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
          <!-- Left navbar links -->
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
              <a href="{{route('index')}}" class="nav-link">Home</a>
            </li>
          </ul>
        </nav>
        <!-- /.navbar -->
      
        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
          <!-- Brand Logo -->
          <a href="{{route('index')}}" class="brand-link">
            <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
            <span class="brand-text font-weight-light">Pandora Manager</span>
          </a>
      
          <!-- Sidebar -->
          <div class="sidebar">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
              <div class="image">
                <img src="https://www.google.com.vn/url?sa=i&url=https%3A%2F%2Fvfo.vn%2Fr%2Fadmin-la-gi-administrator-website-dien-dan-facebook.49321%2F&psig=AOvVaw3BJ8Ccm_9w_uTJLtWRyc7L&ust=1645850641582000&source=images&cd=vfe&ved=0CAsQjRxqFwoTCLCF6cqFmvYCFQAAAAAdAAAAABAP" class="img-circle elevation-2" alt="User Image">
              </div>
              <div class="info">
                <a href="#" class="d-block">Administrator</a>
              </div>
            </div>
            
            <!-- Sidebar Menu -->
            <nav class="mt-2">
              <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="{{route('index')}}" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Danh sách
                            <span class="right badge badge-success">List</span>
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                  <a href="{{route('add')}}" class="nav-link">
                    <i class="nav-icon fas fa-plus"></i>
                    <p>
                      Thêm mới Địa chỉ
                      <span class="right badge badge-danger">New</span>
                    </p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{route('guild.index')}}" class="nav-link">
                    <i class="nav-icon fas fa-plus"></i>
                    <p>
                      Danh sach Guild
                      <span class="right badge badge-danger">New</span>
                    </p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{route('server')}}" class="nav-link">
                    <i class="nav-icon fas fa-plus"></i>
                    <p>
                      Server Settings
                      <span class="right badge badge-danger">New</span>
                    </p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{route('password')}}" class="nav-link">
                    <i class="nav-icon fas fa-change"></i>
                    <p>
                      Đổi Mật Khẩu
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
            @yield('content')
        </div>
        <!-- /.content-wrapper -->
      
        <!-- Main Footer -->
        <footer class="main-footer">
          <!-- To the right -->
          <div class="float-right d-none d-sm-inline">
            Pandora Manager
          </div>
          <!-- Default to the left -->
          <strong>Copyright &copy; 2022 <a href="{{route('index')}}">Pandora BTC Manager</a>.</strong> All rights reserved.
        </footer>
      </div>
      <!-- ./wrapper -->
      
      <!-- REQUIRED SCRIPTS -->
      
      <!-- jQuery -->
      <script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
      <!-- Bootstrap 4 -->
      <script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

      @yield('js')

      <!-- AdminLTE App -->
      <script src="{{asset('dist/js/adminlte.min.js')}}"></script>
        <!-- Page specific script -->
        <script>
        $(function () {
            $("#example1").DataTable({
            "responsive": true, "lengthChange": false, "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
            });
        });
        </script>
</body>
</html>