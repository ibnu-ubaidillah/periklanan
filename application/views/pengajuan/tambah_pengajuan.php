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
                            <div class="form-group has-error">
                                <label for="kode_pengajuan">Kode Pengajuan</label>
                                <input type="text" name="kode_pengajuan" value="KP<?= sprintf("%04s", $kode_pengajuan) ?>" id="kode_pengajuan" class="form-control" readonly />
                            </div>
                            <div class="form-group">
                                <label for="nama">Nama Pengguna *</label>
                                <input type="text" name="nama" value=" <?= $this->fungsi->user_login()->nama ?>" id="nama" class="form-control" readonly />
                            </div>
                            <div class="form-group">
                                <label for="konten">Konten</label>
                                <input type="file" name="konten" id="konten" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="alamat">Caption *</label>
                                <textarea name="caption" id="caption" cols="30" rows="5" class="form-control" autofocus> <?= set_value('caption') ?></textarea>
                                <?= form_error('caption') ?>
                            </div>
                            <div class="form-group">
                                <label for="paket_utama">Daftar Paket</label>
                                <select name="paketutama" id="paket_utama" class="form-control">
                                    <option value=""></option>
                                    <?php foreach ($paket->result() as $row) : ?>
                                        <option value="<?php echo $row->id_paket; ?>"><?php echo $row->nama_paket; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="tipe_paket">Tipe Paket</label>
                                <select name="tipe_paket" class="tipePaket form-control">
                                    <option value=""></option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="jml_tayang">Jumlah Penayangan</label>
                                <select name="jml_tayang" class="jmlTayang form-control">
                                    <option value=""></option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="harga">Harga</label>
                                <input type="number" name="harga" value="<?= set_value('harga') ?>" id="harga" class="form-control" readonly />
                                <?= form_error('no_hp') ?>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-flat"><i class="fa fa-paper-plane"></i> Simpan</button>
                                <button type="reset" class="btn btn-default btn-flat"><i class="fa fa-reset"></i> Reset</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </section>