    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Jadwal</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Home</a></li>
                        <li class="breadcrumb-item active">Jadwal</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Tambah Jadwal</h3>
                <div class="float-right">
                    <a href="<?= site_url('jadwal') ?>" class="btn btn-info btn-flat btn-sm"><i class="fa fa-undo"></i> Kembali</a>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6 offset-3">
                        <!-- <?= validation_errors(); ?> -->
                        <form action="" method="POST">
                            <div class="form-group">
                                <label for="nama">Kode Pembayaran *</label>
                                <select name="id_pembayaran" id="nama" class="form-control">
                                    <option value=""> - pilih kode - </option>
                                    <?php foreach ($pembayaran as $data) { ?>
                                        <option value="<?= $data->id_pembayaran ?>" <?= set_value('id_pembayaran') == $data->id_pembayaran ? "selected" : null ?>><?= $data->kode_pembayaran ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="tgl">Tanggal</label>
                                <input type="date" name="tanggal_tayang" id="tgl" class="form-control" value="<?= set_value('tanggal_tayang') ?>">
                            </div>
                            <div class="form-group">
                                <label for="jam">Jam</label>
                                <input type="time" name="jam" id="jam" value="<?= set_value('jam') ?>" class="form-control">
                                <?= form_error('jam', ' <small class="text-danger">', '</small>') ?>
                            </div>
                            <div class="form-group">
                                <label for="ket">Keterangan* </label>
                                <textarea name="keterangan" cols="5" rows="5" class="form-control"><?= set_value('keterangan') ?></textarea>
                                <?= form_error('keterangan') ?>
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