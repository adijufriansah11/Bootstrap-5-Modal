<?php

//panggil koneksi database Kategori
include "koneksi.php";


//uji jika tombol simpan di klik
if(isset($_POST['bsimpan'])) {

	//persiapan data baru
	$simpan = mysqli_query($koneksi, "INSERT INTO tb_kategori (kategori)
														VALUES (
														'$_POST[tkt]'
														)");


	//jika berhsil disimpan
	if ($simpan) {	
			echo "<script>
			alert('Simpan Data Sukses!');
			document.location='kategori.php';
					</script>";

	} else	{
		echo "<script>
			alert('Simpan Data Gagal !');
			document.location='kategori.php';
					</script>";
	}
}


//uji jika tombol Ubah di klik
if(isset($_POST['bubah'])) {

	//persiapan ubah data
	$ubah = mysqli_query($koneksi, "UPDATE tb_kategori SET
												kategori = '$_POST[tkt]'
												WHERE id_kategori = '$_POST[id_kategori]'
												");


	//jika berhsil diubah
	if ($ubah) {	
			echo "<script>
			alert('Ubah Data Sukses!');
			document.location='kategori.php';
					</script>";

	} else	{
		echo "<script>
			alert('Ubah Data Gagal !');
			document.location='kategori.php';
					</script>";
	}
}


//uji jika tombol Hapus di klik
if(isset($_POST['bhapus'])) {

	//persiapan ubah data
	$hapus = mysqli_query($koneksi, "DELETE FROM tb_kategori WHERE id_kategori = '$_POST[id_kategori]' ");


	//jika berhsil dihapus
	if ($hapus) {	
			echo "<script>
			alert('hapus Data Sukses!');
			document.location='kategori.php';
					</script>";

	} else	{
		echo "<script>
			alert('hapus Data Gagal !');
			document.location='kategori.php';
					</script>";
	}
}

?>