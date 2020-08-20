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
                        <li class="breadcrumb-item active">Laporan Pembayaran</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="card">
            <div class="card-header">
                <div class="float-right">
                    <a href="<?= site_url('laporan/print_pembayaran') ?>" class="btn btn-info btn-sm"><i class="fa fa-print"></i> Print Data</a>
                </div>
                <h3 class="card-title">Laporan Data Pembayaran</h3>
            </div>
            <div class="card-body">
                <div class="box-body table-responsive">
                    <table class="table table-bordered table-striped" id="Table1">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Tanggal</th>
                                <th>Kode Pembayaran</th>
                                <th>Invoice</th>
                                <th>Kode Pengajuan</th>
                                <th>Nama Pengguna</th>
                                <th>Status</th>
                                <th>Lunas Pada</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($pembayaran as $data) { ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= date('d-m-Y', strtotime($data->tanggal)) ?></td>
                                    <td><?= $data->kode_pembayaran ?></td>
                                    <td><?= $data->invoice ?></td>
                                    <td><?= $data->kode_pengajuan ?></td>
                                    <td><?= $data->nama ?></td>
                                    <td><?= $data->status_p ?></td>
                                    <td><?= date('d-m-Y', strtotime($data->tgl_terakhir)) ?></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>

    </section>