<?php

//panggil koneksi database buku
include "koneksi.php";


//uji jika tombol simpan di klik
if(isset($_POST['bsimpan'])) {

	//persiapan data baru
	$simpan = mysqli_query($koneksi, "INSERT INTO tb_buku (judul_buku, id_kategori, pengarang, penerbit, tahun, stok_buku)
									VALUES ('$_POST[tjudul]',
											'$_POST[tkt]',
											'$_POST[tpengarang]',
											'$_POST[tpenerbit]',
											'$_POST[ttahun]',
											'$_POST[tstok]') ");


	//jika berhsil disimpan
    if ($simpan) {
    	
    		echo "<script>
			alert('Tambah Data Sukses!');
			document.location='buku.php';
					</script>";

	} else	{
		echo "<script>
			alert('Tambah Data Gagal !');
			document.location='buku.php';
					</script>";
}

}


//uji jika tombol Ubah di klik
if(isset($_POST['bubah'])) {

	//persiapan ubah data
	$ubah = mysqli_query($koneksi, "UPDATE tb_buku SET

												judul_buku = '$_POST[tjudul]',
												id_kategori = '$_POST[tkt]',
												pengarang = '$_POST[tpengarang]',
												penerbit = '$_POST[tpenerbit]',
												tahun = '$_POST[ttahun]',
												stok_buku = '$_POST[tstok]'
												WHERE id_buku = '$_POST[id_buku]'
												");


	//jika berhsil diubah
	if ($ubah) {	
			echo "<script>
			alert('Ubah Data Sukses!');
			document.location='buku.php';
					</script>";

	} else	{
		echo "<script>
			alert('Ubah Data Gagal !');
			document.location='buku.php';
					</script>";
	}
}


?>


