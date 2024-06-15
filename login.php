<?php
    
    //panggil koneksi database
    include "koneksi.php";

    ob_start(); // Aktifkan output buffering
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
                                            <input type="text" class="form-control" name="username" required placeholder="Masukan Email Anda...">
                                        </div>
                                       <div class="form-group">
                                        <div class="input-group">
                                            <input type="password" class="form-control" name="password" id="login" required placeholder="Masukkan kata sandi Anda...">
                                            <span class="input-group-btn">
                                            <button class="btn btn-default" type="button" id="see_password"><i class="fas fa-eye"></i></button></span>
                                        </div>
                                    </div>
                                        <hr>
                                        <button name="login" id="btnLogin" class="btn btn-outline-primary btn-user btn-block">
                                            Login
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

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</body>
</html>

<script>
    $("#see_password").mousedown(function() {
        $('#login').prop('type','text');
    });
    $("#see_password").mouseup(function() {
        $('#login').prop('type','password');
    });
</script>

 <?php
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Hash password input pengguna
    $hashed_password = md5($password);

    // Prevent SQL Injection menggunakan Prepared Statements
    $query = "SELECT * FROM tb_anggota WHERE username=? AND password=?";
    $stmt = mysqli_prepare($koneksi, $query);

    // Bind parameter
    mysqli_stmt_bind_param($stmt, "ss", $username, $hashed_password);

    // Execute statement
    mysqli_stmt_execute($stmt);

    // Get result
    $result = mysqli_stmt_get_result($stmt);

    // Check if there is a matching user
    if (mysqli_num_rows($result) == 1) {
        $data = mysqli_fetch_assoc($result);
        $_SESSION['username'] = $data['username'];
        $_SESSION['nama'] = $data['nama'];
        $_SESSION['foto'] = $data['foto'];

        // Redirect based on user level
        switch ($data['level']) {
            case "admin":
                $_SESSION['level'] = 'admin';
                break;
            case "kepsek":
                $_SESSION['level'] = 'kepsek';
                break;
            case "pengguna":
                $_SESSION['level'] = 'pengguna';
                break;
        }

        // Redirect to index.php and display success message using SweetAlert
        ?>
        <script type="text/javascript">
            Swal.fire({
                position: "center",
                icon: "success",
                title: "Login Berhasil",
                showConfirmButton: false,
                timer: 1500
            }).then(() => {
                window.location.href = 'index.php';
            });
        </script>
        <?php
        exit();
    } else {
        // Jika login gagal, tampilkan SweetAlert
        ?>
        <script type="text/javascript">
            Swal.fire({
                position: "center",
                icon: "error",
                title: "Login Gagal",
                text: "Pastikan, Username atau Password Anda",
                showConfirmButton: true,
                timer: 5000
            });
        </script>
        <?php
    }

    mysqli_close($koneksi);
}

?>


