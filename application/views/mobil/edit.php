<h1>Edit Mobil</h1>

<form action="<?= base_url('index.php/mobil/update/'.$mobil->id_mobil) ?>" method="post">

    <input type="text" name="nama_mobil" value="<?= $mobil->nama_mobil ?>" class="form-control mb-2">
    <input type="text" name="merk" value="<?= $mobil->merk ?>" class="form-control mb-2">
    <input type="number" name="tahun" value="<?= $mobil->tahun ?>" class="form-control mb-2">
    <input type="number" name="harga" value="<?= $mobil->harga ?>" class="form-control mb-2">

    <button class="btn btn-primary">Update</button>
</form>