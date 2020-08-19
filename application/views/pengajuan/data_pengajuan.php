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
            <a href="<?= site_url('pengajuan/tambah') ?>" class="btn btn-sm btn-primary" style="margin-left: 86.4%"><i class="fa fa-plus"></i> Tambah Pengajuan</a>
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
                                    <div class="col-md">
                                        <table class="table table-bordered table-striped table-responsive" id="Table1">
                                            <thead>
                                                <tr>
                                                    <?php if ($this->fungsi->user_login()->level == 3) { ?>
                                                        <th>#</th>
                                                        <th width="15%">Tanggal</th>
                                                        <th width="130px">Kode Pengajuan</th>
                                                        <th width="130px">Pengguna</th>
                                                        <th>Status</th>
                                                        <th width="190px">Keterangan</th>
                                                        <th width="190px">Aksi</th>
                                                    <?php } else { ?>
                                                        <th>#</th>
                                                        <th width="11%">Tanggal</th>
                                                        <th width="20%">Kode Pengajuan</th>
                                                        <th width="18%">Nama Pengguna</th>
                                                        <th width="10%">Status</th>
                                                        <th width="22%">Keterangan</th>
                                                    <?php } ?>
                                                    <?php if ($this->fungsi->user_login()->level == 1) { ?>
                                                        <th width="20%">Aksi</th>
                                                    <?php } ?>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $no = 1;
                                                foreach ($pengajuan as $data) { ?>
                                                    <tr>
                                                        <td><?= $no++; ?></td>
                                                        <td><?= date('d-m-Y', strtotime($data->tanggal)); ?></td>
                                                        <td width="100px"><?= $data->kode_pengajuan ?></td>
                                                        <td><?= $data->nama ?></td>
                                                        <td>
                                                            <?php
                                                            if ($data->status == "Pending") {
                                                                echo "<span class='badge badge-primary'>Pending</span>";
                                                            } else if ($data->status == "Diterima") {
                                                                echo "<span class='badge badge-success'>Diterima</span>";
                                                            } else {
                                                                echo "<span class='badge badge-danger'>Ditolak</span>";
                                                            }
                                                            ?>
                                                        </td>
                                                        <td><?= $data->keterangan ?></td>
                                                        <?php if ($this->fungsi->user_login()->level == 1) { ?>
                                                            <td class="text-center">
                                                                <button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#modalRespon">
                                                                    <i class="fa fa-reply-all"></i> Respon
                                                                </button>
                                                                <a href="<?= site_url('pengajuan/detail/' . $data->id_pengajuan) ?>" class="btn btn-xs btn-warning"><i class="fa fa-eye"></i> Detail</a>
                                                            </td>
                                                        <?php } else { ?>
                                                            <td class="text-center">
                                                                <a href="<?= site_url('pengajuan/detail/' . $data->id_pengajuan) ?>" class="btn btn-sm btn-warning"><i class="fa fa-eye"></i> Detail</a>
                                                            </td>
                                                        <?php } ?>
                                                    </tr>
                                            </tbody>
                                        <?php
                                                }
                                        ?>
                                        </table>
                                    </div>
                                </div>
                                <!-- /.tab-pane -->
                                <div class="tab-pane" id="terima">
                                    <div class="col-lg-12">
                                        <table class="table table-bordered table-striped table-responsive" id="Table2">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Tanggal</th>
                                                    <th>Kode Pengajuan</th>
                                                    <th>Pengguna</th>
                                                    <th>Konten</th>
                                                    <th>Paket</th>
                                                    <th>Status</th>
                                                    <th>Keterangan</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $no = 1;
                                                foreach ($pengajuan_terima as $data) { ?>
                                                    <tr>
                                                        <td><?= $no++; ?></td>
                                                        <td><?= date('d F Y', strtotime($data->tanggal)) ?></td>
                                                        <td><?= $data->kode_pengajuan ?></td>
                                                        <td><?= $data->nama ?></td>
                                                        <td>
                                                            <a href="<?= site_url('pengguna/edit/') ?>" class="btn btn-sm btn-info"><i class="fa fa-eye"></i> Lihat</a>
                                                        </td>
                                                        <td>
                                                            <a href="<?= site_url('pengguna/edit/') ?>" class="btn btn-sm btn-warning"><i class="fa fa-eye"></i> Lihat</a>
                                                        </td>
                                                        <td>
                                                            <?php
                                                            if ($data->status == "Pending") {
                                                                echo "<span class='badge badge-primary'>Pending</span>";
                                                            } else if ($data->status == "Diterima") {
                                                                echo "<span class='badge badge-success'>Diterima</span>";
                                                            } else {
                                                                echo "<span class='badge badge-danger'>Ditolak</span>";
                                                            }
                                                            ?>
                                                        </td>
                                                        <td><?= $data->keterangan ?></td>
                                                        <td class="text-center">
                                                            <a href="<?= site_url('pengguna/edit/') ?>" class="btn btn-sm btn-success"><i class="fa fa-check"></i> Terima</a>
                                                            <button class="btn btn-sm btn-danger" onclick="return confirm('Yakin akan menghapus data ini?')"><i class="fa fa-times"></i> Tolak</button>
                                                        </td>
                                                    </tr>
                                            </tbody>
                                        <?php
                                                }
                                        ?>
                                        </tbody>
                                        </table>
                                    </div>
                                </div>
                                <!-- /.tab-content -->
                                <div class="tab-pane" id="tolak">
                                    <div class="col-lg-12">
                                        <table class="table table-bordered table-striped table-responsive" id="Table3">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Tanggal</th>
                                                    <th>Kode Pengajuan</th>
                                                    <th>Pengguna</th>
                                                    <th>Konten</th>
                                                    <th>Paket</th>
                                                    <th>Status</th>
                                                    <th>Keterangan</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $no = 1;
                                                foreach ($pengajuan_tolak as $data) { ?>
                                                    <tr>
                                                        <td><?= $no++; ?></td>
                                                        <td><?= date('d F Y', strtotime($data->tanggal)) ?></td>
                                                        <td><?= $data->kode_pengajuan ?></td>
                                                        <td><?= $data->nama ?></td>
                                                        <td>
                                                            <a href="<?= site_url('pengguna/edit/') ?>" class="btn btn-sm btn-info"><i class="fa fa-eye"></i> Lihat</a>
                                                        </td>
                                                        <td>
                                                            <a href="<?= site_url('pengguna/edit/') ?>" class="btn btn-sm btn-warning"><i class="fa fa-eye"></i> Lihat</a>
                                                        </td>
                                                        <td>
                                                            <?php
                                                            if ($data->status == "Pending") {
                                                                echo "<span class='badge badge-primary'>Pending</span>";
                                                            } else if ($data->status == "Diterima") {
                                                                echo "<span class='badge badge-success'>Diterima</span>";
                                                            } else {
                                                                echo "<span class='badge badge-danger'>Ditolak</span>";
                                                            }
                                                            ?>
                                                        </td>
                                                        <td><?= $data->keterangan ?></td>
                                                        <td class="text-center">
                                                            <a href="<?= site_url('pengguna/edit/') ?>" class="btn btn-sm btn-success"><i class="fa fa-check"></i> Terima</a>
                                                            <button class="btn btn-sm btn-danger" onclick="return confirm('Yakin akan menghapus data ini?')"><i class="fa fa-times"></i> Tolak</button>
                                                        </td>
                                                    </tr>
                                            </tbody>
                                        <?php
                                                }
                                        ?>
                                        </tbody>
                                        </table>
                                    </div>
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