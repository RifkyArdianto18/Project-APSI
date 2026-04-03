<h1>Tambah Mobil</h1>

<form action="<?= base_url('index.php/mobil/simpan') ?>" method="post">

    <input type="text" name="nama_mobil" placeholder="Nama Mobil" class="form-control mb-2" required>
    <input type="text" name="merk" placeholder="Merk" class="form-control mb-2" required>
    <input type="text" name="tipe" placeholder="Tipe" class="form-control mb-2" required>
    <input type="text" name="warna" placeholder="Warna" class="form-control mb-2" required>
    <input type="number" name="tahun" placeholder="Tahun" class="form-control mb-2" required>
    <input type="number" name="harga_jual" placeholder="Harga Jual" class="form-control mb-2" required>

    <button class="btn btn-success">Simpan</button>
</form>