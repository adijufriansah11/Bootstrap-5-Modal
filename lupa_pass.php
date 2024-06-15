<?php
    
    //panggil koneksi database
    include "koneksi.php";
    session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Perpustakaan SMA Muhammadiyah Maumere</title>

    <!-- Custom fonts for this template-->
   <!-- Custom fonts for this template-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-white">

    <div class="container">
        <div class="text-center mt-4">
        <h1 class="h3 text mb-4">Sistem Informasi Perpustakaan SMA Muhammadiyah Maumere</h1>
        <img src="img/logo.png" style="width: 65px;">
        </div>
        <!-- Outer Row -->
        <div class="row justify-content-center">
            <div class="col-xl-6 col-lg-6 col-md-9">
                <div class="card o-hidden border-0 shadow-lg my-5" >
                    <div class="card-body p-0" >
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="p-5">
                                    <form method="POST">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <input type="password" class="form-control" id="password_baru" name="password_baru" placeholder="Masukan Password Baru" required>
                                                <button class="btn btn-outline-secondary" type="button" id="toggle-password">
                                                    <i class="fas fa-eye"></i>
                                                </button>
                                            </div>
                                        </div>
                                            <div class="form-group">
                                                <div class="input-group">
                                                <input type="password" class="form-control" id="konfirmasi_password" name="konfirmasi_password" placeholder="konfirmasi Password" required>
                                                 <button class="btn btn-outline-secondary" type="button" id="toggle-password">
                                                    <i class="fas fa-eye"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <hr>
                                        <button type="submit" name="edit_password" class="btn btn-outline-primary btn-user btn-block">
                                           Simpan Perubahan Password
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <?php
if(isset($_POST['edit_password'])) {
    $password_baru = $_POST['password_baru'];
    $konfirmasi_password = $_POST['konfirmasi_password'];
    
    // Validasi password baru
    if($password_baru !== $konfirmasi_password) {
        // Password baru dan konfirmasi password tidak cocok
        echo "<script>
                Swal.fire({
                    title: 'Peringatan!',
                    text: 'Password baru dan konfirmasi password tidak cocok',
                    icon: 'warning'
                }).then(() => {
                    window.location.href = 'profil.php';
                });
            </script>";
    } else {
        // Hash password baru sebelum disimpan
        $hashed_password = password_hash($password_baru, PASSWORD_DEFAULT);
        
        // Simpan password baru ke database
        $id_user = $_SESSION['id_user']; // Sesuaikan dengan session id_user Anda
        $query = "UPDATE tb_user SET password = '$hashed_password' WHERE id_user = '$id_user'";
        $result = mysqli_query($koneksi, $query);
        
        if($result) {
            // Password berhasil diubah
            echo "<script>
                    Swal.fire({
                        title: 'Sukses!',
                        text: 'Password berhasil diubah',
                        icon: 'success'
                    }).then(() => {
                        window.location.href = 'profil.php';
                    });
                </script>";
        } else {
            // Gagal mengubah password
            echo "<script>
                    Swal.fire({
                        title: 'Error!',
                        text: 'Gagal mengubah password',
                        icon: 'error'
                    }).then(() => {
                        window.location.href = 'profil.php';
                    });
                </script>";
        }
    }
}
?>


</body>
</html>