<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Dashboard User</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="/assets-admin/vendors/feather/feather.css">
  <link rel="stylesheet" href="/assets-admin/vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="/assets-admin/vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="/assets-admin/vendors/datatables.net-bs4/dataTables.bootstrap4.css">
  <link rel="stylesheet" href="/assets-admin/vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" type="/assets-admin/text/css" href="/assets-admin/js/select.dataTables.min.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="/assets-admin/css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="/images/favicon.png" />
</head>
<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo mr-5" href="#">Dashboard</a>
        <a class="navbar-brand brand-logo-mini" href="#"><img src="/assets-admin/images/logo-mini.svg" alt="logo"/></a>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
          <span class="icon-menu"></span>
        </button>
        
        <ul class="navbar-nav navbar-nav-right">
          
          <li class="nav-item nav-profile dropdown">
            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
              <img src="/images/favicon.png" alt="profile"/>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
        
              <a class="dropdown-item" href="/user/logout">Logout</a>
            </div>
          </li>
          
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="icon-menu"></span>
        </button>
      </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_settings-panel.html -->
      <div class="theme-setting-wrapper">
        <div id="settings-trigger"><i class="ti-settings"></i></div>
        <div id="theme-settings" class="settings-panel">
          <i class="settings-close ti-close"></i>
          <p class="settings-heading">SIDEBAR SKINS</p>
          <div class="sidebar-bg-options selected" id="sidebar-light-theme"><div class="img-ss rounded-circle bg-light border mr-3"></div>Light</div>
          <div class="sidebar-bg-options" id="sidebar-dark-theme"><div class="img-ss rounded-circle bg-dark border mr-3"></div>Dark</div>
          <p class="settings-heading mt-2">HEADER SKINS</p>
          <div class="color-tiles mx-0 px-4">
            <div class="tiles success"></div>
            <div class="tiles warning"></div>
            <div class="tiles danger"></div>
            <div class="tiles info"></div>
            <div class="tiles dark"></div>
            <div class="tiles default"></div>
          </div>
        </div>
      </div>
      
      <!-- partial -->
      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="/admin/dashboard">
              <i class="icon-grid menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
         
         
          
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#tables" aria-expanded="false" aria-controls="tables">
              <i class="icon-grid-2 menu-icon"></i>
              <span class="menu-title">Tables</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="tables">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="/admin/jadwal-dokter">Tambah Dokter</a></li>
              </ul>
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="/admin/detail-jadwal-dokter">Jadwal Dokter</a></li>
              </ul>
            </div>
          </li>
          
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
              <i class="icon-head menu-icon"></i>
              <span class="menu-title">User Pages</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="auth">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="/admin/datapasien"> Data Pasien </a></li>
                <li class="nav-item"> <a class="nav-link" href="/admin/createpengumuman"> Bikin Pengumuman </a></li>
                <li class="nav-item"> <a class="nav-link" href="/admin/detailspengumuman"> Papan Pengumuman </a></li>
              </ul>
            </div>
          </li>
          
          
        </ul>
      </nav>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Your Profile
                    </h4>
                  
                    <form action="/user/profile/{{$detailprofile->id}}" method="POST">
                        @method('PUT')
                      @csrf
                        <div class="form-group">
                          @if(session()->has('sukses-editprofile'))
                          <h4 style="color: green">Sukses Edit Profile</h4>
                          @endif
                          @if(session()->has('passwordtidaksama'))
                          <h4 style="color: red">Password Dan Confirm Password Harus sama!</h4>
                          @endif
                        <label for="exampleInputName1">Email</label>
                        <input type="text" class="form-control" id="exampleInputName1" value="{{$detailprofile->email}}" name="email" readonly>
                      </div>
                      <div class="form-group">
                        <label for="pw1">Password</label>
                        <input type="password" class="form-control" id="pw2" name="password">
                      </div>
                      <div class="form-group">
                        <label for="pw2">Confirm Password</label>
                        <input type="password" class="form-control" id="pw2" name="confirmpassword">
                      </div>
                     
                      
                      <button type="submit" class="btn btn-primary mr-2">Submit</button>
                      <button class="btn btn-light">Cancel</button>
                    </form>
                  </div>
                </div>
              </div>
          
          <div class="row">
            
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>   
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <!-- plugins:js -->
  <script src="/assets-admin/vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="/assets-admin/vendors/chart.js/Chart.min.js"></script>
  <script src="/assets-admin/vendors/datatables.net/jquery.dataTables.js"></script>
  <script src="/assets-admin/vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
  <script src="/assets-admin/js/dataTables.select.min.js"></script>

  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="/assets-admin/js/off-canvas.js"></script>
  <script src="/assets-admin/js/hoverable-collapse.js"></script>
  <script src="/assets-admin/js/template.js"></script>
  <script src="/assets-admin/js/settings.js"></script>
  <script src="/assets-admin/js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="/assets-admin/js/dashboard.js"></script>
  <script src="/assets-admin/js/Chart.roundedBarCharts.js"></script>
  <!-- End custom js for this page-->
</body>

</html>

