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
        <td><?= $b->tanggal_booking ?></td>
        <td><?= number_format($b->booking_fee) ?></td>
        <td><?= $b->status_booking ?></td>
    </tr>
    <?php endforeach; ?>
</table>