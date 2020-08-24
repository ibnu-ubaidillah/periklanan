<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $title ?></title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/dist/css/adminlte.min.css">
</head>

<body class="hold-transition register-page">
    <div class="register-box">
        <div class="register-logo">
            <a href="<?= base_url() ?>">aboutcirebon<b>ID</b></a>
        </div>

        <div class="card">
            <div class="card-body register-card-body">
                <p class="login-box-msg">Daftar Akun Baru</p>

                <form action="<?= base_url('auth/daftar') ?>" method="POST">
                    <div class="input-group">
                        <input type="text" name="nama" value="<?= set_value('nama') ?>" class="form-control" placeholder="Nama lengkap">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                    <?= form_error('nama', ' <small class="text-danger">', '</small>') ?>
                    <div class="input-group mt-3">
                        <input type="text" name="username" value="<?= set_value('username') ?>" class="form-control" placeholder="Username">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                    <?= form_error('username', ' <small class="text-danger">', '</small>') ?>
                    <div class="input-group mt-3">
                        <input type="email" name="email" value="<?= set_value('email') ?>" class="form-control" placeholder="Email">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <?= form_error('email', ' <small class="text-danger">', '</small>') ?>
                    <div class="input-group mt-3">
                        <input type="password" value="<?= set_value('password') ?>" name="password" class="form-control" placeholder="Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <?= form_error('password', ' <small class="text-danger">', '</small>') ?>
                    <div class="input-group mt-3">
                        <textarea name="alamat" class="form-control" id="alamat" cols="3" rows="3" placeholder="Alamat"><?= set_value('alamat') ?></textarea>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-map-marker"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mt-3">
                        <input type="number" name="no_hp" value="<?= set_value('no_hp') ?>" class="form-control" placeholder="Telepon">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-phone"></span>
                            </div>
                        </div>
                    </div>
                    <?= form_error('no_hp', ' <small class="text-danger">', '</small>') ?>
                    <div class="input-group mt-3 mb-3">
                        <select name="jk" id="jk" class="form-control">
                            <option value="">-- Jenis Kelamin --</option>
                            <option value="Laki-laki" <?= set_value('jk') == "Laki-laki" ? "selected" : null ?>>Laki-laki</option>
                            <option value="Perempuan" <?= set_value('jk') == "Perempuan" ? "selected" : null ?>>Perempuan</option>
                        </select>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-venus-mars"></span>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-8">

                        </div>
                        <!-- /.col -->
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block">Daftar</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>
                <a href="<?= base_url('auth/login') ?>" class="text-center">Sudah punya akun</a>
            </div>
            <!-- /.form-box -->
        </div><!-- /.card -->
    </div>
    <!-- /.register-box -->

    <!-- jQuery -->
    <script src="<?= base_url() ?>assets/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?= base_url() ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?= base_url() ?>assets/dist/js/adminlte.min.js"></script>
</body>

</html>