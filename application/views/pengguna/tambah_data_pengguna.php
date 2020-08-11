    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Pengguna</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url('dashboard')?>">Home</a></li>
              <li class="breadcrumb-item active">Pengguna</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Tambah Data Pengguna</h3>
          <div class="float-right">
            <a href="<?= site_url('pengguna')?>" class="btn btn-info btn-flat btn-sm"><i class="fa fa-undo"></i> Kembali</a>
          </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6 offset-3">
                    <!-- <?= validation_errors(); ?> -->
                    <form action="" method="POST">
                        <div class="form-group has-error">
                            <label for="nama">Nama Lengkap *</label>
                            <input type="text" name="nama" value="<?= set_value('nama') ?>" id="nama" class="form-control">
                            <?= form_error('nama') ?>
                        </div>
                        <div class="form-group">
                            <label for="username">Username *</label>
                            <input type="text" name="username" value="<?= set_value('username') ?>" id="username" class="form-control">
                            <?= form_error('username') ?>
                        </div>
                        <div class="form-group">
                            <label for="password">Password *</label>
                            <input type="password" name="password" value="<?= set_value('password') ?>" id="password" class="form-control">
                            <?= form_error('password') ?>
                        </div>
                        <div class="form-group">
                            <label for="email">Email *</label>
                            <input type="email" name="email" value="<?= set_value('email') ?>" id="email" class="form-control">
                            <?= form_error('email') ?>
                        </div>
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <textarea name="alamat" id="alamat" cols="30" rows="5" class="form-control"> <?= set_value('alamat') ?></textarea>
                            <?= form_error('alamat') ?>
                        </div>
                        <div class="form-group">
                            <label>Jenis Kelamin</label>
                            <br />
                            <input type="radio" name="jk" id="jk" value="Laki-laki" <?= set_value('jk') == 'Laki-laki' ? "checked" : null ?>> Laki-laki
                            <input type="radio" name="jk" id="jk" value="Perempuan" <?= set_value('jk') == 'Perempuan' ? "checked" : null ?>> Perempuan
                        </div>
                        <div class="form-group">
                            <label for="no_hp">Nomor HP *</label>
                            <input type="number" name="no_hp" value="<?= set_value('no_hp') ?>" id="no_hp" class="form-control">
                            <?= form_error('no_hp') ?>
                        </div>
                        <div class="form-group">
                            <label for="level">Level *</label>
                            <select name="level" id="level" class="form-control">
                                <option value="">-- Pilih --</option>
                                <option value="1" <?= set_value('level') == 1 ? "selected" : null ?>>Admin</option>
                                <option value="2" <?= set_value('level') == 2 ? "selected" : null ?>>Member</option>
                                <option value="3" <?= set_value('level') == 3 ? "selected" : null ?>>Atasan</option>
                            </select>
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
