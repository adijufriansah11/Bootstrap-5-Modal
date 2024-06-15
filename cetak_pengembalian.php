<?php

// Panggil koneksi database
include "koneksi.php";

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Cetak Pengembalian Buku</title>

    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
<style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
        }
        .header-container {
            display: flex;
            align-items: center;
            justify-content: center;
            margin: auto;
            text-align: center;
        }
        .header-container img {
            height: 60px;
            margin-right: 20px;
        }
        .header-container .header-text {
            text-align: center;
        }
        .header-container .header-text div {
            margin: 2px 0;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        p {
            margin: 0;
        }
    </style>
    
</head>

<body onload="window.print();" style="font-family: arial; font-size: 12px;">

     <div class="header-container">
        <img src="img/logo.PNG" alt="Logo Perpustakaan">
        <div class="header-text">
            <div style="font-size: 20px;"><b>Perpustakaan Sekolah</b></div>
            <div style="font-size: 20px;"><b>SMA Muhammadiyah Maumere</b></div>
            <div style="font-size: 12px;">JL.Jendral Sudirman, Kel.Waioti, Kec.Alok Timur, Kab.Sikka, Waioti, Kec. Alok Timur, Kab. Sikka</div>
        </div>
    </div>
    <hr style="border: 0.5px solid black; margin: 10px 5px;">
    <div style="font-size: 20px" align="center"><b>Pengembalian Buku</b></div>
    <table align="center">
        <tr>
            <th>No</th>
            <th>Nama Lengkap</th>
            <th>No Identitas</th>
            <th>Judul Buku</th>
            <th>Tanggal Pengembalian</th>
        </tr>
        <?php
            // Persiapan menampilkan data
            $no = 1;
            $tampil = mysqli_query($koneksi, "SELECT * FROM tb_pengembalian INNER JOIN tb_pinjam ON tb_pengembalian.kode_pinjam = tb_pinjam.id_pinjam ");

            // Loop untuk setiap data transaksi
            while ($data = mysqli_fetch_array($tampil)) {
                $nama = $data['nama'];
                $identitas = $data['identitas'];
                $judul_buku = $data['judul_buku'];
                $tgl_kembali = $data['tgl_kembali'];
                $status = $data['status'];

                // Tambahkan baris data ke dalam tabel HTML
                echo '<tr>';
                echo '<td>' . $no++ . '</td>';
                echo '<td>' . $nama . '</td>';
                echo '<td>' . $identitas . '</td>';
                echo '<td>' . $judul_buku . '</td>';
                echo '<td>' . $tgl_kembali . '</td>';
                echo '</tr>';
            }
        ?>
    </table><br>
    <p align="right">
    Maumere, <?php echo date("d F Y"); ?><br>
    Mengetahui,<br>
    Kepala Perpustakaan SMA Muhammadiyah Maumere
</p>
<br>
<p align="right" style="margin-top: 20px;">
        <?php
         $tampil = mysqli_query($koneksi, "SELECT * FROM tb_anggota WHERE status='Kepala Perpus'");
        while ($data = mysqli_fetch_array($tampil)) {
        $nama = $data['nama'];

        echo '<div style="text-align: right; margin-top: 10px;">';
        echo '<img src="img/ttd1.png" alt="Tanda Tangan" style="margin-right: 5px; width: 150px; height: auto; padding-top: -20px;">'; // Gambar diletakkan di sebelah kiri nama
        echo '<br>';
        echo '<span style="text-decoration: underline; padding-top: 7px;">' . $nama . '</span>';
        echo '</div>';

        }
        ?>

</p>
</body>
</html>