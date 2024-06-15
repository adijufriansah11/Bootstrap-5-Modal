<?php
// Panggil koneksi database
include "koneksi.php";
require "vendor/dompdf/autoload.inc.php"; // Ubah sesuai dengan path yang benar

use Dompdf\Dompdf;

// Persiapan menampilkan data
$no = 1;
$tampil = mysqli_query($koneksi, "SELECT * FROM tb_buku, tb_kategori WHERE tb_buku.id_kategori = tb_kategori.id_kategori");

// Buat konten HTML untuk laporan
$pdf = '<html><head><style>
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

$pdf .= '<img src="img/logo.png" style="float: left; height: 75px;">'; // Ubah sesuai dengan path logo Anda
$pdf .= '<div class="container" style="margin: auto;">'; // Memperbaiki margin
$pdf .= '<div style="font-size: 20px">Perpustakaan</div>';
$pdf .= '<div style="font-size: 20px">SMA Muhammadiyah Maumere</div>';
$pdf .= '<div style="font-size: 12px">JL.Jendral Sudirman, Kel.Waioti, Kec.Alok Timur, Kab.Sikka, Waioti, Kec. Alok Timur, Kab. Sikka</div>';
$pdf .= '</div>';
$pdf .= '<hr style="border: 0.4px solid black; clear: both;">'; // Garis bawah di bawah logo

$pdf .= '<div style="font-size: 20px; margin-bottom: 20px;" align="center">Laporan Buku</div>'; // Menambahkan spasi ke bawah
$pdf .= '<table style="margin-top: 20px;">'; // Menambahkan spasi ke atas pada tabel
$pdf .= '<tr>';
$pdf .= '<th>No</th>';
$pdf .= '<th>Judul Buku</th>';
$pdf .= '<th>Kategori</th>';
$pdf .= '<th>Pengarang</th>';
$pdf .= '<th>Penerbit</th>';
$pdf .= '<th>Tahun</th>';
$pdf .= '<th>Jumlah Buku</th>';
$pdf .= '</tr>';


// Loop untuk setiap data transaksi
while ($data = mysqli_fetch_array($tampil)) {
    $judul_buku = $data['judul_buku'];
    $kategori = $data['kategori'];
    $pengarang = $data['pengarang'];
    $penerbit = $data['penerbit'];
    $tahun = $data['tahun'];
    $stok_buku = $data['stok_buku'];

    // Tambahkan baris data ke dalam tabel pdf
    $pdf .= '<tr>';
    $pdf .= '<td>' . $no++ . '</td>';
    $pdf .= '<td>' . $judul_buku . '</td>';
    $pdf .= '<td>' . $kategori . '</td>';
    $pdf .= '<td>' . $pengarang . '</td>';
    $pdf .= '<td>' . $penerbit . '</td>';
    $pdf .= '<td>' . $tahun . '</td>';
    $pdf .= '<td>' . $stok_buku . '</td>';
    $pdf .= '</tr>';
}

$pdf .= '</table>';

// Tambahkan bagian penutup dengan tanggal dan tanda tangan
$pdf .= '<p align="right">
    Maumere, ' . date("d F Y") . '<br>
    Mengetahui,<br>
    Kepala Perpustakaan SMA Muhammadiyah Maumere
</p>
<br>
<p align="right" style="margin-top: 20px;">';

$tampil = mysqli_query($koneksi, "SELECT * FROM tb_anggota WHERE status='Kepala Perpus'");
while ($data = mysqli_fetch_array($tampil)) {
    $nama = $data['nama'];

    $pdf .= '<div style="text-align: right;">';
    $pdf .= '<span style="text-decoration: underline;">' . $nama . '</span><br>';
    $pdf .= '</div>';

$pdf .= '</p>';
$pdf .= '</body></html>';

// Buat objek Dompdf dan proses rendering
$dompdf = new Dompdf();
$dompdf->loadHtml($pdf);
$dompdf->setPaper('A4', 'portrait');
$dompdf->render();

// Tampilkan atau unduh file PDF
$dompdf->stream("Laporan Buku.pdf", array('Attachment' => true));

}
?>
