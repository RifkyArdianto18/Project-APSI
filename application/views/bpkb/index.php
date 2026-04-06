<div class="card card-custom">

    <div class="card-header">
        <h3 class="card-title">
            <i class="fas fa-file-alt"></i> Pengurusan BPKB
        </h3>
    </div>

    <div class="card-body">

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
                    <?php $no=1; foreach($bpkb as $b): ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $b->nama_pelanggan ?></td>
                        <td><?= $b->nama_mobil ?></td>

                        <td>
                            <?php if ($b->status == NULL): ?>
                                <span class="badge badge-secondary">Belum Mulai</span>

                            <?php elseif ($b->status == 'diproses'): ?>
                                <span class="badge badge-warning">Diproses</span>

                            <?php elseif ($b->status == 'selesai'): ?>
                                <span class="badge badge-success">Selesai</span>

                            <?php else: ?>
                                <span class="badge badge-dark"><?= $b->status ?></span>
                            <?php endif; ?>
                        </td>

                        <td>

                            <?php if ($b->status == NULL): ?>
                                <a href="<?= base_url('bpkb/proses/'.$b->id_penjualan) ?>" 
                                   class="btn btn-primary btn-sm">
                                    <i class="fas fa-play"></i> Proses
                                </a>

                            <?php elseif ($b->status == 'diproses'): ?>
                                <a href="<?= base_url('bpkb/selesai/'.$b->id_penjualan) ?>" 
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

    </div>
</div>