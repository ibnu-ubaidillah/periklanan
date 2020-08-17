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
                        <li class="breadcrumb-item active">Data Pengajuan</li>
                    </ol>
                </div>
            </div>
            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalTambah" style="margin-left: 939px"><i class="fa fa-plus"></i> Tambah Pengajuan</button>

        </div>
        <!-- /.container-fluid -->
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header p-2">
                            <ul class="nav nav-pills">
                                <li class="nav-item"><a class="nav-link active" href="#pending" data-toggle="tab">Pending</a></li>
                                <li class="nav-item"><a class="nav-link" href="#terima" data-toggle="tab">Diterima</a></li>
                                <li class="nav-item"><a class="nav-link" href="#tolak" data-toggle="tab">Ditolak</a></li>
                            </ul>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="active tab-pane" id="pending">
                                    <table class="table table-bordered table-striped table-responsive" id="Table1">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Tanggal</th>
                                                <th>Nama Pengguna</th>
                                                <th>Konten Iklan</th>
                                                <th>Paket</th>
                                                <th>Status</th>
                                                <th>Keterangan</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td class="text-center">
                                                    <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#modalKonten">
                                                        <i class="fa fa-eye"></i>
                                                        Lihat Konten</button>
                                                </td>
                                                <td>
                                                    <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modalPaket">
                                                        <i class="fa fa-eye"></i>
                                                        Lihat Paket</button>
                                                </td>
                                                <td></td>
                                                <td></td>
                                                <td class="text-center">
                                                    <a href="<?= site_url('pengguna/edit/') ?>" class="btn btn-sm btn-success"><i class="fa fa-check"></i> Terima</a>
                                                    <button class="btn btn-sm btn-danger" onclick="return confirm('Yakin akan menghapus data ini?')"><i class="fa fa-times"></i> Tolak</button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.tab-pane -->
                                <div class="tab-pane" id="tolak">
                                    <table class="table table-bordered table-striped table-responsive" id="Table2">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Tanggal</th>
                                                <th>Nama Pengguna</th>
                                                <th>Konten Iklan</th>
                                                <th>Paket</th>
                                                <th>Status</th>
                                                <th>Keterangan</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td class="text-center">
                                                    <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#modalKonten">
                                                        <i class="fa fa-eye"></i>
                                                        Lihat Konten</button>
                                                </td>
                                                <td>
                                                    <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modalPaket">
                                                        <i class="fa fa-eye"></i>
                                                        Lihat Paket</button>
                                                </td>
                                                <td></td>
                                                <td></td>
                                                <td class="text-center">
                                                    <a href="<?= site_url('pengguna/edit/') ?>" class="btn btn-sm btn-success"><i class="fa fa-check"></i> Terima</a>
                                                    <button class="btn btn-sm btn-danger" onclick="return confirm('Yakin akan menghapus data ini?')"><i class="fa fa-times"></i> Tolak</button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.tab-content -->
                                <div class="tab-pane" id="terima">
                                    <table class="table table-bordered table-striped table-responsive" id="Table3">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Tanggal</th>
                                                <th>Nama Pengguna</th>
                                                <th>Konten Iklan</th>
                                                <th>Paket</th>
                                                <th>Status</th>
                                                <th>Keterangan</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td class="text-center">
                                                    <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#modalKonten">
                                                        <i class="fa fa-eye"></i>
                                                        Lihat Konten</button>
                                                </td>
                                                <td>
                                                    <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modalPaket">
                                                        <i class="fa fa-eye"></i>
                                                        Lihat Paket</button>
                                                </td>
                                                <td></td>
                                                <td></td>
                                                <td class="text-center">
                                                    <a href="<?= site_url('pengguna/edit/') ?>" class="btn btn-sm btn-success"><i class="fa fa-check"></i> Terima</a>
                                                    <button class="btn btn-sm btn-danger" onclick="return confirm('Yakin akan menghapus data ini?')"><i class="fa fa-times"></i> Tolak</button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.tab-content -->
                            </div><!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
    </section>