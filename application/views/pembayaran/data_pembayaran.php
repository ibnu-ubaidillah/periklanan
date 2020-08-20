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
                        <li class="breadcrumb-item active">Data Pembayaran</li>
                    </ol>
                </div>
            </div>
            <?php $id = $this->fungsi->user_login()->id_pengguna; ?>
            <a href="<?= site_url('pembayaran/tambah/' . $id) ?>" class="btn btn-sm btn-primary" style="margin-left: 85.5%"><i class="fa fa-plus"></i> Tambah Pembayaran</a>
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
                                                        <th width="10%">Tanggal</th>
                                                        <th width="17%">Kode Pembayaran</th>
                                                        <th width="25%">Kode Pengajuan</th>
                                                        <th width="25%">Nama Pengajuan</th>
                                                        <th>Status</th>
                                                        <th width="25%">Keterangan</th>
                                                        <th width="10%">Aksi</th>
                                                    <?php } else { ?>
                                                        <th>#</th>
                                                        <th width="11%">Tanggal</th>
                                                        <th width="20%">Kode Pembayaran</th>
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
                                                foreach ($pembayaran as $data) { ?>
                                                    <tr>
                                                        <td><?= $no++; ?></td>
                                                        <td><?= date('d-m-Y', strtotime($data->tanggal)); ?></td>
                                                        <td width="100px"><?= $data->kode_pembayaran ?></td>
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
                                                                <a href="<?= site_url('pembayaran/respon/' . $data->id_pembayaran) ?>" class="btn btn-xs btn-success"><i class="fa fa-reply-all"></i> Respon</a>
                                                                <a href="<?= site_url('pembayaran/detail/' . $data->id_pembayaran) ?>" class="btn btn-xs btn-warning"><i class="fa fa-eye"></i> Detail</a>
                                                            </td>
                                                        <?php } else { ?>
                                                            <td class="text-center">
                                                                <a href="<?= site_url('pembayaran/detail/' . $data->id_pembayaran) ?>" class="btn btn-sm btn-warning"><i class="fa fa-eye"></i> Detail</a>
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
                                                    <?php if ($this->fungsi->user_login()->level == 3) { ?>
                                                        <th>#</th>
                                                        <th width="10%">Tanggal</th>
                                                        <th width="17%">Kode Pembayaran</th>
                                                        <th width="25%">Kode Pengajuan</th>
                                                        <th width="25%">Nama Pengajuan</th>
                                                        <th>Status</th>
                                                        <th width="25%">Keterangan</th>
                                                        <th width="10%">Aksi</th>
                                                    <?php } else { ?>
                                                        <th>#</th>
                                                        <th width="11%">Tanggal</th>
                                                        <th width="20%">Kode Pembayaran</th>
                                                        <th width="20%">Kode Pengajuan</th>
                                                        <th width="18%">Nama Pengguna</th>
                                                        <th width="10%">Status</th>
                                                        <th width="22%">Keterangan</th>
                                                        <th width="10%">Diterima</th>
                                                    <?php } ?>
                                                    <?php if ($this->fungsi->user_login()->level == 1) { ?>
                                                        <th width="20%">Aksi</th>
                                                    <?php } ?>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $no = 1;
                                                foreach ($pembayaran_terima as $data) { ?>
                                                    <tr>
                                                        <td><?= $no++; ?></td>
                                                        <td><?= date('d-m-Y', strtotime($data->tanggal)); ?></td>
                                                        <td width="100px"><?= $data->kode_pembayaran ?></td>
                                                        <td width="100px"><?= $data->kode_pengajuan ?></td>
                                                        <td><?= $data->nama ?></td>
                                                        <td class="text-center">
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
                                                        <td><?= date('d-m-Y', strtotime($data->update_pada)) ?></td>
                                                        <td class="text-center">
                                                            <a href="<?= site_url('pengajuan/detail/' . $data->id_pengajuan) ?>" class="btn btn-xs btn-warning"><i class="fa fa-eye"></i> Detail</a>
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
                                                    <?php if ($this->fungsi->user_login()->level == 3) { ?>
                                                        <th>#</th>
                                                        <th width="10%">Tanggal</th>
                                                        <th width="17%">Kode Pembayaran</th>
                                                        <th width="25%">Kode Pengajuan</th>
                                                        <th width="25%">Nama Pengajuan</th>
                                                        <th>Status</th>
                                                        <th width="25%">Keterangan</th>
                                                        <th width="10%">Aksi</th>
                                                    <?php } else { ?>
                                                        <th>#</th>
                                                        <th width="11%">Tanggal</th>
                                                        <th width="20%">Kode Pembayaran</th>
                                                        <th width="20%">Kode Pengajuan</th>
                                                        <th width="18%">Nama Pengguna</th>
                                                        <th width="10%">Status</th>
                                                        <th width="22%">Keterangan</th>
                                                        <th width="10%">Ditolak</th>
                                                    <?php } ?>
                                                    <?php if ($this->fungsi->user_login()->level == 1) { ?>
                                                        <th width="20%">Aksi</th>
                                                    <?php } ?>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $no = 1;
                                                foreach ($pembayaran_tolak as $data) { ?>
                                                    <tr>
                                                        <td><?= $no++; ?></td>
                                                        <td><?= date('d-m-Y', strtotime($data->tanggal)); ?></td>
                                                        <td width="100px"><?= $data->kode_pembayaran ?></td>
                                                        <td width="100px"><?= $data->kode_pengajuan ?></td>
                                                        <td><?= $data->nama ?></td>
                                                        <td class="text-center">
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
                                                        <td><?= date('d-m-Y', strtotime($data->update_pada)) ?></td>
                                                        <?php if ($this->fungsi->user_login()->level == 1) { ?>
                                                            <td class="text-center">
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