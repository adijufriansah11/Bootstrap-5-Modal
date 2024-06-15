<?php

//panggil koneksi database buku
include "koneksi.php";


//uji jika tombol simpan di klik
if(isset($_POST['bsimpan'])) {


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

// Validate file extension
if (!in_array($extension_foto, array('png', 'jpg', 'jpeg'))) {
    echo "<script>alert('File Tidak Didukung');
    		document.location='anggota.php';
    		</script>";
} else {
    
    if ($size_foto > 5000000) {
        echo "<script>alert('File Terlalu Besar');
        	document.location='anggota.php';
        </script>";
    } else {
        // Generate a unique filename to avoid overwriting existing files
        $foto_baru = rand().'_'.$foto;

        // Move the uploaded file to the desired location
        $destination = './admin/' . $foto_baru;
        if (move_uploaded_file($_FILES['foto']['tmp_name'], "img/admin/".$foto_baru)); {
            // File uploaded successfully, proceed with database insertion

            // Database connection assumed to be $koneksi

            // Insert data into the database
            $simpan = mysqli_query($koneksi, "INSERT INTO tb_user (identitas, nama, username, password, level, jk, alamat, tempat_lahir, status, foto) VALUES ('$identitas', '$nama', '$username', '$password', '$level', '$jk', '$alamat', '$tempat_lahir', '$status', '$foto_baru')");

            if ($simpan) {
                echo "<script>alert('Simpan Data Sukses!');
                		 document.location='anggota.php';
                </script>";
               
                
            } else {
                echo "<script>alert('Gagal menyimpan data ke database');
                	document.location='anggota.php';
                </script>";
            }
        }
    }
}
}


//uji jika tombol Ubah di klik
if(isset($_POST['bubah'])) {

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
									document.location='anggota.php';
								</script>";
			} else {
				if (!in_array($extension_foto, array('png', 'jpg', 'jpeg'))) {
					echo "<script>alert('File Tidak Didukung');
    							
    						</script>";
					} else {
						if ($size_foto > 500000) {
							echo "<script>alert('File Terlalu Besar');
				        	document.location='anggota.php';
				        </script>";
				    } else {

				    				//menghapus Foto
				    	$tampil = mysqli_query($koneksi, "SELECT * FROM tb_anggota WHERE id_anggota = '$id_anggota'");
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
									document.location='anggota.php';
								</script>";

					}

				    }
			}
				
				
}



//uji jika tombol Hapus di klik
if(isset($_POST['bhapus'])) {
$tampil = mysqli_query($koneksi, "SELECT * FROM tb_user WHERE id_user = '$_POST[id_user]'");
if ($tampil) {
    $data = mysqli_fetch_array($tampil);
    if ($data !== null && isset($data['foto'])) {
        $foto_hapus = $data['foto'];
        unlink("img/gambar/".$foto_hapus);

        // Delete the row after unlinking the file
        $hapus = mysqli_query($koneksi, "DELETE FROM tb_user WHERE id_user ='$_POST[id_user]' ");
     
   			echo "<script>
							alert('hapus Data Sukses!');
									document.location='anggota.php';
									</script>";
}


}
}


?>