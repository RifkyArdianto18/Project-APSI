<h1>Proses Penjualan</h1>

<table class="table table-bordered">
    <tr>
        <th>No</th>
        <th>Pelanggan</th>
        <th>Mobil</th>
        <th>Harga</th>
        <th>Aksi</th>
    </tr>

    <?php $no=1; foreach($booking as $b): ?>
    <tr>
        <td><?= $no++ ?></td>
        <td><?= $b->nama_pelanggan ?></td>
        <td><?= $b->nama_mobil ?></td>
        <td><?= number_format($b->harga_jual) ?></td>
        <td>
            <a href="<?= base_url('index.php/penjualan/proses/'.$b->id_booking) ?>" class="btn btn-success">
                Proses
            </a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>