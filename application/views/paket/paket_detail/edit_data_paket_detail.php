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
                <h3 class="card-title">Edit Data Paket Detail</h3>
                <div class="float-right">
                    <a href="<?= site_url('paket_detail') ?>" class="btn btn-info btn-flat btn-sm"><i class="fa fa-undo"></i> Kembali</a>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6 offset-3">
                        <!-- <?= validation_errors(); ?> -->
                        <form action="" method="POST">
                            <div class="form-group">
                                <label for="nama">Nama Paket *</label>
                                <input type="hidden" name="id_detail" value="<?= $row->id_detail ?>">
                                <select name="nama_paket" id="nama" class="form-control">
                                    <option value=""></option>
                                    <?php
                                    $nama = $this->input->post('nama_paket') ? $this->input->post('nama_paket') : $row->id_paket;
                                    foreach ($paket as $data) { ?>
                                        <option value="<?= $data->id_paket ?>" <?= $nama == $data->id_paket ? "selected" : null ?>><?= $data->nama_paket ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="tipe_paket">Tipe Paket *</label>
                                <select name="tipe_paket" id="tipe_paket" class="form-control">
                                    <option value=""></option>
                                    <?php
                                    $tipe = $this->input->post('tipe_paket') ? $this->input->post('tipe_paket') : $row->id_tipepaket;
                                    foreach ($kategori as $data) { ?>
                                        <option value="<?= $data->id_tipepaket ?>" <?= $tipe == $data->id_tipepaket ? "selected" : null ?>><?= $data->tipe_paket ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="tayang">Jumlah Tayang *</label>
                                <input type="number" name="tayang" value="<?= $this->input->post('tayang') ?? $row->jumlah_tayang ?>" id="tayang" class="form-control">
                                <?= form_error('tayang') ?>
                            </div>
                            <div class="form-group">
                                <label for="harga">Harga *</label>
                                <input type="number" name="harga" value="<?= $this->input->post('email') ?? $row->harga ?>" id="harga" class="form-control">
                                <?= form_error('harga') ?>
                            </div>
                            <button type="submit" class="btn btn-primary btn-flat"><i class="fa fa-paper-plane"></i> Simpan</button>
                            <button type="reset" class="btn btn-default btn-flat"><i class="fa fa-reset"></i> Reset</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        </div>

    </section>