<!DOCTYPE html>
<html>
<head>
    <title>Kwitansi</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            width: 700px;
            margin: auto;
            color: #000;
        }
        .header {
            text-align: center;
        }
        .logo {
            text-align: center;
            margin-bottom: 10px;
        }
        .line {
            border-top: 2px solid black;
            margin: 10px 0;
        }
        table {
            width: 100%;
            margin-top: 5px;
        }
        td {
            padding: 4px;
        }
        .right {
            text-align: right;
        }
        .bold {
            font-weight: bold;
        }
    </style>
</head>
<body onload="window.print()">

    <!-- LOGO -->
    <div class="logo">
        <img src="<?= base_url('assets/logo.png') ?>" width="80">
    </div>

    <!-- HEADER -->
    <div class="header">
        <h2>NUSA AUTO</h2>
        <h3>KWITANSI PEMBAYARAN</h3>
    </div>

    <div class="line"></div>

    <!-- INFO -->
    <table>
        <tr>
            <td>No</td>
            <td>: KW-<?= str_pad($d->id_pembayaran, 3, '0', STR_PAD_LEFT) ?></td>
        </tr>
        <tr>
            <td>Tanggal</td>
            <td>: <?= date('d F Y', strtotime($d->tgl_bayar)) ?></td>
        </tr>
    </table>

    <div class="line"></div>

    <!-- DATA -->
    <table>
        <tr>
            <td>Pelanggan</td>
            <td>: <?= $d->nama_pelanggan ?></td>
        </tr>
        <tr>
            <td>Mobil</td>
            <td>: <?= $d->nama_mobil ?></td>
        </tr>
        <tr>
            <td>Jenis</td>
            <td>: <?= strtoupper($d->jenis_pembayaran) ?></td>
        </tr>
    </table>

    <div class="line"></div>

    <!-- PEMBAYARAN -->
    <table>
        <tr>
            <td class="bold">Jumlah</td>
            <td class="right bold">
                Rp <?= number_format($d->jumlah, 0, ',', '.') ?>
            </td>
        </tr>
        <tr>
            <td>Metode</td>
            <td class="right"><?= strtoupper($d->metode) ?></td>
        </tr>
    </table>

    <div class="line"></div>

    <br><br>

    <!-- TTD -->
    <div class="right">
        <p>Admin</p>
        <br><br><br>
        <p>_____________________</p>
    </div>

</body>
</html>