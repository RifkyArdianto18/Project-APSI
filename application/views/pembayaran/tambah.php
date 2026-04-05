<h1>Input DP</h1>

<form action="<?= base_url('index.php/pembayaran/simpan') ?>" method="post" enctype="multipart/form-data">

    <label>Pilih Booking</label>
    <select name="id_booking" class="form-control mb-2" required>
        <option value="">Pilih Booking</option>
        <?php foreach($booking as $b): ?>
            <option value="<?= $b->id_booking ?>">
                <?= $b->nama_pelanggan ?> - <?= $b->nama_mobil ?>
            </option>
        <?php endforeach; ?>
    </select>

    <input type="number" name="jumlah" placeholder="Jumlah DP" class="form-control mb-2" required>

    <select name="metode" class="form-control mb-2">
        <option value="transfer">Transfer</option>
        <option value="cash">Cash</option>
    </select>

    <input type="file" name="bukti" class="form-control mb-2">

    <button class="btn btn-success">Simpan</button>
</form>