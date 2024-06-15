<?php

    //panggil koneksi database
    include "koneksi.php";

    //Persiapan Untuk Exel
    header("Content-Type: application/vnd-ms-excel");
    header("Content-Disposition: attachment; filename=Laporan Data Buku.xls");
    header("Pragma: no-cache");
    header("Expires: 0");

?>

<p align="center" style="font-weight: bold; font-size: 16pt;">Perpustakaan</p>
<p align="center" style="font-weight: bold; font-size: 16pt;">Sekolah SMA Muhammadiyah Waioty</p>
<p align="center" style="font-weight: bold; font-size: 16pt;">JL.Jendral Sudirman, Kel.Waioti, Kec.Alok Timur, Kab.Sikka,</p>
<p align="center" style="font-weight: bold; font-size: 16pt;">Laporan Data Buku</p>
<hr>

<table border="1" align="center">
        <thead>
                <tr>
                <th width="50">No</th>
                <th width="200">Judul Buku</th>
                <th width="200">Kategori</th>
                <th width="200">Pengarang</th>
                <th width="200">Penerbit</th>
                <th width="200">Tahun</th>
                <th width="200">Stok Buku</th>
                </tr>
                </thead>

                                        <?php

                                    //persiapan menampilkan data
                                $no = 1;
                                $tampil = mysqli_query($koneksi, "SELECT * FROM tb_buku, tb_kategori WHERE tb_buku.id_kategori = tb_kategori.id_kategori");
                                while ($data = mysqli_fetch_array($tampil)) : 

                                        ?>

                <tbody>
                <tr>
                <td align="center"><?= $no++ ?></td>
                <td align="center"><?= $data['judul_buku'] ?></td>
                <td align="center"><?= $data['kategori'] ?></td>
                <td align="center"><?= $data['pengarang'] ?></td>
                <td align="center"><?= $data['penerbit'] ?></td>
                <td align="center"><?= $data['tahun'] ?></td>
                <td align="center"><?= $data['stok_buku'] ?></td>
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


