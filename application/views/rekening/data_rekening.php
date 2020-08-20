    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Rekening</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Home</a></li>
                        <li class="breadcrumb-item active">Rekening</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Data Rekening</h3>
                <div class="float-right">
                    <a href="<?= site_url('rekening/tambah') ?>" class="btn btn-primary btn-sm"><i class="fa fa-user-plus"></i> Tambah</a>
                </div>
            </div>
            <div class="card-body">
                <div class="box-body table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama Bank</th>
                                <th>No. Rekening</th>
                                <th>Atas Nama</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($row->result() as $key => $data) { ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $data->nama_bank ?></td>
                                    <td><?= $data->no_rekening ?></td>
                                    <td><?= $data->atas_nama ?></td>
                                    <td class="text-center">
                                        <form action="<?= site_url('rekening/hapus') ?>" method="POST">
                                            <a href="<?= site_url('rekening/edit/' . $data->id_rekening) ?>" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a>
                                            <input type="hidden" value="<?= $data->id_rekening ?>" name="id_rekening">
                                            <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin akan menghapus data ini?')"><i class="fa fa-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>

    </section>