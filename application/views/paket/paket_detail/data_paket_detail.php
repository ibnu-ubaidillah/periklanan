    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Paket Detail</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Home</a></li>
              <li class="breadcrumb-item active">Paket Detail</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Data Paket Detail</h3>
          <div class="float-right">
            <a href="<?= site_url('paket_detail/tambah') ?>" class="btn btn-primary btn-sm"><i class="fa fa-user-plus"></i> Tambah</a>
          </div>
        </div>
        <div class="card-body">
          <div class="box-body table-responsive">
            <table class="table table-bordered table-striped" id="Table1">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Paket Utama</th>
                  <th>Tipe Paket</th>
                  <th>Jumlah Penayangan</th>
                  <th>Harga</th>
                  <th class="text-center">Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $no = 1;
                foreach ($row as $data) { ?>
                  <tr>
                    <td><?= $no++ ?></td>

                    <td> <?= $data->nama_paket ?></td>

                    <td> <?= $data->tipe_paket ?></td>
                    <td><?= $data->jumlah_tayang ?></td>
                    <td><?= number_format($data->harga, 0, ".", ".") ?></td>
                    <td class="text-center">
                      <form action="<?= site_url('paket_detail/hapus') ?>" method="POST">
                        <a href="<?= site_url('paket_detail/edit/' . $data->id_detail) ?>" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a>
                        <input type="hidden" value="<?= $data->id_detail ?>" name="id_detail">
                        <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin akan menghapus data ini?')"><i class="fa fa-trash"></i></button>
                      </form>
                    </td>
                  </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
        </div>

    </section>