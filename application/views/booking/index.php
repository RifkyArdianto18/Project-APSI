<h1>Data Booking</h1>

<a href="<?= base_url('index.php/booking/tambah') ?>" class="btn btn-primary mb-3">
    Tambah Booking
</a>

<table class="table table-bordered">
    <tr>
        <th>No</th>
        <th>Pelanggan</th>
        <th>Mobil</th>
        <th>Tanggal</th>
        <th>Fee</th>
        <th>Status</th>
    </tr>

    <?php $no=1; foreach($booking as $b): ?>
    <tr>
        <td><?= $no++ ?></td>
        <td><?= $b->nama_pelanggan ?></td>
        <td><?= $b->nama_mobil ?></td>
        <td><?= date('d-m-Y', strtotime($b->tgl_booking)) ?></td>
        <td>
            <?= $b->dp ? number_format($b->dp) : '-' ?>
        </td>
        <td><?= ucfirst($b->status) ?></td>
    </tr>
    <?php endforeach; ?>
</table>