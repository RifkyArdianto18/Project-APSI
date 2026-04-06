<div class="card card-custom">

    <div class="card-header">
        <h3 class="card-title">
            <i class="fas fa-plus"></i> Tambah Mobil
        </h3>
    </div>

    <div class="card-body">

        <form action="<?= base_url('mobil/simpan') ?>" method="post">

            <div class="form-group">
                <label>Nama Mobil</label>
                <input type="text" name="nama_mobil" class="form-control" required>
            </div>

            <div class="form-group">
                <label>Merk</label>
                <input type="text" name="merk" class="form-control" required>
            </div>

            <div class="form-group">
                <label>Tipe</label>
                <input type="text" name="tipe" class="form-control" required>
            </div>

            <div class="form-group">
                <label>Warna</label>
                <input type="text" name="warna" class="form-control" required>
            </div>

            <div class="form-group">
                <label>Tahun</label>
                <input type="number" name="tahun" class="form-control" required>
            </div>

            <div class="form-group">
                <label>Harga Jual</label>
                <input type="number" name="harga_jual" class="form-control" required>
            </div>

            <button class="btn btn-success">
                <i class="fas fa-save"></i> Simpan
            </button>

        </form>

    </div>
</div>