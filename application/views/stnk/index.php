<h1>Pengurusan STNK</h1>

<table class="table table-bordered">
    <tr>
        <th>No</th>
        <th>Pelanggan</th>
        <th>Mobil</th>
        <th>Aksi</th>
    </tr>

    <?php $no=1; foreach($penjualan as $p): ?>
    <tr>
        <td><?= $no++ ?></td>
        <td><?= $p->nama_pelanggan ?></td>
        <td><?= $p->nama_mobil ?></td>
        <td>
            <?php if ($p->id_stnk == NULL): ?>
                <a href="<?= base_url('index.php/stnk/proses/'.$p->id_penjualan) ?>" class="btn btn-primary">
                    Proses STNK
                </a>
            <?php else: ?>
                <button class="btn btn-success" disabled>
                    Sedang Diproses
                </button>
            <?php endif; ?>
        </td>
    </tr>
    <?php endforeach; ?>
</table>