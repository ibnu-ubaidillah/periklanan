    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Paket</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url('dashboard')?>">Home</a></li>
              <li class="breadcrumb-item active">Paket</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Tambah Data Paket</h3>
          <div class="float-right">
            <a href="<?= site_url('paket')?>" class="btn btn-info btn-flat btn-sm"><i class="fa fa-undo"></i> Kembali</a>
          </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6 offset-3">
                    <!-- <?= validation_errors(); ?> -->
                    <form action="" method="POST">
                        <div class="form-group has-error">
                            <label for="nama">Nama Paket *</label>
                            <input type="text" name="nama_paket" value="<?= set_value('nama_paket') ?>" id="nama_paket" class="form-control">
                            <?= form_error('nama-paket') ?>
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
