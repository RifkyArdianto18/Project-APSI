<h1>Data Mobil</h1>

<a href="<?= base_url('index.php/mobil/tambah') ?>" class="btn btn-primary mb-3">
    Tambah Mobil
</a>

<table class="table table-bordered">
    <tr>
        <th>No</th>
        <th>Nama Mobil</th>
        <th>Merk</th>
        <th>Tipe</th>
        <th>Warna</th>
        <th>Tahun</th>
        <th>Harga</th>
        <th>Aksi</th>
    </tr>

    <?php $no=1; foreach($mobil as $m): ?>
    <tr>
        <td><?= $no++ ?></td>
        <td><?= $m->nama_mobil ?></td>
        <td><?= $m->merk ?></td>
        <td><?= $m->tipe ?></td>
        <td><?= $m->warna ?></td>
        <td><?= $m->tahun ?></td>
        <td><?= $m->harga_jual ?></td>
        <td>
            <a href="<?= base_url('index.php/mobil/edit/'.$m->id_mobil) ?>" class="btn btn-warning btn-sm">Edit</a>
            <a href="<?= base_url('index.php/mobil/delete/'.$m->id_mobil) ?>" class="btn btn-danger btn-sm">Hapus</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>