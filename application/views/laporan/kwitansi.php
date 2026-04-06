<!DOCTYPE html>
<html>
<head>
    <title>Kwitansi</title>

    <style>
        body {
            font-family: 'Arial', sans-serif;
            width: 700px;
            margin: auto;
            color: #000;
        }

        .box {
            border: 2px solid #000;
            padding: 20px;
            border-radius: 8px;
        }

        .header {
            text-align: center;
        }

        .logo img {
            width: 70px;
        }

        .title {
            font-size: 20px;
            font-weight: bold;
        }

        .line {
            border-top: 2px dashed black;
            margin: 10px 0;
        }

        table {
            width: 100%;
        }

        td {
            padding: 5px;
        }

        .right {
            text-align: right;
        }

        .bold {
            font-weight: bold;
        }

        .highlight {
            font-size: 18px;
            font-weight: bold;
            background: #f4f6f9;
            padding: 8px;
            border-radius: 5px;
        }

        .ttd {
            margin-top: 40px;
            text-align: right;
        }
    </style>
</head>

<body onload="window.print()">

<div class="box">

    <!-- HEADER -->
    <div class="header">
        <div class="logo">
            <img src="<?= base_url('assets/logo.png') ?>">
        </div>
        <div class="title">NUSA AUTO</div>
        <div>KWITANSI PEMBAYARAN</div>
    </div>

    <div class="line"></div>

    <!-- INFO -->
    <table>
        <tr>
            <td>No</td>
            <td>: KW-<?= str_pad($d->id_pembayaran, 4, '0', STR_PAD_LEFT) ?></td>
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
            <td width="30%">Pelanggan</td>
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

    <!-- JUMLAH -->
    <table>
        <tr>
            <td class="bold">Jumlah Dibayar</td>
            <td class="right highlight">
                Rp <?= number_format($d->jumlah, 0, ',', '.') ?>
            </td>
        </tr>
        <tr>
            <td>Metode</td>
            <td class="right"><?= strtoupper($d->metode) ?></td>
        </tr>
    </table>

    <div class="line"></div>

    <!-- TTD -->
    <div class="ttd">
        <p>Admin</p>
        <br><br>
        <p><b>_____________________</b></p>
    </div>

</div>

</body>
</html>