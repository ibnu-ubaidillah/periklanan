    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Pembayaran</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Home</a></li>
                        <li class="breadcrumb-item"><a href="<?= base_url('pembayaran') ?>">Pembayaran</a></li>
                        <li class="breadcrumb-item active">Tambah Pembayaran</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Tambah Data Pembayaran</h3>
                <div class="float-right">
                    <a href="<?= site_url('pembayaran') ?>" class="btn btn-info btn-flat btn-sm"><i class="fa fa-undo"></i> Kembali</a>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6 offset-3">
                        <!-- <?= validation_errors(); ?> -->
                        <form action="" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="kode_pengajuan">Kode Pembayaran</label>
                                <input type="text" name="kode_pembayaran" value="BYR<?= sprintf("%04s", $kode_pembayaran) ?>" id="kode_pembayaran" class="form-control" readonly />
                            </div>
                            <div class="form-group">
                                <input type="hidden" name="id_pengguna" value=" <?= $this->fungsi->user_login()->id_pengguna ?>">
                                <label for="nama">Nama Pengguna</label>
                                <input type="text" name="nama" value=" <?= $this->fungsi->user_login()->nama ?>" id="nama" class="form-control" readonly />
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-flat"><i class="fa fa-paper-plane"></i> Simpan</button>
                                <button type="reset" class="btn btn-default btn-flat"><i class="fa fa-reset"></i> Reset</button>
                            </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        </div>

    </section>