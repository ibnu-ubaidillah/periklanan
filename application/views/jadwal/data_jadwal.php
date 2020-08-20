    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Jadwal</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Home</a></li>
                        <li class="breadcrumb-item active">Jadwal</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Data Jadwal</h3>
                <?php if ($this->fungsi->user_login()->level == 1) { ?>
                    <div class="float-right">
                        <a href="<?= site_url('jadwal/tambah') ?>" class="btn btn-primary btn-sm"><i class="fa fa-user-plus"></i> Tambah</a>
                    </div>
                <?php } ?>
            </div>
            <div class="card-body">
                <div class="box-body table-responsive">
                    <table class="table table-bordered table-striped" id="Table3">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Tanggal</th>
                                <th>Kode Pembayaran</th>
                                <th>Nama Pengiklan</th>
                                <th>Jam</th>
                                <th>Keterangan</th>
                                <?php if ($this->fungsi->user_login()->level == 1) { ?>
                                    <th class="text-center">Aksi</th>
                                <?php } ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($row as $data) { ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= date('d-m-Y', strtotime($data->tanggal_tayang)) ?></td>
                                    <td><?= $data->kode_pembayaran ?></td>
                                    <td><?= $data->nama ?></td>
                                    <td><?= $data->jam ?></td>
                                    <td><?= $data->keterangan ?></td>
                                    <?php if ($this->fungsi->user_login()->level == 1) { ?>
                                        <td class="text-center">
                                            <form action="<?= site_url('jadwal/hapus') ?>" method="POST">
                                                <a href="<?= site_url('jadwal/edit/' . $data->id_jadwal) ?>" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a>
                                                <input type="hidden" value="<?= $data->id_jadwal ?>" name="id_jadwal">
                                                <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin akan menghapus data ini?')"><i class="fa fa-trash"></i></button>
                                            </form>
                                        </td>
                                    <?php } ?>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>

    </section>