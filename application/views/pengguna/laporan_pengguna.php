<!DOCTYPE html>
<html>

<head>
    <title><?= $judul ?></title>
    <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/dist/css/adminlte.min.css">
</head>

<body>
    <section class="content">
        <div class="card">
            <div class="card-header">
                <center>
                    <h2>AboutCirebonID</h2>
                    <h4>Laporan Data Pengguna</h4>
                </center>
            </div>
            <div class="card-body">
                <div class="box-body table-responsive">
                    <table class="table table-bordered table-striped border-1">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Nama Lengkap</th>
                                <th>Alamat</th>
                                <th>Jenis Kelamin</th>
                                <th>Telepon</th>
                                <th>Level</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($pengguna->result() as $key => $data) { ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $data->username ?></td>
                                    <td><?= $data->email ?></td>
                                    <td><?= $data->nama ?></td>
                                    <td><?= $data->alamat ?></td>
                                    <td><?= $data->jenis_kelamin ?></td>
                                    <td><?= $data->no_telp ?></td>
                                    <td>
                                        <?php
                                        if ($data->level == 1) {
                                            echo "Admin";
                                        } else if ($data->level == 2) {
                                            echo "Atasan";
                                        } else {
                                            echo "Member";
                                        }

                                        ?>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer">
                <div class="float-right">
                    <b>Version</b> 3.1.0-pre
                </div>
                <strong>Copyright &copy; 2020 <a href="http://aboutcirebon.id" target="_blank">AboutCirebon</a>.</strong> built with <i class="fa fa-heart" style="color: red"></i>
            </div>
        </div>

    </section>

    <script src="<?= base_url() ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url() ?>assets/dist/js/adminlte.min.js"></script>
    <script>
        window.print();
    </script>

</body>

</html>