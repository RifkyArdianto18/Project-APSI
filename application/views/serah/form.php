<div class="card card-custom">

    <div class="card-header">
        <h3 class="card-title">
            <i class="fas fa-handshake"></i> Serah Terima Kendaraan
        </h3>
    </div>

    <div class="card-body">

        <form method="post" action="<?= base_url('serah_terima/simpan') ?>" enctype="multipart/form-data">

            <input type="hidden" name="id_penjualan" value="<?= $penjualan->id_penjualan ?>">

            <div class="form-group">
                <label>Metode Penyerahan</label>
                <select name="metode" id="metode" class="form-control" required>
                    <option value="">-- Pilih Metode --</option>
                    <option value="ambil">Ambil di Tempat</option>
                    <option value="kirim">Kirim ke Alamat</option>
                </select>
            </div>

            <div class="form-group" id="alamatBox" style="display:none;">
                <label>Alamat Pengiriman</label>
                <input type="text" name="alamat" class="form-control">
                <small class="text-muted">Wajib diisi jika metode kirim</small>
            </div>

            <div class="form-group">
                <label>Bukti Serah Terima (Foto)</label>
                <input type="file" name="bukti" class="form-control">
            </div>

            <button class="btn btn-primary">
                <i class="fas fa-save"></i> Simpan
            </button>

        </form>

    </div>
</div>

<script>
document.getElementById('metode').addEventListener('change', function(){
    let alamatBox = document.getElementById('alamatBox');

    if(this.value === 'kirim'){
        alamatBox.style.display = 'block';
    } else {
        alamatBox.style.display = 'none';
    }
});
</script>