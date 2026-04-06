<div class="card card-custom">

    <div class="card-header">
        <h3 class="card-title">
            <i class="fas fa-money-bill-wave"></i> Pelunasan
        </h3>
    </div>

    <div class="card-body">

        <?php if($this->session->flashdata('error')): ?>
            <div class="alert alert-danger">
                <?= $this->session->flashdata('error') ?>
            </div>
        <?php endif; ?>

        <div class="table-responsive">
            <table class="table table-bordered table-hover">

                <thead>
                    <tr>
                        <th width="5%">No</th>
                        <th>Pelanggan</th>
                        <th>Mobil</th>
                        <th>Total</th>
                        <th>Status</th>
                        <th width="20%">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    <?php $no=1; foreach($penjualan as $p): ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $p->nama_pelanggan ?></td>
                        <td><?= $p->nama_mobil ?></td>

                        <td>
                            <b class="text-success">
                                Rp <?= number_format($p->total_harga,0,',','.') ?>
                            </b>
                        </td>

                        <td>
                            <?php if($p->status_penyerahan == 'diproses'): ?>
                                <span class="badge badge-warning">Diproses</span>

                            <?php elseif($p->status_penyerahan == 'siap'): ?>
                                <span class="badge badge-info">Siap</span>

                            <?php elseif($p->status_penyerahan == 'dikirim'): ?>
                                <span class="badge badge-primary">Dikirim</span>

                            <?php elseif($p->status_penyerahan == 'selesai'): ?>
                                <span class="badge badge-success">Selesai</span>

                            <?php elseif($p->status_penyerahan == 'batal'): ?>
                                <span class="badge badge-danger">Batal</span>

                            <?php else: ?>
                                <span class="badge badge-secondary"><?= $p->status_penyerahan ?></span>
                            <?php endif; ?>
                        </td>

                        <td>
                            <?php if($p->status_penyerahan == 'diproses'): ?>
                                <a href="<?= base_url('pelunasan/bayar/'.$p->id_penjualan) ?>" 
                                   class="btn btn-success btn-sm"
                                   onclick="return confirm('Yakin lakukan pelunasan?')">
                                    <i class="fas fa-check"></i> Lunas
                                </a>

                            <?php else: ?>
                                <button class="btn btn-secondary btn-sm" disabled>
                                    <i class="fas fa-lock"></i> Sudah Diproses
                                </button>
                            <?php endif; ?>
                        </td>

                    </tr>
                    <?php endforeach; ?>
                </tbody>

            </table>
        </div>

    </div>
</div>