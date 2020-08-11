    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Dashboard</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Selamat Datang, <strong><?= $this->fungsi->user_login()->nama ?>!</strong></h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fas fa-times"></i></button>
          </div>
        </div>
        <div class="row">
          <?php if ($this->fungsi->user_login()->level == 2) { ?>
            <div class="col-lg-3 col-6 pt-3 pl-3  ">
              <!-- small box -->
              <div class="small-box bg-info">
                <div class="inner">
                  <h3><?= $total_pengguna ?></h3>
                  <p>Total Pengguna</p>
                </div>
                <div class="icon">
                  <i class="fa fa-users"></i>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-6 pt-3">
              <!-- small box -->
              <div class="small-box bg-danger">
                <div class="inner">
                  <h3>44</h3>
                  <p>Total Pengajuan</p>
                </div>
                <div class="icon">
                  <i class="fa fa-user-plus"></i>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-6 pt-3">
              <!-- small box -->
              <div class="small-box bg-warning">
                <div class="inner">
                  <h3>44</h3>
                  <p>Total Pembayaran</p>
                </div>
                <div class="icon">
                  <i class="fa fa-money-check-alt"></i>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-6 pt-3 pr-3">
              <!-- small box -->
              <div class="small-box bg-success">
                <div class="inner">
                  <h3><?= $total_paket ?></h3>
                  <p>Total Paket</p>
                </div>
                <div class="icon">
                  <i class="fa fa-stream"></i>
                </div>
              </div>
            </div>
        </div>
      <?php } else { ?>
        <div class="card-body">
          Ini merupakan aplikasi untuk periklanan dari About Cirebon.
        </div>
        <!-- /.card-body -->
      </div>
    <?php } ?>
    <!-- /.card -->

    </section>
    <!-- /.content -->