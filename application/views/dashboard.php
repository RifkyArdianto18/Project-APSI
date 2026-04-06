<div class="row">

    <!-- Mobil -->
    <div class="col-lg-3 col-6">
        <div class="small-box bg-info">
            <div class="inner">
                <h3><?= $total_mobil ?></h3>
                <p>Total Mobil</p>
            </div>
            <div class="icon">
                <i class="fas fa-car"></i>
            </div>
        </div>
    </div>

    <!-- Pelanggan -->
    <div class="col-lg-3 col-6">
        <div class="small-box bg-success">
            <div class="inner">
                <h3><?= $total_pelanggan ?></h3>
                <p>Total Pelanggan</p>
            </div>
            <div class="icon">
                <i class="fas fa-users"></i>
            </div>
        </div>
    </div>

    <!-- Booking -->
    <div class="col-lg-3 col-6">
        <div class="small-box bg-warning">
            <div class="inner">
                <h3><?= $total_booking ?></h3>
                <p>Total Booking</p>
            </div>
            <div class="icon">
                <i class="fas fa-calendar-check"></i>
            </div>
        </div>
    </div>

    <!-- Penjualan -->
    <div class="col-lg-3 col-6">
        <div class="small-box bg-danger">
            <div class="inner">
                <h3><?= $total_penjualan ?></h3>
                <p>Total Penjualan</p>
            </div>
            <div class="icon">
                <i class="fas fa-handshake"></i>
            </div>
        </div>
    </div>

</div>

<div class="row">

    <!-- Booking Aktif -->
    <div class="col-md-6">
        <div class="card card-custom">
            <div class="card-header">
                <h3 class="card-title">
                    <i class="fas fa-clock"></i> Booking Aktif
                </h3>
            </div>

            <div class="card-body">
                <h4 class="text-warning">
                    <?= $booking_aktif ?> Booking
                </h4>
                <small class="text-muted">
                    Menunggu pembayaran DP
                </small>
            </div>
        </div>
    </div>

    <!-- Mobil Tersedia -->
    <div class="col-md-6">
        <div class="card card-custom">
            <div class="card-header">
                <h3 class="card-title">
                    <i class="fas fa-check-circle"></i> Mobil Tersedia
                </h3>
            </div>

            <div class="card-body">
                <h4 class="text-success">
                    <?= $mobil_tersedia ?> Unit
                </h4>
                <small class="text-muted">
                    Siap dijual
                </small>
            </div>
        </div>
    </div>

</div>

<div class="row">
    <div class="col-md-12">
        <div class="card card-custom">

            <div class="card-header">
                <h3 class="card-title">
                    <i class="fas fa-chart-line"></i> Grafik Penjualan
                </h3>
            </div>

            <div class="card-body">
                <canvas id="chartPenjualan" height="100"></canvas>
            </div>

        </div>
    </div>
</div>