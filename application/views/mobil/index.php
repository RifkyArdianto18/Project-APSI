<div class="card card-custom">

    <div class="card-header d-flex justify-content-between align-items-center">
        <h3 class="card-title">
            <i class="fas fa-car"></i> Data Mobil
        </h3>

        <a href="<?= base_url('mobil/tambah') ?>" class="btn btn-primary btn-sm">
            <i class="fas fa-plus"></i> Tambah Mobil
        </a>
    </div>

    <div class="card-body">

        <div class="table-responsive">
            <table class="table table-bordered table-hover">

                <thead>
                    <tr>
                        <th width="5%">No</th>
                        <th>Nama Mobil</th>
                        <th>Merk</th>
                        <th>Tipe</th>
                        <th>Warna</th>
                        <th>Tahun</th>
                        <th>Harga</th>
                        <th>Status</th>
                        <th width="15%">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    <?php $no=1; foreach($mobil as $m): ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $m->nama_mobil ?></td>
                        <td><?= $m->merk ?></td>
                        <td><?= $m->tipe ?></td>
                        <td><?= $m->warna ?></td>
                        <td><?= $m->tahun ?></td>

                        <td>
                            <b class="text-success">
                                Rp <?= number_format($m->harga_jual,0,',','.') ?>
                            </b>
                        </td>

                        <td>
                            <?php if($m->status_mobil == 'tersedia'): ?>
                                <span class="badge badge-success">Tersedia</span>
                            <?php elseif($m->status_mobil == 'booking'): ?>
                                <span class="badge badge-warning">Booking</span>
                            <?php else: ?>
                                <span class="badge badge-danger">Terjual</span>
                            <?php endif; ?>
                        </td>

                        <td>
                            <a href="<?= base_url('mobil/edit/'.$m->id_mobil) ?>" 
                               class="btn btn-warning btn-sm">
                                <i class="fas fa-edit"></i>
                            </a>

                            <a href="<?= base_url('mobil/delete/'.$m->id_mobil) ?>" 
                               class="btn btn-danger btn-sm"
                               onclick="return confirm('Yakin hapus data?')">
                                <i class="fas fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>

            </table>
        </div>

    </div>
</div>