<?php

//panggil koneksi database buku
include "koneksi.php";


	$id_buku = $_GET['id_buku'];

	//persiapan ubah data
	$hapus = mysqli_query($koneksi, "DELETE FROM tb_buku WHERE id_buku = '$id_buku' ");

			
			echo "<script>
			document.location='buku.php';
					</script>";


?>