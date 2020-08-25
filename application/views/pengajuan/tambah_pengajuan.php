    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Pengajuan</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Home</a></li>
                        <li class="breadcrumb-item"><a href="<?= base_url('pengajuan') ?>">Pengajuan</a></li>
                        <li class="breadcrumb-item active">Tambah Pengajuan</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Tambah Data Pengajuan</h3>
                <div class="float-right">
                    <a href="<?= site_url('pengajuan') ?>" class="btn btn-info btn-flat btn-sm"><i class="fa fa-undo"></i> Kembali</a>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6 offset-3">
                        <!-- <?= validation_errors(); ?> -->
                        <form action="" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="kode_pengajuan">Kode Pengajuan</label>
                                <input type="text" name="kode_pengajuan" value="KP<?= sprintf("%04s", $kode_pengajuan) ?>" id="kode_pengajuan" class="form-control" readonly />
                            </div>
                            <div class="form-group">
                                <input type="hidden" name="id_pengguna" value=" <?= $this->fungsi->user_login()->id_pengguna ?>">
                                <label for="nama">Nama Pengguna</label>
                                <input type="text" name="nama" value=" <?= $this->fungsi->user_login()->nama ?>" id="nama" class="form-control" readonly />
                            </div>
                            <div class="form-group">
                                <label for="konten">Konten*</label>
                                <small>(Max 4MB, res. 2048x1000)(.gif|.jpg|.png|.jpeg)</small>
                                <input type="file" name="konten" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="alamat">Caption*</label>
                                <textarea name="caption" id="caption" cols="30" rows="5" class="form-control" autofocus> <?= set_value('caption') ?></textarea>
                                <?= form_error('caption', ' <small class="text-danger">', '</small>') ?>
                            </div>
                            <div class="form-group">
                                <label for="id_detail">Daftar Paket*</label>
                                <div class="row">
                                    <?php
                                    $no = 1;
                                    foreach ($detail as $det) {  ?>
                                        <div class="col-sm-6">
                                            <div class="card card-blue border-primary">
                                                <h6 class="card-header"> <?= $det->nama_paket ?></h6>
                                                <div class="card-body">
                                                    <h5 class="card-title"> Paket <?= $det->tipe_paket ?></h5>
                                                    <p class="card-text">
                                                        <li>
                                                            Penayangan Iklan <?= $det->jumlah_tayang ?>x
                                                        </li>
                                                        <li>
                                                            Harga Total : <?= number_format($det->harga, 0, ".", ".") ?>
                                                        </li>
                                                    </p>
                                                </div>
                                                <div class="card-footer">
                                                    <center>
                                                        <input type="radio" name="id_detail" value="<?= $det->id_detail ?>" id="id_detail" /> Paket <?= $no++ ?>
                                                    </center>
                                                </div>
                                            </div>
                                        </div>
                                    <?php } ?>
                                </div>
                                <?= form_error('id_detail', ' <small class="text-danger">', '</small>') ?>
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