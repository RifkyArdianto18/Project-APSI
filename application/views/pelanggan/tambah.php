<h1>Tambah Pelanggan</h1>

<form action="<?= base_url('index.php/pelanggan/simpan') ?>" method="post">

    <input type="text" name="nama_pelanggan" placeholder="Nama" class="form-control mb-2" required>
    <textarea name="alamat" placeholder="Alamat" class="form-control mb-2" required></textarea>
    <input type="text" name="handphone" placeholder="No HP" class="form-control mb-2" required>

    <button class="btn btn-success">Simpan</button>
</form>