<div class="card card-custom">
    
    <div class="card-header d-flex justify-content-between align-items-center">
        <h3 class="card-title">
            <i class="fas fa-car"></i> Data Booking
        </h3>

        <a href="<?= base_url('booking/tambah') ?>" class="btn btn-primary btn-sm">
            <i class="fas fa-plus"></i> Tambah Booking
        </a>
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
                        <th>Tanggal</th>
                        <th>Batas DP</th>
                        <th>Fee</th>
                        <th>Status</th>
                    </tr>
                </thead>

                <tbody>
                    <?php $no=1; foreach($booking as $b): ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $b->nama_pelanggan ?></td>
                        <td><?= $b->nama_mobil ?></td>

                        <td><?= date('d-m-Y', strtotime($b->tgl_booking)) ?></td>

                        <td>
                            <span class="text-danger">
                                <?= date('d-m-Y', strtotime($b->batas_dp)) ?>
                            </span>
                        </td>

                        <td>
                            <?= $b->dp ? 'Rp '.number_format($b->dp) : '-' ?>
                        </td>

                        <td>
                            <?php if($b->status == 'booking'): ?>
                                <span class="badge badge-warning">Booking</span>

                            <?php elseif($b->status == 'dp'): ?>
                                <span class="badge badge-info">DP</span>

                            <?php elseif($b->status == 'expired'): ?>
                                <span class="badge badge-danger">Expired</span>

                            <?php elseif($b->status == 'batal'): ?>
                                <span class="badge badge-dark">Batal</span>

                            <?php else: ?>
                                <span class="badge badge-secondary"><?= $b->status ?></span>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

    </div>
</div>