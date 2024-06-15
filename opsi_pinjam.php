<?php

//panggil koneksi database buku
include "koneksi.php";


//uji jika tombol simpan di klik
if(isset($_POST['bsimpan'])) {


		$tgl_pinjam = $_POST['tgl_pinjam'];
		$kembali = $_POST['tgl_kembali'];

		$buku = $_POST['tbuku'];
		$pecah_buku = explode(".", $buku);
		$id_buku = $pecah_buku[0];
		$judul_buku = $pecah_buku[1];

		$nama = $_POST['tnama'];
		$pecah_nama = explode(".", $nama);
		$identitas = $pecah_nama[0];
		$nama = $pecah_nama[1];

		$tampil = mysqli_query($koneksi, "SELECT * FROM tb_buku WHERE judul_buku = '$judul_buku'");

		while ($data = mysqli_fetch_array($tampil)){
			$sisa = $data['stok_buku'];

			if ($sisa == 0) {
				?>
					<script type="text/javascript">
						alert("Stok buku Habis, Transaksi Gagal, Silahkan Tambah Stok Buku Terlebih Dahulu");
						document.location="pemimjaman.php";
					</script>
				<?php
	} else {
$tampil = mysqli_query($koneksi, "INSERT INTO tb_transaksi(nama, identitas, judul_buku, tgl_pinjam, tgl_kembali, status)VALUES('$nama', '$identitas', '$judul_buku', '$tgl_pinjam', '$kembali', 'Pinjam')");


$tampil2 = mysqli_query($koneksi, "UPDATE tb_buku SET stok_buku=(stok_buku-1) WHERE id_buku='$id_buku'");

			?>
			    <script type="text/javascript">
			        alert("Simpan Data Berhasil");
			        document.location="pemimjaman.php";
			    </script>
			<?php

	}

		}

}

// Fungsi Kembali

$id_transaksi = $_GET['id_transaksi'];
$judul_buku = $_GET['judul_buku'];


$tampil = mysqli_query($koneksi, "UPDATE tb_transaksi SET status ='kembali' WHERE id_transaksi='$id_transaksi'");

$tampil = mysqli_query($koneksi, "UPDATE tb_buku SET stok_buku=(stok_buku+1) WHERE judul_buku='$judul_buku'");

        ?>
    <script type="text/javascript">
        alert("Buku Berhasil Kembali");
        document.location="pemimjaman.php";
    </script>
    <?php


?>