    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Pembayaran</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Home</a></li>
                        <li class="breadcrumb-item"><a href="<?= base_url('pembayaran') ?>">Pembayaran</a></li>
                        <li class="breadcrumb-item active">Invoice</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <?php
        $no = 1;
        foreach ($pembayaran as $data) { ?>
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Invoice</h3>
                    <div class="float-right">
                        <a href="<?= site_url('pembayaran') ?>" class="btn btn-info btn-flat btn-sm"><i class="fa fa-undo"></i> Kembali</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="invoice p-3 mb-3">
                        <!-- title row -->
                        <div class="row">
                            <div class="col-12">
                                <h4>
                                    <img src="<?= base_url('assets/dist/img/logo-acrb.png') ?>" width="20%">
                                    <small class="float-right">Tanggal: <?= date('d-m-Y') ?></small>
                                </h4>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- info row -->
                        <div class="row invoice-info">
                            <div class="col-sm-4 invoice-col">
                                Dari
                                <address>
                                    <strong><?= $data->nama ?></strong><br>
                                    <?= $data->alamat ?><br>
                                    Telepon: <?= $data->no_telp ?><br>
                                    Email: <?= $data->email ?>
                                </address>
                            </div>
                            <!-- /.col -->
                            <div class="col-sm-4 invoice-col">
                                Untuk
                                <address>
                                    <strong><?= $data->atas_nama ?></strong><br>
                                    <?= $data->nama_bank ?><br>
                                    <?= $data->no_rekening ?>
                                </address>
                            </div>
                            <!-- /.col -->
                            <div class="col-sm-4 invoice-col">
                                <b>Invoice</b> #<?= $invoice ?><br>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->

                        <!-- Table row -->
                        <div class="row">
                            <div class="col-12 table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Paket</th>
                                            <th>Tipe Paket</th>
                                            <th>Jumlah Tayang</th>
                                            <th>Harga</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $data->nama_paket ?></td>
                                            <td><?= $data->tipe_paket ?></td>
                                            <td><?= $data->jumlah_tayang ?></td>
                                            <td>Rp. <?= number_format($data->harga, 1, ",", ".") ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->

                        <div class="row">
                            <!-- accepted payments column -->
                            <!-- /.col -->
                            <div class="col-6 offset-6">
                                <div class="table-responsive">
                                    <table class="table">
                                        <tr>
                                            <th width="67%">Total:</th>
                                            <td>Rp. <?= number_format($data->harga, 1, ",", ".") ?></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->

                        <!-- this row will not appear when printing -->
                        <div class="row no-print">
                            <div class="col-12">
                                <form action="" method="POST" class="form-horizontal" enctype="multipart/form-data">
                                    <div class="form-group row">
                                        <input type="hidden" name="id_pembayaran" value="<?= $data->id_pembayaran ?>">
                                        <input type="hidden" name="invoice" value="<?= $invoice ?>">
                                        <div class="col-6 float-right">
                                            <label for="inputName">Upload Bukti Pembayaran</label>
                                            <input type="file" name="bukti_pembayaran" id="inputName" class="form-control">
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary float-right"><i class="far fa-credit-card"></i> Konfirmasi Pembayaran
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        <?php } ?>
    </section>