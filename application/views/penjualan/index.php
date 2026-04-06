<div class="card card-custom">

    <div class="card-header">
        <h3 class="card-title">
            <i class="fas fa-handshake"></i> Proses Penjualan
        </h3>
    </div>

    <div class="card-body">

        <?php if(empty($booking)): ?>
            <div class="alert alert-info">
                Tidak ada data booking yang siap diproses.
            </div>
        <?php else: ?>

        <div class="table-responsive">
            <table class="table table-bordered table-hover">

                <thead>
                    <tr>
                        <th width="5%">No</th>
                        <th>Pelanggan</th>
                        <th>Mobil</th>
                        <th>Harga</th>
                        <th>Status</th>
                        <th width="15%">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    <?php $no=1; foreach($booking as $b): ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $b->nama_pelanggan ?></td>
                        <td><?= $b->nama_mobil ?></td>

                        <td>
                            <b class="text-success">
                                Rp <?= number_format($b->harga_jual,0,',','.') ?>
                            </b>
                        </td>

                        <td>
                            <?php if($b->status == 'dp'): ?>
                                <span class="badge badge-info">Siap Diproses</span>
                            <?php else: ?>
                                <span class="badge badge-secondary"><?= $b->status ?></span>
                            <?php endif; ?>
                        </td>

                        <td>
                            <?php if($b->status == 'dp'): ?>
                                <a href="<?= base_url('penjualan/proses/'.$b->id_booking) ?>" 
                                   class="btn btn-success btn-sm"
                                   onclick="return confirm('Proses penjualan sekarang?')">
                                    <i class="fas fa-check"></i> Proses
                                </a>
                            <?php else: ?>
                                <button class="btn btn-secondary btn-sm" disabled>
                                    <i class="fas fa-lock"></i>
                                </button>
                            <?php endif; ?>
                        </td>

                    </tr>
                    <?php endforeach; ?>
                </tbody>

            </table>
        </div>

        <?php endif; ?>

    </div>
</div>