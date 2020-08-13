<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Periklanan | AboutCirebonID</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/css/iziToast.css" integrity="sha256-pODNVtK3uOhL8FUNWWvFQK0QoQoV3YA9wGGng6mbZ0E=" crossorigin="anonymous" />
  <!-- Data Tables -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/dist/css/adminlte.min.css">
</head>

<body class="hold-transition sidebar-mini">
  <!-- Site wrapper -->
  <div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">

      <!-- SEARCH FORM -->
      <form class="form-inline ml-3">
        <div class="input-group input-group-sm">
          <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-navbar" type="submit">
              <i class="fas fa-search"></i>
            </button>
          </div>
        </div>
      </form>

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
            <i class="fas fa-th-large"></i>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="<?= base_url('dashboard') ?>" class="brand-link">
        <img src="<?= base_url() ?>assets/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">About Cirebon ID</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="<?= base_url() ?>/assets/dist/img/profile/default.png" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            <a href="<?= base_url('profil') ?>" class="d-block"><?= $this->fungsi->user_login()->nama ?></a>
          </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <li class="nav-item has-treeview">
              <a href="<?= base_url('dashboard') ?>" class="nav-link <?= $this->uri->segment(1) == 'dashboard' || $this->uri->segment(1) == '' ? 'active' : '' ?>">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                  Dashboard
                </p>
              </a>
            </li>
            <?php if ($this->fungsi->user_login()->level == 1 || $this->fungsi->user_login()->level == 3) { ?>
              <li class="nav-item has-treeview">
                <a href="#" class="nav-link <?= $this->uri->segment(1) == 'pengajuan' ? 'active' : '' ?>">
                  <i class="nav-icon fas fa-ad"></i>
                  <p>
                    Kelola Pengajuan Iklan
                  </p>
                </a>
              </li>
              <li class="nav-item has-treeview">
                <a href="#" class="nav-link <?= $this->uri->segment(1) == 'pembayaran' ? 'active' : '' ?>">
                  <i class="nav-icon fas fa-ad"></i>
                  <p>
                    Kelola Pembayaran Iklan
                  </p>
                </a>
                <?php if ($this->fungsi->user_login()->level == 1) { ?>
              <li class="nav-item has-treeview <?= $this->uri->segment(1) == 'paket' || $this->uri->segment(1) == 'paket_detail' ? 'menu-open' : '' ?>">
                <a href="#" class="nav-link">
                  <i class="nav-icon fa fa-stream"></i>
                  <p>
                    Kelola Paket
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="<?= base_url('paket') ?>" class="nav-link <?= $this->uri->segment(1) == 'paket' ? 'active' : '' ?>">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Paket Utama</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="<?= base_url('paket_detail') ?>" class="nav-link <?= $this->uri->segment(1) == 'paket_detail' ? 'active' : '' ?>">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Paket Detail</p>
                    </a>
                  </li>
                <?php } ?>
                </ul>
                <?php if ($this->fungsi->user_login()->level == 1) { ?>
              <li class="nav-item has-treeview">
                <a href="<?= base_url('pengguna') ?>" class="nav-link <?= $this->uri->segment(1) == 'pengguna' ? 'active' : '' ?>">
                  <i class="nav-icon fas fa-users"></i>
                  <p>
                    Kelola Pengguna
                  </p>
                </a>
              </li>
              <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                  <i class="nav-icon fa fa-calendar-alt"></i>
                  <p>
                    Kelola Jadwal Iklan
                  </p>
                </a>
              </li>
            <?php } ?>
          <?php } ?>
          <?php if ($this->fungsi->user_login()->level == 2) { ?>
            <li class="nav-item has-treeview <?= $this->uri->segment(2) == 'laporan_pengguna' || $this->uri->segment(2) == 'laporan_iklan' || $this->uri->segment(2) == 'laporan_pembayaran' ? 'menu-open' : '' ?>">
              <a href="#" class="nav-link">
                <i class="nav-icon fa fa-clipboard-list"></i>
                <p>
                  Laporan
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="" class="nav-link <?= $this->uri->segment(2) == 'laporan_iklan' ? 'active' : '' ?>">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Laporan Iklan</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?= base_url('laporan/laporan_pengguna') ?>" class="nav-link <?= $this->uri->segment(2) == 'laporan_pengguna' ? 'active' : '' ?>">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Laporan Pengguna</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="../index.html" class="nav-link <?= $this->uri->segment(2) == 'laporan_pembayaran' ? 'active' : '' ?>">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Laporan Pembayaran</p>
                  </a>
                </li>
              </ul>
            <?php } ?>
            <hr>
            <li class="nav-item has-treeview">
              <a href="<?= site_url('auth/logout') ?>" class="nav-link">
                <i class="nav-icon fa fa-sign-out-alt"></i>
                Logout
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
      <?= $contents ?>
    </div>
    <!-- /.content-wrapper -->

    <footer class="main-footer">
      <div class="float-right d-none d-sm-block">
        <b>Version</b> 3.1.0-pre
      </div>
      <strong>Copyright &copy; 2020 <a href="http://aboutcirebon.id" target="_blank">AboutCirebon</a>.</strong> built with <i class="fa fa-heart" style="color: red"></i>
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
  <script src="<?= base_url() ?>assets/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="<?= base_url() ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- Data Tables -->
  <script src="<?= base_url() ?>assets/plugins/datatables/jquery.dataTables.min.js"></script>

  <script src="<?= base_url() ?>assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
  <script src="<?= base_url() ?>assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
  <script src="<?= base_url() ?>assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
  <!-- AdminLTE App -->
  <script src="<?= base_url() ?>assets/dist/js/adminlte.min.js"></script>

  <script src="<?= base_url() ?>assets/plugins/sweetalert2/sweetalert2.all.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/js/iziToast.js" integrity="sha256-siqh9650JHbYFKyZeTEAhq+3jvkFCG8Iz+MHdr9eKrw=" crossorigin="anonymous"></script>

  <script src="<?= base_url() ?>assets/dist/js/myscript.js"></script>
  <!-- Page Script -->
  <script>
    $(function() {
      $("#Table1").DataTable({
        "responsive": true,
        "autoWidth": false,
      });
    });
  </script>
</body>

</html>