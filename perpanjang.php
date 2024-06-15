<?php

        //panggil koneksi database buku
        include "koneksi.php";
        session_start(); // Mulai sesi

$id_pinjam = $_GET['id_pinjam'];
$judul_buku = $_GET['judul_buku'];
$tgl_kembali = $_GET['tgl_kembali'];
$lambat = $_GET['lambat'];

if ($lambat > 7) {
    $_SESSION['alert'] = "Pemimjaman Buku Tidak Dapat Diperpanjang, Karena Lebih Dari 7 Hari.. Kembalikan Dahulu Kemudian Pinjam Kembali";
    $_SESSION['alert_type'] = "error";
    header("Location: pemimjaman.php");
    exit();
} else {
    $pecah_tgl_kembali = explode("-", $tgl_kembali);
    $next_7_hari = mktime(0, 0, 0, $pecah_tgl_kembali[1], $pecah_tgl_kembali[0] + 7, $pecah_tgl_kembali[2]);
    $hari_next = date("d-m-Y", $next_7_hari);

    $tampil = mysqli_query($koneksi, "UPDATE tb_transaksi SET tgl_kembali ='$hari_next' WHERE id_pinjam  ='$id_pinjam'");

    if ($tampil) {
        $_SESSION['alert'] = "Berhasil Diperpanjang Masa pemimjaman Buku, Terimakasih";
        $_SESSION['alert_type'] = "success";
    } else {
        $_SESSION['alert'] = "Gagal, Perpanjang Masa pemimjaman Buku";
        $_SESSION['alert_type'] = "error";
    }

    header("Location: pemimjaman.php");
    exit();
}

?>

