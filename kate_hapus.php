<?php

//panggil koneksi database buku
include "koneksi.php";

	

	$id_kategori = $_GET['id_kategori'];

	//persiapan ubah data
	$hapus = mysqli_query($koneksi, "DELETE FROM tb_kategori WHERE id_kategori = '$id_kategori' ");


	echo "<script>
			document.location='kategori.php';
					</script>";

?>
