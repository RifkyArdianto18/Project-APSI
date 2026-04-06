<div class="card card-custom">

    <div class="card-header">
        <h3 class="card-title">
            <i class="fas fa-truck"></i> Serah Terima Kendaraan
        </h3>
    </div>

    <div class="card-body">

        <?php if(empty($penjualan)): ?>
            <div class="alert alert-info">
                Tidak ada data yang siap diserahterimakan.
            </div>
        <?php else: ?>

        <div class="table-responsive">
            <table class="table table-bordered table-hover">

                <thead>
                    <tr>
                        <th width="5%">No</th>
                        <th>Pelanggan</th>
                        <th>Mobil</th>
                        <th>Status</th>
                        <th width="20%">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    <?php $no=1; foreach($penjualan as $p): ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $p->nama_pelanggan ?></td>
                        <td><?= $p->nama_mobil ?></td>

                        <td>
                            <span class="badge badge-info">Siap Diserahkan</span>
                        </td>

                        <td>
                            <a href="<?= base_url('serah_terima/proses/'.$p->id_penjualan) ?>" 
                               class="btn btn-success btn-sm">
                                <i class="fas fa-handshake"></i> Proses
                            </a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>

            </table>
        </div>

        <?php endif; ?>

    </div>
</div>