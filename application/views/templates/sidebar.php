<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <span class="navbar-brand"><b>Nusa Auto</b></span>
</nav>

<!-- Sidebar -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">

    <!-- Logo -->
    <a href="<?= base_url('dashboard') ?>" class="brand-link text-center">
        <span class="brand-text font-weight-light">Nusa Auto</span>
    </a>

    <div class="sidebar">
        <nav>
            <ul class="nav nav-pills nav-sidebar flex-column">

                <!-- Dashboard -->
                <li class="nav-item">
                    <a href="<?= base_url('index.php/dashboard') ?>" 
                    class="nav-link <?= $this->uri->segment(1)=='dashboard' ? 'active' : '' ?>">
                        <i class="nav-icon fas fa-home"></i>
                        <p>Dashboard</p>
                    </a>
                </li>

                <li class="nav-header">MASTER DATA</li>

                <li class="nav-item">
                    <a href="<?= base_url('index.php/mobil') ?>" 
                    class="nav-link <?= $this->uri->segment(1)=='mobil' ? 'active' : '' ?>">
                        <i class="nav-icon fas fa-car"></i>
                        <p>Mobil</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="<?= base_url('index.php/pelanggan') ?>" 
                    class="nav-link <?= $this->uri->segment(1)=='pelanggan' ? 'active' : '' ?>">
                        <i class="nav-icon fas fa-users"></i>
                        <p>Pelanggan</p>
                    </a>
                </li>

                <li class="nav-header">TRANSAKSI</li>

                <li class="nav-item">
                    <a href="<?= base_url('index.php/booking') ?>" 
                    class="nav-link <?= $this->uri->segment(1)=='booking' ? 'active' : '' ?>">
                        <i class="nav-icon fas fa-calendar-check"></i>
                        <p>Booking</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="<?= base_url('index.php/pembayaran/tambah') ?>" 
                    class="nav-link <?= $this->uri->segment(1)=='pembayaran' ? 'active' : '' ?>">
                        <i class="nav-icon fas fa-money-bill"></i>
                        <p>Pembayaran</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="<?= base_url('index.php/penjualan') ?>" 
                    class="nav-link <?= $this->uri->segment(1)=='penjualan' ? 'active' : '' ?>">
                        <i class="nav-icon fas fa-handshake"></i>
                        <p>Penjualan</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="<?= base_url('index.php/pelunasan') ?>" 
                    class="nav-link <?= $this->uri->segment(1)=='pelunasan' ? 'active' : '' ?>">
                        <i class="nav-icon fas fa-credit-card"></i>
                        <p>Pelunasan</p>
                    </a>
                </li>

                <li class="nav-header">PROSES</li>

                <li class="nav-item">
                    <a href="<?= base_url('index.php/stnk') ?>" 
                    class="nav-link <?= $this->uri->segment(1)=='stnk' ? 'active' : '' ?>">
                        <i class="nav-icon fas fa-id-card"></i>
                        <p>STNK</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="<?= base_url('index.php/bpkb') ?>" 
                    class="nav-link <?= $this->uri->segment(1)=='bpkb' ? 'active' : '' ?>">
                        <i class="nav-icon fas fa-file-alt"></i>
                        <p>BPKB</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="<?= base_url('index.php/serah_terima') ?>" 
                    class="nav-link <?= $this->uri->segment(1)=='serah_terima' ? 'active' : '' ?>">
                        <i class="nav-icon fas fa-truck"></i>
                        <p>Serah Terima</p>
                    </a>
                </li>

                <li class="nav-header">LAPORAN</li>

                <li class="nav-item">
                    <a href="<?= base_url('index.php/laporan/penjualan') ?>" 
                    class="nav-link <?= $this->uri->segment(1)=='laporan' ? 'active' : '' ?>">
                        <i class="nav-icon fas fa-chart-line"></i>
                        <p>Laporan Penjualan</p>
                    </a>
                </li>

                <li class="nav-item mt-3">
                    <a href="<?= base_url('auth/logout') ?>" class="nav-link text-danger">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p>Logout</p>
                    </a>
                </li>

            </ul>
        </nav>
    </div>
</aside>

<div class="content-wrapper">
<section class="content">
<div class="container-fluid">