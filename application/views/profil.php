<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Profil Pengguna</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Beranda</a></li>
          <li class="breadcrumb-item active">Profil Pengguna</li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-3">

        <!-- Profile Image -->
        <div class="card card-primary card-outline">
          <div class="card-body box-profile">
            <div class="text-center">
              <img class="profile-user-img img-fluid img-circle" src="<?= base_url() ?>/assets/dist/img/profile/default.png" alt="Foto pengguna">
            </div>

            <h3 class="profile-username text-center"><?= $this->fungsi->user_login()->nama ?></h3>

            <p class="text-muted text-center"><?= $this->fungsi->user_login()->username ?></p>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->

        <!-- About Me Box -->
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Info Lainnya</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <strong><i class="fas fa-book mr-1"></i> Status</strong>

            <p class="text-muted">
              <?php
              if ($this->fungsi->user_login()->level == 1) {
                echo "Admin";
              } else if ($this->fungsi->user_login()->level == 2) {
                echo "Atasan";
              } else {
                echo "Member";
              }

              ?>
            </p>

            <hr>

            <strong><i class="fas fa-calendar-alt mr-1"></i> Tanggal Dibuat</strong>

            <p class="text-muted"><?= date('d-m-Y', strtotime($this->fungsi->user_login()->tanggal_dibuat)) ?></p>

            <hr>

            <strong><i class="fas fa-pencil-alt mr-1"></i> Terakhir Diubah</strong>

            <p class="text-muted">
              <?= date('d-m-Y', strtotime($this->fungsi->user_login()->terakhir_diubah)) ?>
            </p>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
      <!-- /.col -->
      <div class="col-md-9">
        <div class="card">
          <div class="card-header p-2">
            <ul class="nav nav-pills">
              <li class="nav-item"><a class="nav-link active" href="#akun" data-toggle="tab">Akun saya</a></li>
            </ul>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <div class="tab-content">
              <div class="active tab-pane" id="akun">
                <form class="form-horizontal">
                  <div class="form-group row">
                    <label for="inputName" class="col-sm-2 col-form-label">Nama Lengkap</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" value="<?= $this->fungsi->user_login()->nama ?>" disabled>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                      <input type="email" class="form-control" value="<?= $this->fungsi->user_login()->email ?>" disabled>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputName2" class="col-sm-2 col-form-label">No. Telepon</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" value="<?= $this->fungsi->user_login()->no_telp ?>" disabled>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputExperience" class="col-sm-2 col-form-label">Alamat</label>
                    <div class="col-sm-10">
                      <textarea class="form-control" cols="30" rows="5" disabled><?= $this->fungsi->user_login()->alamat ?></textarea>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputSkills" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" value="<?= $this->fungsi->user_login()->jenis_kelamin ?>" disabled>
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="offset-sm-2 col-sm-10">
                      <a class="btn btn-danger float-right" href="<?= site_url('auth/logout') ?>">Keluar</a>
                    </div>
                  </div>
                </form>
              </div>

              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div><!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </div><!-- /.container-fluid -->
</section>
<!-- /.content -->
</div>