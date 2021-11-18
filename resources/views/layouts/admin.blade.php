<!DOCTYPE html>
<html>
<head>
  <title>@yield('title')</title>
    @include('component.head')
</head>
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
        <a href="{{ url('admin') }}" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
      <a href="{{url('admin/verified')}}" class="nav-link">Laporan Terverifikasi</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{url('admin/response')}}" class="nav-link">Pengaduan Tuntas</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" >
        {{ session()->get('identify') }}
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">Profile</span>
          <div class="dropdown-divider"></div>
          <a href="{{ url('admin/logout') }}" onclick="return hapus('Logout akan mengakhiri session anda')" class="dropdown-item">Logout</a>
        </div>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="../../index3.html" class="brand-link">
      <img src="{{ asset('vendor/dist/img/AdminLTELogo.png') }}"
           alt="AdminLTE Logo"
           class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          
          <li class="nav-item">
            <a href="{{ url('admin') }}" class="nav-link {{ Request::is('admin', 'admin/detail*') ? 'active' : '' }}">
              <i class="nav-icon fas fa-inbox"></i>
              <p>
                Laporan Pengaduan
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ url('admin/verified') }}" class="nav-link {{ Request::is('admin/verified', 'admin/balasan*') ? 'active' : '' }}">
              <i class="nav-icon fas fa-lock"></i>
              <p>
                Pengaduan Terverifikasi
              </p>
            </a>
          </li>

          <li class="nav-item">
          <a href="{{ url('admin/response') }}" class="nav-link {{ Request::is('admin/response') ? 'active' : '' }}">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Catatan Pengaduan
              </p>
            </a>
          </li>

          <li class="nav-item">
          <a href="{{ url('admin/petugas') }}" class="nav-link {{ Request::is('admin/petugas*') ? 'active' : '' }}">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Petugas
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
    
    @yield('content-header')

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
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.0.5
    </div>
    <strong>Copyright &copy; 2014-2019 <a href="http://adminlte.io">AdminLTE.io</a>.</strong> All rights
    reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

@include('component.script')
</body>
</html>
