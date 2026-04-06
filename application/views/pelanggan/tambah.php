<div class="card card-custom">

    <div class="card-header">
        <h3 class="card-title">
            <i class="fas fa-user-plus"></i> Tambah Pelanggan
        </h3>
    </div>

    <div class="card-body">

        <form action="<?= base_url('pelanggan/simpan') ?>" method="post">

            <div class="form-group">
                <label>Nama Pelanggan</label>
                <input type="text" name="nama_pelanggan" class="form-control" required>
            </div>

            <div class="form-group">
                <label>Alamat</label>
                <textarea name="alamat" class="form-control" required></textarea>
            </div>

            <div class="form-group">
                <label>No Handphone</label>
                <input type="text" name="handphone" class="form-control" required>
            </div>

            <button class="btn btn-success">
                <i class="fas fa-save"></i> Simpan
            </button>

        </form>

    </div>
</div>