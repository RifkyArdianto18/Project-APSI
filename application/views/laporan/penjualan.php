<div class="card card-custom">

    <div class="card-header">
        <h3 class="card-title">
            <i class="fas fa-chart-line"></i> Laporan Penjualan
        </h3>
    </div>

    <div class="card-body">

        <div class="table-responsive">
            <table class="table table-bordered table-hover table-striped">

                <thead>
                    <tr>
                        <th width="5%">No</th>
                        <th>Pelanggan</th>
                        <th>Mobil</th>
                        <th>Total</th>
                        <th>Tanggal Lunas</th>
                        <th width="20%">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    <?php $no=1; foreach($data as $p): ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $p->nama_pelanggan ?></td>
                        <td><?= $p->nama_mobil ?></td>

                        <td>
                            <b class="text-success">
                                Rp <?= number_format($p->total_harga, 0, ',', '.') ?>
                            </b>
                        </td>

                        <td>
                            <?= $p->tanggal_lunas 
                                ? date('d-m-Y', strtotime($p->tanggal_lunas)) 
                                : '-' ?>
                        </td>

                        <td>
                            <?php if (!empty($p->id_pembayaran)): ?>

                                <a href="<?= base_url('laporan/kwitansi/'.$p->id_pembayaran) ?>" 
                                   class="btn btn-info btn-sm" target="_blank">
                                    <i class="fas fa-print"></i>
                                </a>

                                <a href="<?= base_url('laporan/kwitansi_pdf/'.$p->id_pembayaran) ?>" 
                                   class="btn btn-danger btn-sm" target="_blank">
                                    <i class="fas fa-file-pdf"></i>
                                </a>

                            <?php else: ?>
                                <span class="badge badge-secondary">
                                    Belum bayar
                                </span>
                            <?php endif; ?>
                        </td>

                    </tr>
                    <?php endforeach; ?>
                </tbody>

            </table>
        </div>

    </div>
</div>