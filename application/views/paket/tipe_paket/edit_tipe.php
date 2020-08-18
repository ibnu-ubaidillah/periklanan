    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Kategori Paket</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Home</a></li>
                        <li class="breadcrumb-item active">Kategori Paket</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Edit Kategori Paket</h3>
                <div class="float-right">
                    <a href="<?= site_url('tipe_paket') ?>" class="btn btn-info btn-flat btn-sm"><i class="fa fa-undo"></i> Kembali</a>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6 offset-3">
                        <!-- <?= validation_errors(); ?> -->
                        <form action="" method="POST">
                            <div class="form-group has-error">
                                <label for="kategori">Nama Kategori</label>
                                <input type="hidden" name="id_tipepaket" value="<?= $row->id_tipepaket ?>">
                                <input type="text" name="kategori" value="<?= $this->input->post('kategori') ?? $row->tipe_paket ?>" class="form-control">
                                <?= form_error('kategori') ?>
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