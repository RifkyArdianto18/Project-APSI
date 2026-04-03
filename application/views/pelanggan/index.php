<h1>Data Pelanggan</h1>

<a href="<?= base_url('index.php/pelanggan/tambah') ?>" class="btn btn-primary mb-3">
    Tambah Pelanggan
</a>

<table class="table table-bordered">
    <tr>
        <th>No</th>
        <th>Nama</th>
        <th>Alamat</th>
        <th>No HP</th>
    </tr>

    <?php $no=1; foreach($pelanggan as $p): ?>
    <tr>
        <td><?= $no++ ?></td>
        <td><?= $p->nama_pelanggan ?></td>
        <td><?= $p->alamat ?></td>
        <td><?= $p->handphone ?></td>
    </tr>
    <?php endforeach; ?>
</table>