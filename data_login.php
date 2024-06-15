<?php
    session_start();

    if (isset($_POST['login'])) {
   $username =  $_POST['username'];
   $password =  $_POST['password'];

   $_SESSION['login'] = $_POST['login'];

$login = mysqli_query($koneksi, "SELECT * FROM tb_user WHERE username='$username' AND password='$password' ");
   $cek = mysqli_num_rows($login);

                           if ($cek > 0) {
                            $data = mysqli_fetch_array($login);
                            //jika user adalah admin
                            if ($data['level'] == "admin") {
                                //buat session username dan levelnya
                                $_SESSION['username'] = $data['username'];
                                $_SESSION['level'] = $data['admin'];
                                $_SESSION['nama'] = $data['nama'];
                                $_SESSION['foto'] = $data['foto'];

                                header("location:index.php");

                            } else if ($data['level'] == "kepsek") {
                                $_SESSION['username'] = $data['username'];
                                $_SESSION['level'] = $data['kepsek'];
                                $_SESSION['nama'] = $data['nama'];
                                $_SESSION['foto'] = $data['foto'];

                                header("location:index.php");

                            } else if ($data['level'] == "pengguna") {
                                $_SESSION['username'] = $data['username'];
                                $_SESSION['level'] = $data['pengguna'];
                                $_SESSION['nama'] = $data['nama'];
                                $_SESSION['foto'] = $data['foto'];

                                header("location:index.php");
                            }
                        } else{
                            ?>

                            <script type="text/javascript">
                                alert("Login Gagal, Pastikan Username dan Password Anda.. Silahkan Login Kembali");
                            </script>

                            <?php
                        }
                        }
?>