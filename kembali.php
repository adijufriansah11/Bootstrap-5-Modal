<?php 
 
session_start();
    // Pastikan file koneksi.php sudah disertakan sebelumnya
    include 'koneksi.php';

    // Ambil nilai id_transaksi dan judul_buku dari URL
    $id_pinjam = $_GET['id_pinjam'];
    $judul_buku = $_GET['judul_buku'];
    $nama = $_GET['nama'];
    $identitas = $_GET['identitas'];
    $tgl_kembali = date('Y-m-d');

    // Lakukan proses pengembalian buku di sini
    $update_transaksi = mysqli_query($koneksi, "UPDATE tb_pinjam SET status ='Buku Telah Dikembalikan' WHERE id_pinjam='$id_pinjam'");

    $update_transaksi = mysqli_query($koneksi, "INSERT INTO tb_pengembalian (kode_pinjam) VALUES ('$id_pinjam' )");

    $update_stok = mysqli_query($koneksi, "UPDATE tb_buku SET stok_buku = (stok_buku+1) WHERE judul_buku='$judul_buku'");

    // Cek apakah proses pengembalian berhasil
    if ($update_transaksi && $update_stok) {
        // Jika berhasil, set session alert untuk SweetAlert sukses
        $_SESSION['alert'] = "Buku Telah Dikembalikan";
        $_SESSION['alert_type'] = "success";
    } else {
        // Jika gagal, set session alert untuk SweetAlert error
        $_SESSION['alert'] = "Buku Gagal Dikembalikan";
        $_SESSION['alert_type'] = "error";
    }

    // Redirect ke halaman pemimjaman.php
    header("Location: pemimjaman.php");
    exit();
?>