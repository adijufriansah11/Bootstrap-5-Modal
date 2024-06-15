<?php

// Panggil koneksi database
include "koneksi.php";

session_start(); // Start the session

//cek apakah user sudah login
    if (!isset($_SESSION['level'])) {
    header("location:logout.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Cetak Kartu Anggota</title>

    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

    
</head>

<body onload="window.print();" style="font-family: arial; font-size: 12px;">

     <?php
            $id_user = $_POST['selector']; // Ambil id_user dari form pengguna
            $N = count($id_user);

            // Loop melalui setiap id_user yang dipilih
            for ($i = 0; $i < $N; $i++) {
                // Persiapan menampilkan data
                $no = 1;
                $tampil = mysqli_query($koneksi, "SELECT * FROM tb_anggota WHERE id_user='$id_user[$i]' AND level='pengguna'");
                // Cek apakah ada baris hasil dari kueri
                if (mysqli_num_rows($tampil) > 0) {
                    // Tampilkan data pengguna yang memiliki level 'pengguna'
                    while ($data = mysqli_fetch_array($tampil)) {
            ?>

<div style="width: 850px; height: 260px; margin-bottom: 0px; padding:; background-image: url('img/balangko.png');">

    <img style="border-radius: 6px;border: 1px solid #222; position: absolute;margin-left: 30px;margin-top: 90px; width: 90px; height: 110px;overflow: hidden;" class="img-responsive img" src="img/pengguna/<?= $data['foto'] ?>">

    <img style="position: absolute;margin-left: 40px;margin-top: 15px; width: 35px;" src="img/logo.png">

    <p style="color: #fff;position: absolute;padding-left: 85px;padding-top: 7px; width:400px; height: 20px;text-transform: uppercase;text-align: center;letter-spacing: 2px;">
        <b>Kartu Anggota Perpustakaan</b> <br>
        SMA Muhammadiyah Waioty  <br>
    </p>

    <p style="color: #fff;position: absolute;padding-left: 85px;padding-top: 50px; width:400px; height: 10px;text-transform: uppercase;text-align: center;letter-spacing: 2px;font-size: 8px;">
    <b>JL.Jendral Sudirman, Kel.Waioti, Kec.Alok Timur, Kab.Sikka</b> <br>
</p>


    <p style="letter-spacing: 2px;margin-left: 150px;padding-top: 90px;width: 240px; text-align: left; font-size: 15px"><b>KARTU PERPUSTAKAAN</b></p>

    <p style="font-family: arial;font-size: 9px;position: absolute;margin-left: 35px;margin-top: 80px;width: 83px;height:30px;text-align:center;position: center;float: center"><?php
                $tanggal = date ("j");
                $bulan = array(1=>"Januari","Februari","Maret", "April", "Mei", "Juni","Juli","Agustus","September","Oktober", "November","Desember");
                $bulan = $bulan[date("n")];
                $tahun = date("Y");
                $thn = $tahun+1;
            ?>Berlaku Hingga:<br><b><?php echo $tanggal ." ". $bulan ." ". $thn;?></b></p>

<table cellspacing="0em" style="margin-top: -10px; padding-left: 150px; margin-left: 150px;position: relative;font-family: arial;font-size: 10px;transition-property: 500px;width: 390px;height: 130px;">

                <tbody><tr>
                    <th style="width: 80px;">No. Identitas</th>
                    <td>:</td>
                    <td><?= $data['identitas'] ?></td>
                </tr> 
                <tr>
                    <th>Nama</th>
                    <td>:</td>
                    <td><?= $data['nama'] ?></td>
                </tr> 
                <tr>
                    <th>TTL</th>
                    <td>:</td>
                    <td><?= $data['tempat_lahir'] ?></td>
                </tr>
                <tr>
                    <th>Alamat</th>
                    <td>:</td>
                    <td><?= $data['alamat'] ?></td>
                </tr>
                <tr>
                    <th>JK</th>
                    <td>:</td>
                    <td><?= $data['jk'] ?></td>
                </tr>
                <tr>
                    <th>Status</th>
                    <td>:</td>
                    <td><?= $data['status'] ?></td>
                </tr>
            </tbody></table>
            <p style="margin-top: -220px;padding-left: 560px;padding-top: 10px;font-size: 11px;">
            <b style="font-size: 12px;">TATA TERTIB PERPUSTAKAAN</b>
            </p><ol style="padding-left: 480px;font-family: arial;font-size: 10px;text-align: justify;padding-right: 25px;margin-top: -8px;">
              <li>Berpakaian sopan dan tidak diperkenankan memakai kaos oblong, jaket dan sandal.</li>
                      <li>Mengisi daftar pengunjung yang sudah disediakan.</li>
                      <li>Tidak diperkenankan membawa senjata tajam ke ruang perpustakaan.</li>
                      <li>Menjaga kerapihan bahan pustaka, kebersihan, keamanan dan ketenangan belajar.</li>
            </ol>
            <p style="margin-left: 490px; font-family: arial; font-size: 10px; text-align: justify; padding-right: 30px; width: 35%; height: 40px; text-align: right;">
                Maumere , <?php echo date("d F Y"); ?>
            </p>
            <p style="margin-left: 650px; font-family: arial; font-size: 10px; text-align: justify; padding-right: 40px; width: 20%; height: 10px; margin-top: -45px;">
                Mengetahui,<br>
                <b>Kepala Perpustakaan</b><br><br>
               <?php echo isset($_SESSION['nama']) ? $_SESSION['nama'] : ''; ?>
                <?php if (isset($_SESSION['level']) && $_SESSION['level'] == 'admin') { ?>
                     <br>
                <?php } ?>
            </p>
            <img style="margin-left: 590px; font-family: arial; font-size: 10px; text-align: justify; padding-right: 15px; width: 9%; margin-top: -14px; position: absolute;" src="img/ttd1.png">

</div>
</body>
</html>
<?php }}}?>

