<?php
//panggil koneksi database
include "koneksi.php";
require "vendor/dompdf/autoload.inc.php"; // Ubah sesuai dengan path yang benar

use Dompdf\Dompdf;

//persiapan menampilkan data               
$no = 1;
// Ambil data dari database
$no = 1;
$tampil = mysqli_query($koneksi, "SELECT * FROM tb_pengembalian INNER JOIN tb_pinjam ON tb_pengembalian.kode_pinjam = tb_pinjam.id_pinjam ");

/// Buat konten HTML untuk laporan
$html = '<html><head><style>
    body {
        margin: 0;
        padding: 0;
    }
    .container {
        text-align: center;
    }
    h5 {
        margin: 5px 0;
    }
    table {
        width: 100%;
        border-collapse: collapse;
    }
    th, td {
        border: 1px solid black;
        padding: 8px;
        text-align: center;
    }
</style></head><body>';

$html .= '<img src="img/logo.png" style="float: left; height: 75px;">'; // Ubah sesuai dengan path logo Anda
$html .= '<div class="container" style="margin: auto;">'; // Memperbaiki margin
$html .= '<div style="font-size: 20px">Perpustakaan</div>';
$html .= '<div style="font-size: 20px">SMA Muhammadiyah Maumere</div>';
$html .= '<div style="font-size: 12px">JL.Jendral Sudirman, Kel.Waioti, Kec.Alok Timur, Kab.Sikka, Waioti, Kec. Alok Timur, Kab. Sikka</div>';
$html .= '</div>';
$html .= '<hr style="border: 0.4px solid black; clear: both;">'; // Garis bawah di bawah logo

$html .= '<div style="font-size: 20px; margin-bottom: 20px;" align="center">Laporan Pengembalian Buku</div>';

$html .= '<table>';
$html .= '<tr>';
$html .= '<th>No</th>';
$html .= '<th>Nama Lengkap</th>';
$html .= '<th>No Identitas</th>';
$html .= '<th>Judul Buku</th>';
$html .= '<th>Tggl Pengembalian</th>';
$html .= '<th>Status</th>';
$html .= '</tr>';

// Loop untuk setiap data transaksi
while ($data = mysqli_fetch_array($tampil)) {
    $nama = $data['nama'];
    $identitas = $data['identitas'];
    $judul_buku = $data['judul_buku'];
    $tgl_kembali = $data['tgl_kembali'];
    $status = $data['status'];

    // Tambahkan baris data ke dalam tabel HTML
    $html .= '<tr>';
     $html .= '<td>' .$no++ . '</td>';
    $html .= '<td>' . $nama . '</td>';
    $html .= '<td>' . $identitas . '</td>';
    $html .= '<td>' . $judul_buku . '</td>';
    $html .= '<td>' . $tgl_kembali . '</td>';
    $html .= '<td>' . $status . '</td>';
    $html .= '</tr>';

}

$html .= '</table>';
// Tambahkan bagian penutup dengan tanggal dan tanda tangan
$html .= '<p align="right">
    Maumere, ' . date("d F Y") . '<br>
    Mengetahui,<br>
    Kepala Perpustakaan SMA Muhammadiyah Maumere
</p>
<br>
<p align="right" style="margin-top: 20px;">';

$tampil = mysqli_query($koneksi, "SELECT * FROM tb_anggota WHERE status='Kepala Perpus'");
while ($data = mysqli_fetch_array($tampil)) {
    $nama = $data['nama'];

    $html .= '<div style="text-align: right;">';
    $html .= '<span style="text-decoration: underline;">' . $nama . '</span><br>';
    $html .= '</div>';
}

$html .= '</p>';
$html .= '</body></html>';

$dompdf = new Dompdf();
$dompdf->loadHtml($html);
$dompdf->render();
$dompdf->stream("Laporan Pengembalian.pdf", array('Attachment' => false));
?>
