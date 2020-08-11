    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Pengguna</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Home</a></li>
              <li class="breadcrumb-item active">Pengguna</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Data Pengguna</h3>
          <div class="float-right">
            <a href="<?= site_url('pengguna/tambah') ?>" class="btn btn-primary btn-sm"><i class="fa fa-user-plus"></i> Tambah</a>
          </div>
        </div>
        <div class="card-body">
          <div class="box-body table-responsive">
            <table class="table table-bordered table-striped" id="Table1">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Username</th>
                  <th>Email</th>
                  <th>Nama Lengkap</th>
                  <th>Alamat</th>
                  <th>JK</th>
                  <th>Telepon</th>
                  <th>Level</th>
                  <th class="text-center">Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $no = 1;
                foreach ($row->result() as $key => $data) { ?>
                  <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $data->username ?></td>
                    <td><?= $data->email ?></td>
                    <td><?= $data->nama ?></td>
                    <td><?= $data->alamat ?></td>
                    <td><?= $data->jenis_kelamin ?></td>
                    <td><?= $data->no_telp ?></td>
                    <td>
                      <?php
                      if ($data->level == 1) {
                        echo "Admin";
                      } else if ($data->level == 2) {
                        echo "Atasan";
                      } else {
                        echo "Member";
                      }

                      ?>
                    </td>
                    <td class="text-center">
                      <form action="<?= site_url('pengguna/hapus') ?>" method="POST">
                        <a href="<?= site_url('pengguna/edit/' . $data->id_pengguna) ?>" class="btn btn-sm btn-success"><i class="fa fa-edit"></i></a>
                        <input type="hidden" value="<?= $data->id_pengguna ?>" name="id_pengguna">
                        <button class="btn btn-sm btn-danger" onclick="return confirm('Yakin akan menghapus data ini?')"><i class="fa fa-trash"></i></button>
                      </form>
                    </td>
                  </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
        </div>

    </section>