<h1>Pelunasan</h1>

<table class="table table-bordered">
    <tr>
        <th>No</th>
        <th>Pelanggan</th>
        <th>Mobil</th>
        <th>Total</th>
        <th>Status</th>
        <th>Aksi</th>
    </tr>

    <?php $no=1; foreach($penjualan as $p): ?>
    <tr>
        <td><?= $no++ ?></td>
        <td><?= $p->nama_pelanggan ?></td>
        <td><?= $p->nama_mobil ?></td>
        <td><?= number_format($p->total_harga) ?></td>
        <td><?= $p->status_penyerahan ?></td>
        <td>
            <a href="<?= base_url('index.php/pelunasan/bayar/'.$p->id_penjualan) ?>" class="btn btn-success">
                Lunas
            </a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>