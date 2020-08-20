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
                                <input type="text" name="kode_pembayaran" value="KB<?= sprintf("%04s", $kode_pembayaran) ?>" id="kode_pembayaran" class="form-control" readonly />
                            </div>
                            <div class="form-group">
                                <input type="hidden" name="id_pengguna" value=" <?= $this->fungsi->user_login()->id_pengguna ?>">
                                <label for="nama">Nama Pengguna</label>
                                <input type="text" name="nama" value=" <?= $this->fungsi->user_login()->nama ?>" id="nama" class="form-control" readonly />
                            </div>
                            <div class="form-group">
                                <label for="id_pengajuan">Kode Pengajuan</label>
                                <select name="id_pengajuan" class="form-control">
                                    <option value=""> - Kode Pengajuan Anda - </option>
                                    <?php foreach ($pengajuan as $data) { ?>
                                        <option value="<?= $data->id_pengajuan ?>"><?= $data->kode_pengajuan ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="id_detail">Daftar Rekening*</label>
                                <div class="row">
                                    <?php
                                    $no = 1;
                                    foreach ($rekening as $det) {  ?>
                                        <div class="col-sm-6">
                                            <div class="card card-blue border-primary">
                                                <h6 class="card-header"> Rekening <?= $no++ ?></h6>
                                                <div class="card-body">
                                                    <h5 class="card-title"> Bank <?= $det->nama_bank ?></h5>
                                                    <br />
                                                    <br />
                                                    <p class="card-text">
                                                        No. Rekening: <br /><strong><?= $det->no_rekening ?></strong>
                                                        <br />
                                                        Atas Nama: <br /><strong><?= $det->atas_nama ?></strong>
                                                    </p>
                                                </div>
                                                <div class="card-footer">
                                                    <center>
                                                        <input type="radio" name="id_rekening" value="<?= $det->id_rekening ?>" id="id_rekening" /> Pilih
                                                    </center>
                                                </div>
                                            </div>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-flat"><i class="fa fa-paper-plane"></i> Lanjutkan</button>
                                <button type="reset" class="btn btn-default btn-flat"><i class="fa fa-reset"></i> Reset</button>
                            </div>
                            <strong>Note* </strong><small>Pengajuan harus diterima terlebih dahulu jika ingin melakukan pembayaran.</small>
                    </div>
                    </form>
                </div>

            </div>
        </div>
        </div>

    </section>