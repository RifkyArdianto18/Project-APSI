<div class="card card-custom">

    <div class="card-header">
        <h3 class="card-title">
            <i class="fas fa-id-card"></i> Pengurusan STNK
        </h3>
    </div>

    <div class="card-body">

        <?php if(empty($penjualan)): ?>
            <div class="alert alert-info">
                Tidak ada data untuk pengurusan STNK.
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
                            <?php if ($p->id_stnk == NULL): ?>
                                <span class="badge badge-secondary">Belum Diproses</span>

                            <?php elseif ($p->status_stnk == 'diproses'): ?>
                                <span class="badge badge-warning">Diproses</span>

                            <?php elseif ($p->status_stnk == 'selesai'): ?>
                                <span class="badge badge-success">Selesai</span>

                            <?php else: ?>
                                <span class="badge badge-dark"><?= $p->status_stnk ?></span>
                            <?php endif; ?>
                        </td>

                        <td>
                            <?php if ($p->id_stnk == NULL): ?>
                                <a href="<?= base_url('stnk/proses/'.$p->id_penjualan) ?>" 
                                   class="btn btn-primary btn-sm">
                                    <i class="fas fa-play"></i> Proses
                                </a>

                            <?php elseif ($p->status_stnk == 'diproses'): ?>
                                <a href="<?= base_url('stnk/selesai/'.$p->id_penjualan) ?>" 
                                   class="btn btn-success btn-sm">
                                    <i class="fas fa-check"></i> Selesai
                                </a>

                            <?php else: ?>
                                <button class="btn btn-secondary btn-sm" disabled>
                                    <i class="fas fa-check-circle"></i> Selesai
                                </button>
                            <?php endif; ?>
                        </td>

                    </tr>
                    <?php endforeach; ?>
                </tbody>

            </table>
        </div>

        <?php endif; ?>

    </div>
</div>