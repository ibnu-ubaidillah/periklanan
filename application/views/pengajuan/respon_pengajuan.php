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
                        <li class="breadcrumb-item active">Respon Pengajuan</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Respon Pengajuan</h3>
                <div class="float-right">
                    <a href="<?= site_url('pengajuan') ?>" class="btn btn-info btn-flat btn-sm"><i class="fa fa-undo"></i> Kembali</a>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6 offset-3">
                        <!-- <?= validation_errors(); ?> -->
                        <form action="" method="POST">
                            <div class="form-group">
                                <label for="respon">Respon</label>
                                <?php foreach ($pengajuan as $data) { ?>
                                    <input type="hidden" name="id_pengajuan" value="<?= $data->id_pengajuan ?>">
                                <?php } ?>
                                <input type="radio" name="status" id="status" value="Diterima" <?= set_value('status') == 'Diterima' ? "checked" : null ?>> Terima
                                <input type="radio" name="status" id="status" value="Ditolak" <?= set_value('status') == 'Ditolak' ? "checked" : null ?>> Tolak
                                <?= form_error('status', '<br /> <small class="text-danger">', '</small>') ?>
                            </div>
                            <div class="form-group">
                                <label for="alasan">Keterangan *</label>
                                <textarea name="alasan" id="alasan" cols="5" rows="5" class="form-control"></textarea>
                                <?= form_error('alasan', ' <small class="text-danger">', '</small>') ?>
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