<?php
    include "koneksi.php";
    session_start(); // Mulai sesi

    if (isset($_POST['login'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        // Periksa koneksi database
        if (!$koneksi) {
            die("Koneksi database gagal: " . mysqli_connect_error());
        }

        $login = mysqli_query($koneksi, "SELECT * FROM tb_anggota WHERE username='$username' AND password='$password'");
        $cek = mysqli_num_rows($login);

        if ($cek > 0) {
            $data = mysqli_fetch_array($login);
            // Jika user adalah admin
            if ($data['level'] == "admin") {
                // Buat sesi username, level, nama, identitas, dan foto
                $_SESSION['username'] = $data['username'];
                $_SESSION['level'] = $data['level'];
                $_SESSION['nama'] = $data['nama'];
                $_SESSION['identitas'] = $data['identitas'];
                $_SESSION['foto'] = $data['foto'];
                header("location:index.php");
            } elseif ($data['level'] == "kepsek") {
                $_SESSION['username'] = $data['username'];
                $_SESSION['level'] = $data['level'];
                header("location:index.php");
            } elseif ($data['level'] == "pengguna") {
                $_SESSION['username'] = $data['username'];
                $_SESSION['level'] = $data['level'];
                header("location:index.php");
            }
        } else {
?>
            <script type="text/javascript">
                alert("Login Gagal, Pastikan Username dan Password Anda.. Silahkan Login Kembali");
            </script>
<?php
        }
    }
?>
