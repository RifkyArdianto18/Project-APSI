<div class="card card-custom">

    <div class="card-header">
        <h3 class="card-title">
            <i class="fas fa-edit"></i> Edit Mobil
        </h3>
    </div>

    <div class="card-body">

        <form action="<?= base_url('mobil/update/'.$mobil->id_mobil) ?>" method="post">

            <div class="form-group">
                <label>Nama Mobil</label>
                <input type="text" name="nama_mobil" value="<?= $mobil->nama_mobil ?>" class="form-control">
            </div>

            <div class="form-group">
                <label>Merk</label>
                <input type="text" name="merk" value="<?= $mobil->merk ?>" class="form-control">
            </div>

            <div class="form-group">
                <label>Tipe</label>
                <input type="text" name="tipe" value="<?= $mobil->tipe ?>" class="form-control">
            </div>

            <div class="form-group">
                <label>Warna</label>
                <input type="text" name="warna" value="<?= $mobil->warna ?>" class="form-control">
            </div>

            <div class="form-group">
                <label>Tahun</label>
                <input type="number" name="tahun" value="<?= $mobil->tahun ?>" class="form-control">
            </div>

            <div class="form-group">
                <label>Harga Jual</label>
                <input type="number" name="harga_jual" value="<?= $mobil->harga_jual ?>" class="form-control">
            </div>

            <button class="btn btn-primary">
                <i class="fas fa-save"></i> Update
            </button>

        </form>

    </div>
</div>