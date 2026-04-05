<h1>Pengurusan BPKB</h1>

<table class="table table-bordered">
    <tr>
        <th>No</th>
        <th>Pelanggan</th>
        <th>Mobil</th>
        <th>Status</th>
        <th>Aksi</th>
    </tr>

    <?php $no=1; foreach($bpkb as $b): ?>
    <tr>
        <td><?= $no++ ?></td>
        <td><?= $b->nama_pelanggan ?></td>
        <td><?= $b->nama_mobil ?></td>
        <td>
            <?php if ($b->status == NULL): ?>
                <span class="badge bg-secondary">Belum Mulai</span>
            <?php elseif ($b->status == 'proses'): ?>
                <span class="badge bg-warning">Proses</span>
            <?php else: ?>
                <span class="badge bg-success">Selesai</span>
            <?php endif; ?>
        </td>
        <td>

            <?php if ($b->status == NULL): ?>
                <a href="<?= base_url('index.php/bpkb/proses/'.$b->id_penjualan) ?>" class="btn btn-primary">
                    Proses
                </a>

            <?php elseif ($b->status == 'proses'): ?>
                <a href="<?= base_url('index.php/bpkb/selesai/'.$b->id_penjualan) ?>" class="btn btn-success">
                    Selesai
                </a>

            <?php else: ?>
                <button class="btn btn-secondary" disabled>
                    ✔ Selesai
                </button>
            <?php endif; ?>

        </td>
    </tr>
    <?php endforeach; ?>
</table>