<h1>Laporan Penjualan</h1>

<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>No</th>
            <th>Pelanggan</th>
            <th>Mobil</th>
            <th>Total</th>
            <th>Tanggal Lunas</th>
            <th>Aksi</th>
        </tr>
    </thead>

    <tbody>
        <?php $no=1; foreach($data as $p): ?>
        <tr>
            <td><?= $no++ ?></td>
            <td><?= $p->nama_pelanggan ?></td>
            <td><?= $p->nama_mobil ?></td>
            <td>Rp <?= number_format($p->total_harga, 0, ',', '.') ?></td>
            <td><?= $p->tanggal_lunas ?></td>

            <td>
                <?php if (!empty($p->id_pembayaran)): ?>

                    <a href="<?= base_url('index.php/laporan/kwitansi/'.$p->id_pembayaran) ?>" 
                    class="btn btn-sm btn-info" target="_blank">
                        <i class="fas fa-print"></i> Print
                    </a>

                    <a href="<?= base_url('index.php/laporan/kwitansi_pdf/'.$p->id_pembayaran) ?>" 
                    class="btn btn-sm btn-danger" target="_blank">
                        <i class="fas fa-file-pdf"></i> PDF
                    </a>

                <?php else: ?>
                    <span class="text-muted">Belum ada pembayaran</span>
                <?php endif; ?>
            </td>

        </tr>
        <?php endforeach; ?>
    </tbody>
</table>