<div class="card card-custom">

    <div class="card-header d-flex justify-content-between align-items-center">
        <h3 class="card-title">
            <i class="fas fa-users"></i> Data Pelanggan
        </h3>

        <a href="<?= base_url('pelanggan/tambah') ?>" class="btn btn-primary btn-sm">
            <i class="fas fa-user-plus"></i> Tambah Pelanggan
        </a>
    </div>

    <div class="card-body">

        <div class="table-responsive">
            <table class="table table-bordered table-hover">

                <thead>
                    <tr>
                        <th width="5%">No</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>No HP</th>
                        <th width="15%">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    <?php $no=1; foreach($pelanggan as $p): ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $p->nama_pelanggan ?></td>
                        <td><?= $p->alamat ?></td>
                        <td>
                            <i class="fas fa-phone"></i> <?= $p->handphone ?>
                        </td>

                        <td>
                            <a href="<?= base_url('pelanggan/edit/'.$p->id_pelanggan) ?>" 
                               class="btn btn-warning btn-sm">
                                <i class="fas fa-edit"></i>
                            </a>

                            <a href="<?= base_url('pelanggan/delete/'.$p->id_pelanggan) ?>" 
                               class="btn btn-danger btn-sm"
                               onclick="return confirm('Yakin hapus data?')">
                                <i class="fas fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>

            </table>
        </div>

    </div>
</div>