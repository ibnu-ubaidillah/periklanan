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
                        <li class="breadcrumb-item"><a href="<?= base_url('pengajuan') ?>">Pembayaran</a></li>
                        <li class="breadcrumb-item active">Detail Pembayaran</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Detail Pembayaran</h3>
                <div class="float-right">
                    <a href="<?= site_url('pembayaran') ?>" class="btn btn-info btn-flat btn-sm"><i class="fa fa-undo"></i> Kembali</a>
                </div>
            </div>
            <div class="card-body">
                <form class="form-horizontal">
                    <?php foreach ($pembayaran as $data) { ?>
                        <div class="form-group row">
                            <label for="invoice" class="col-sm-2 col-form-label">Invoice</label>
                            <div class="col-sm-6">
                                <input type="text" name="kode_pengajuan" value="<?= $data->invoice ?>" class="form-control" readonly />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="kode_pembayaran" class="col-sm-2 col-form-label">Kode Pembayaran</label>
                            <div class="col-sm-6">
                                <input type="text" name="kode_pengajuan" value="<?= $data->kode_pembayaran ?>" class="form-control" readonly />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="kode_pembayaran" class="col-sm-2 col-form-label">Kode Pengajuan</label>
                            <div class="col-sm-6">
                                <input type="text" name="kode_pengajuan" value="<?= $data->kode_pengajuan ?>" class="form-control" readonly />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="nama" class="col-sm-2 col-form-label">Nama Pengguna</label>
                            <div class="col-sm-6">
                                <input type="text" name="kode_pengajuan" value="<?= $data->nama ?>" class="form-control" readonly />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="kode_pengajuan" class="col-sm-2 col-form-label">Bukti Pembayaran</label>
                            <div class="col-sm-3">
                                <img src="<?= base_url('uploads/bukti_pembayaran/') . $data->bukti_pembayaran ?>" alt="konten" width="260px" height="200px">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="kode_pengajuan" class="col-sm-2 col-form-label">Rekening</label>
                            <div class="col-sm-6">
                                <div class="card card-success border-primary">
                                    <h6 class="card-header"> Data Rekening</h6>
                                    <div class="card-body">
                                        <h5 class="card-title"> Bank <?= $data->nama_bank ?></h5>
                                        <p class="card-text">
                                            <li>
                                                No. Rekening: <strong> <?= $data->no_rekening ?></strong>
                                            </li>
                                            <li>
                                                Atas Nama: <strong> <?= $data->atas_nama ?></strong>
                                            </li>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="tanggal" class="col-sm-2 col-form-label">Paket</label>
                            <div class="col-sm-6">
                                <div class="card card-blue border-primary">
                                    <h6 class="card-header"> <?= $data->nama_paket ?></h6>
                                    <div class="card-body">
                                        <h5 class="card-title"> Paket <?= $data->tipe_paket ?></h5>
                                        <p class="card-text">
                                            <li>
                                                Penayangan Iklan <?= $data->jumlah_tayang ?>x
                                            </li>
                                            <li>
                                                Harga Total : <?= number_format($data->harga, 0, ".", ".") ?>
                                            </li>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="tanggal" class="col-sm-2 col-form-label">Tanggal Pembayaran</label>
                            <div class="col-sm-6">
                                <input type="text" name="kode_pengajuan" value="<?= date('d-m-Y', strtotime($data->tanggal)) ?>" class="form-control" readonly />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="status" class="col-sm-2 col-form-label">Status</label>
                            <div class="col-sm-6">
                                <input type="text" name="kode_pengajuan" value="<?= $data->status_p ?>" class="form-control" readonly />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="keterangan" class="col-sm-2 col-form-label">Lunas Pada</label>
                            <div class="col-sm-6">
                                <input type="text" name="kode_pengajuan" value="<?= date('d-m-Y', strtotime($data->tgl_terakhir)) ?>" class="form-control" readonly />
                            </div>
                        </div>
                    <?php } ?>
            </div>
        </div>
        </div>
        </div>
        </div>

    </section>