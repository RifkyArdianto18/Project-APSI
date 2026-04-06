<div class="card card-custom">

    <div class="card-header">
        <h3 class="card-title">
            <i class="fas fa-money-bill-wave"></i> Input DP
        </h3>
    </div>

    <div class="card-body">

        <?php if($this->session->flashdata('error')): ?>
            <div class="alert alert-danger">
                <?= $this->session->flashdata('error') ?>
            </div>
        <?php endif; ?>

        <form action="<?= base_url('pembayaran/simpan') ?>" method="post" enctype="multipart/form-data">

            <div class="form-group">
                <label>Pilih Booking</label>
                <select name="id_booking" class="form-control" required>
                    <option value="">-- Pilih Booking --</option>
                    <?php foreach($booking as $b): ?>
                        <option value="<?= $b->id_booking ?>">
                            <?= $b->nama_pelanggan ?> - <?= $b->nama_mobil ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="form-group">
                <label>Jumlah DP</label>
                <input type="number" name="jumlah" class="form-control" required>
                <small class="text-muted">
                    Minimal DP 30% dari harga mobil
                </small>
            </div>

            <div class="form-group">
                <label>Metode Pembayaran</label>
                <select name="metode" class="form-control">
                    <option value="transfer">Transfer</option>
                    <option value="cash">Cash</option>
                </select>
            </div>

            <div class="form-group">
                <label>Bukti Transfer</label>
                <input type="file" name="bukti" class="form-control">
                <small class="text-muted">
                    Upload jika pembayaran via transfer
                </small>
            </div>

            <button class="btn btn-success">
                <i class="fas fa-save"></i> Simpan
            </button>

        </form>

    </div>
</div>