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
                    <img src="<?= base_url('assets/dist/img/logo-acrb.png') ?>">
                    <h4>Laporan Data Pengajuan</h4>
                </center>
            </div>
            <div class="card-body">
                <div class="box-body table-responsive">
                    <table class="table table-bordered table-striped border-1">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Tanggal</th>
                                <th>Kode Pengajuan</th>
                                <th>Nama Pengguna</th>
                                <th>Status</th>
                                <th width="25%">Keterangan</th>
                                <th>Terakhir Diupdate</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($pengajuan as $data) { ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= date('d-m-Y', strtotime($data->tanggal)) ?></td>
                                    <td><?= $data->kode_pengajuan ?></td>
                                    <td><?= $data->nama ?></td>
                                    <td><?= $data->status ?></td>
                                    <td><?= $data->keterangan ?></td>
                                    <td><?= date('d-m-Y', strtotime($data->update_pada)) ?></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer">
                <strong>Copyright &copy; 2020 <a href="http://aboutcirebon.id" target="_blank">AboutCirebon</a>.
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