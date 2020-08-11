    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Laporan</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Home</a></li>
                        <li class="breadcrumb-item active">Laporan Pengguna</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Laporan Data Pengguna</h3>
            </div>
            <div class="card-body">
                <div class="box-body table-responsive">
                    <table class="table table-bordered table-striped" id="laporanPengguna">
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

    </section>