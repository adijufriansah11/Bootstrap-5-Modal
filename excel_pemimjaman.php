<?php

    //panggil koneksi database
    include "koneksi.php";

    //Persiapan Untuk Exel
    header("Content-Type: application/vnd-ms-excel");
    header("Content-Disposition: attachment; filename=Data Pemimjaman Buku.xls");
    header("Pragma: no-cache");
    header("Expires: 0");

?>


<p align="center" style="font-weight: bold; font-size: 16pt;">Perpustakaan</p>
<p align="center" style="font-weight: bold; font-size: 16pt;">Sekolah SMA Muhammadiyah Maumere</p>
<p align="center" style="font-weight: bold; font-size: 16pt;">JL.Jendral Sudirman, Kel.Waioti, Kec.Alok Timur, Kab.Sikka, Waioti, Kec. Alok Timur, Kab. Sikka</p>
<p align="center" style="font-weight: bold; font-size: 16pt;">Laporan Pemimjaman Buku</p>
<hr>

<table border="1" align="center">
    <thead>
        <tr width="50"><th>No</th>
        <th width="200">Nama</th>
        <th width="200">No. Identitas</th>
        <th width="200">Judul Buku</th>
        <th width="200">Tanggal Pinjam</th>
        <th width="200">Tanggal kembali</th>
        <th width="200">Status</th>
        </tr>
    </thead>

            <?php

            //persiapan menampilkan data
            $no = 1;
$tampil = mysqli_query($koneksi, "SELECT * FROM tb_pinjam WHERE status='Buku Masih Dipinjam'");
            while ($data = mysqli_fetch_array($tampil)) : 

            ?>
    <tbody>
    <tr>
        <td align="center"><?php echo $no++; ?></td>
        <td align="center"><?php echo $data['nama']; ?></td>
        <th align="center"><?php echo $data['identitas']; ?></th>
        <td align="center"><?php echo $data['judul_buku']; ?></td>
        <td align="center"><?php echo $data['tgl_pinjam']; ?></td>
        <td align="center"><?php echo $data['tgl_kembali']; ?></td>
        <td align="center"><?php echo $data['status']; ?></td>
        </tr>
    </tbody>
    <?php endwhile; ?>
    </table>
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

        echo '<div style="text-align: right;">';
        echo '<span style="text-decoration: underline;">' . $nama . '</span><br>';
        echo '</div>';

        }
        ?>
</p>
</body>
</html>