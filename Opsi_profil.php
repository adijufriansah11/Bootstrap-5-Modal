<?php

//panggil koneksi database buku
include "koneksi.php";

//uji jika tombol Ubah di klik
if(isset($_POST['bedit'])) {

$id_user 		= $_POST['id_user'];
$identitas 		= $_POST['identitas'];
$nama 			= $_POST['nama'];
$username 		= $_POST['username'];
$password 		= $_POST['password'];
$level	 		= $_POST['level'];
$jk 			= $_POST['jk'];
$alamat 		= $_POST['alamat'];
$tempat_lahir 	= $_POST['lahir'];
$status 		= $_POST['status'];
$foto 			= $_FILES['foto']['name'];

		
		$extension_foto = pathinfo($foto, PATHINFO_EXTENSION);
		$size_foto = $_FILES['foto']['size'];

			//menghapus data tanpa menghapus foto
			if(empty($foto)) {
				mysqli_query($koneksi, "UPDATE tb_user SET identitas = '$identitas',
														nama = '$nama',
														username = '$username',
														password = '$password',
														level = '$level',
														jk = '$jk',
														alamat = '$alamat',
														tempat_lahir = '$tempat_lahir',
														status = '$status'
														WHERE id_user = '$id_user'");
						echo "<script>
								alert('Sukses');
									document.location='profil.php';
								</script>";
			} else {
				if (!in_array($extension_foto, array('png', 'jpg', 'jpeg'))) {
					echo "<script>alert('File Tidak Didukung');
    							
    						</script>";
					} else {
						if ($size_foto > 500000) {
							echo "<script>alert('File Terlalu Besar');
				        	document.location='profil.php';
				        </script>";
				    } else {

				    				//menghapus Foto
				    	$tampil = mysqli_query($koneksi, "SELECT * FROM tb_user WHERE id_user = '$id_user'");
                        $data = mysqli_fetch_array($tampil);

    					$foto_lama = $data['foto'];
    					$upload_baru = rand().'_'.$foto;

    					unlink("img/admin/".$foto_lama);

						move_uploaded_file($_FILES['foto']['tmp_name'], "img/admin/".$upload_baru);

						mysqli_query($koneksi, "UPDATE tb_user SET identitas = '$identitas',
														nama = '$nama',
														username = '$username',
														password = '$password',
														level = '$level',
														jk = '$jk',
														alamat = '$alamat',
														tempat_lahir = '$tempat_lahir',
														status = '$status',
														foto = '$upload_baru'
														WHERE id_user = '$id_user'");
						echo "<script>
								alert('Upload Foto Baru Sukses');
									document.location='profil.php';
								</script>";

					}

				    }
			}
				
				
}
?>