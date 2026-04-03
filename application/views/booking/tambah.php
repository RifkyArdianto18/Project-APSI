<h1>Tambah Booking</h1>

<form action="<?= base_url('index.php/booking/simpan') ?>" method="post">

    <!-- Pilih pelanggan -->
    <select name="id_pelanggan" class="form-control mb-2" required>
        <option value="">Pilih Pelanggan</option>
        <?php foreach($pelanggan as $p): ?>
            <option value="<?= $p->id_pelanggan ?>">
                <?= $p->nama_pelanggan ?>
            </option>
        <?php endforeach; ?>
    </select>

    <!-- Pilih mobil -->
    <select name="id_mobil" class="form-control mb-2" required>
        <option value="">Pilih Mobil</option>
        <?php foreach($mobil as $m): ?>
            <option value="<?= $m->id_mobil ?>">
                <?= $m->nama_mobil ?>
            </option>
        <?php endforeach; ?>
    </select>

    <button class="btn btn-success">Booking</button>
</form>