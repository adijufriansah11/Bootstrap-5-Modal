<?php

    //panggil koneksi database
    include "koneksi.php";

    session_start(); // Start the session


//cek apakah user sudah login
    if (!isset($_SESSION['level'])) {
    header("location:logout.php");

}

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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

   <!-- Custom fonts for this template-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

            <!-- Sweet Alert-->
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.6/dist/sweetalert2.min.css" rel="stylesheet">


</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
                <div class="sidebar-brand-icon">
                    <img src="img/logo.png" width="40">
                </div>
                 <div class="sidebar-brand-text mx-1 mt-3"><H6>SISPUS SMA MUHAMMADIYAH</H6></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="index.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>D A S H B O A R D</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                <B>DATA MASTER</B>
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-book-open"></i>
                    <span><B> DATA BUKU</B></span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header"><B>DATA BUKU:</B></h6>
                        <a class="collapse-item" href="buku.php"><B>BUKU</B></a>

                    <?php if ($_SESSION['level'] == 'admin') { ?>
                        <a class="collapse-item" href="kategori.php"><B>KATEGORI</B></a>
                         <?php } ?>
                    </div>
                </div>
            </li>
            
            <!-- Nav Item - Utilities Collapse Menu -->
             <?php if ($_SESSION['level'] == 'admin') { ?>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fa-solid fa-user"></i>
                    <span><B>DATA PENGGUNA</B></span>
                </a>
                <?php } ?>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header"><B>DATA PENGGUNA:</B></h6>
                        <?php if ($_SESSION['level'] == 'admin') { ?>
                        <a class="collapse-item" href="admin.php"><B>ADMIN</B></a>
                        <?php } ?>

                        <?php if ($_SESSION['level'] == 'admin') { ?>
                        <a class="collapse-item" href="anggota.php"><B>ANGGOTA</B></a>
                        <?php } ?>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Charts -->
            <?php if ($_SESSION['level'] == 'admin') { ?>
            <li class="nav-item">
                <a class="nav-link" href="cetak_kartu.php">
                    <i class="fa-solid fa-print"></i>
                    <span><B>KARTU ANGGOTA</B></span></a>
            </li>
             <?php } ?>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <?php if ($_SESSION['level'] == 'admin') { ?>
            <div class="sidebar-heading">
                <B>TRANSAKSI</B>
            </div>
            <?php } ?>

            <!-- Nav Item - Utilities Collapse Menu -->
             <?php if ($_SESSION['level'] == 'admin') { ?>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#transaksi"
                    aria-expanded="true" aria-controls="transaksi">
                    <i class="fa-solid fa-user"></i>
                    <span><B>DATA TRANSAKSI</B></span>
                </a>
                <div id="transaksi" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header"><B>DATA TRANSAKSI:</B></h6>
                        <a class="collapse-item" href="pemimjaman.php"><B>PEMIMJAMAN</B></a>
                        <a class="collapse-item" href="pemimjaman.php"><B>PENGEMBALIAN</B></a>
                    </div>
                </div>
            </li>
             <?php } ?>

            <!-- Nav Item - Tables -->
             <?php if ($_SESSION['level'] == 'admin' || $_SESSION['level'] == 'pengguna') { ?>
            <li class="nav-item">
                <a class="nav-link" href="Pengembalian.php">
                    <i class="fa-solid fa-cart-shopping"></i>
                    <span><B>DATA PENGEMBALIAN</B></span></a>
            </li>
            <?php } ?>

            <!-- Nav Item - Utilities Collapse Menu -->
             <?php if ($_SESSION['level'] == 'admin') { ?>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#laporan"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fa-solid fa-user"></i>
                    <span><B>LAPORAN</B></span>
                </a>
                <?php } ?>
                <div id="laporan" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header"><B>DATA LAPORAN:</B></h6>
                        <?php if ($_SESSION['level'] == 'kepsek') { ?>
                        <a class="collapse-item" href="lap_buku.php"><B>LAPORAN BUKU</B></a>
                        <?php } ?>

                        <?php if ($_SESSION['level'] == 'kepsek') { ?>
                        <a class="collapse-item" href="lap_pinjam.php"><B>LAP. PEMIMJAMAN</B></a>
                        <?php } ?>

                        <?php if ($_SESSION['level'] == 'kepsek') { ?>
                        <a class="collapse-item" href="lap_kembali.php"><B>LAP. PENGEMBALIAN</B></a>
                        <?php } ?>
                    </div>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                 <!-- Topbar -->
            <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!--Awal Waktu-->
                    <span id="current-time"></span>
                    <script>
                    // Fungsi untuk menampilkan waktu yang terus berubah
                    function displayTime() {
                        // Dapatkan elemen span dengan ID "current-time"
                        var currentTimeElement = document.getElementById('current-time');
                        
                        // Dapatkan waktu saat ini
                        var currentTime = new Date();
                        
                        // Format waktu menjadi jam:menit:detik
                        var formattedTime = currentTime.getHours() + ":" + 
                                            currentTime.getMinutes() + ":" + 
                                            currentTime.getSeconds();
                        
                        // Masukkan waktu yang diformat ke dalam elemen span
                        currentTimeElement.textContent = formattedTime;
                    }

                    // Panggil fungsi displayTime setiap detik
                    setInterval(displayTime, 1000); // 1000 milliseconds = 1 detik
                    </script>
                    <!--Akhir Waktu-->

                    <span>&nbsp;&nbsp;</span> <!-- Elemen HTML untuk memisahkan waktu dan tanggal -->

                    <!--Awal Tanggal-->
                    <span id="current-date"></span>
                    <script>
                    // Fungsi untuk menampilkan tanggal yang terus berubah
                    function displayDate() {
                        // Dapatkan elemen span dengan ID "current-date"
                        var currentDateElement = document.getElementById('current-date');
                        
                        // Dapatkan tanggal saat ini
                        var currentDate = new Date();
                        
                        // Format tanggal menjadi tanggal, bulan, tahun
                        var formattedDate = currentDate.getDate() + "-" + 
                                            (currentDate.getMonth() + 1) + "-" + // Ingat bahwa bulan dimulai dari 0
                                            currentDate.getFullYear();
                        
                        // Masukkan tanggal yang diformat ke dalam elemen span
                        currentDateElement.textContent = formattedDate;
                    }

                    // Panggil fungsi displayDate saat halaman dimuat dan setiap kali tanggal berubah
                    displayDate();
                    </script>
                    <!--Akhir Tanggal-->

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                           <span class="mr-2 d-lg-inline text-gray-600 small">Hai, 
                            <?php echo $_SESSION['nama'] ?>
                            </span>

                           <?php if ($_SESSION['level'] == 'admin' || $_SESSION['level'] == 'kepsek') { ?>
                                <img class="img-profile rounded-circle" src="img/admin/<?php echo $_SESSION['foto'] ?>">
                            <?php } elseif ($_SESSION['level'] == 'pengguna') { ?>
                                <img class="img-profile rounded-circle" src="img/pengguna/<?php echo $_SESSION['foto'] ?>">
                            <?php } ?>

                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown" style="width: 300px;">
                                <div class="text-center btn-outline-success"><h6>Anda Login sebagai <?php echo $_SESSION['level'] ?></h6>
                                </div>

                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="profil.php">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profil 
                                </a>

                               <!--  <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="login.php" data-toggle="modal" data-target="#logoutModal">
                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Keluar
                                </a> -->
                            </div>
                        </li>
                    </ul>

                </nav>
                <!-- End of Topbar -->

                 <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800"><B> A N G G O T A</B></h1>
                    </div>

                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <!-- Button trigger modal -->
                            <?php if ($_SESSION['level'] == 'admin') { ?>
                            <button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#modalTambah"><i class="fa-solid fa-user-plus mr-1"></i>
                             TAMBAHKAN ANGGOTA
                            </button>
                            <?php } ?>

                    <!-- Awal Modal Tambah -->
                    <div class="modal fade" id="modalTambah" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                      <div class="modal-dialog modal-xl">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h1 class="modal-title fs-5" id="staticBackdropLabel"> TAMBAHKAN DATA ANGGOTA </h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>

                            <form method="POST" action="" enctype="multipart/form-data">
                                <div class="row modal-body">
                                <div class="col-6">
                                  <label class="form-label">No. Identitas</label>
                                  <input type="number" class="form-control" name="identitas" required placeholder="Silahkan Input No Identitas Anda">
                                </div>

                                <div class="col-6">
                                  <label class="form-label">Nama Lengkap</label>
                                  <input type="text" class="form-control" name="nama" required>
                                </div>

                                <div class="col-6">
                                  <label class="form-label">Username</label>
                                  <input type="text" class="form-control" name="username"  required>
                                </div>

                                <div class="col-6">
                                    <label class="form-label">Password</label>
                                    <div class="input-group">
                                        <input type="password" class="form-control" name="password" id="passwordInput" pattern="^(?=.*[a-zA-Z])(?=.*\d).{8,}$" title="Password harus terdiri dari huruf dan angka minimal 8 karakter" required>
                                        <button type="button" class="btn btn-outline-secondary" id="togglePassword">
                                            <i class="fa fa-eye" aria-hidden="true"></i>
                                        </button>
                                    </div>
                                    <span class="text-danger" id="password-warning" style="display: none;">Password harus terdiri dari huruf dan angka minimal 8 karakter.</span>
                                </div>
                                <script>
                                    // Mendapatkan referensi ke input password
                                    var passwordInput = document.querySelector('input[name="password"]');
                                    // Mendapatkan referensi ke elemen span peringatan
                                    var passwordWarning = document.getElementById('password-warning');

                                    // Event listener untuk memeriksa setiap kali input password berubah
                                    passwordInput.addEventListener('input', function() {
                                        // Memeriksa apakah nilai password sesuai dengan pola yang ditetapkan
                                        if (!passwordInput.validity.patternMismatch || passwordInput.value.length === 0) {
                                            // Jika password memenuhi kriteria, sembunyikan pesan peringatan
                                            passwordWarning.style.display = 'none';
                                        } else {
                                            // Jika password tidak memenuhi kriteria, tampilkan pesan peringatan
                                            passwordWarning.style.display = 'block';
                                        }
                                    });
                                </script>

                                <div class="col-6">
                                  <label class="form-label">Level</label>
                                  <select class="form-control" name="level">
                                      <option> Silahkan Input</option>
                                      <option value="pengguna"<?php if(isset($_SESSION['level']) && $_SESSION['level'] == 'pengguna') echo ' selected'; ?>>Pengguna</option>
                                  </select>
                                </div>

                                <div class="col-6">
                                  <label class="form-label">Jenis Kelamin</label>
                                  <select class="form-control" name="jk" required>
                                      <option> Silahkan Input Jenis Kelamin Anda</option>
                                      <option value="laki-laki">laki-laki</option>
                                      <option value="Perempuan">Perempuan</option>
                                  </select>
                                </div>

                                <div class="col-6">
                                  <label class="form-label">Alamat</label>
                                  <input type="text" class="form-control" name="alamat" required>
                                </div>

                                <div class="col-6">
                                  <label class="form-label">Tempat/Tanggal Lahir</label>
                                  <input type="text" class="form-control" name="lahir"  required>
                                </div>

                                <div class="col-6">
                                  <label class="form-label">Status</label>
                                  <select class="form-control" name="status" required>
                                      <option> Silahkan Input Status Anda</option>
                                      <option value="siswa/i">Siswa/i</option>
                                      <option value="Pegawai">Pegawai</option>
                                  </select>
                                </div>

                                <div class="col-6">
                                  <label class="form-label">Foto</label>
                                  <input type="file" class="form-control-file" name="foto"  required>
                                </div>

                          </div>
                          <div class="modal-footer">
                            <button type="submit" class="btn btn-outline-success" name="bsimpan"> SIMPAN </button>
                            <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal"> KEMBALI </button>
                          </div>
                          </form>
                        </div>
                      </div>
                    </div>
                    <!-- Akhir Modal Tambah -->
                    </div>

                        <div class="card-body">
                            <div class="table-responsive">

                                <?php
                                $no = 1;
                                    $levels = array('pengguna'); // Define the levels
                                    foreach ($levels as $level) {
                                        // Fetch data for the current level
                                        $tampil = mysqli_query($koneksi, "SELECT * FROM tb_anggota WHERE level='$level'");
                                        ?>

                                <table class="table table-striped table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr><th>No</th>
                                            <th>Identitas</th>
                                            <th>Nama Lengkap</th>
                                            <th>Username</th>
                                            <th>Status</th>
                                            <th>Level</th>
                                            <th>Foto</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    <?php while ($data = mysqli_fetch_array($tampil)) : ?>
                    
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $data['identitas'] ?></td>
                                            <td><?= $data['nama'] ?></td>
                                            <td><?= $data['username'] ?></td>
                                            <td><?= $data['status'] ?></td>
                                            <td><?= $data['level'] ?></td>
                                            <td>
                                                <img style="width: 70px;" src="img/pengguna/<?= $data['foto'] ?>">
                                            </td>
                                             <td>
    <?php if ($_SESSION['level'] == 'admin') { ?>
        <div class="d-flex justify-content-between">
            <a href="#" class="btn btn-outline-primary text-center rounded mx-1" data-toggle="tooltip" title="DETAIL" data-bs-toggle="modal" data-bs-target="#modalDetail<?= $no ?>"><i class="fa-regular fa-eye"></i></a>

            <a href="#" class="btn btn-outline-secondary text-center rounded mx-1" data-toggle="tooltip" title="UPDATE" data-bs-toggle="modal" data-bs-target="#modalUbah<?= $no ?>"><i class="fa-solid fa-pen-to-square"></i></a>

            <a href="#" class="btn btn-outline-danger text-center rounded mx-1" data-toggle="tooltip" title="DELETE" data-bs-toggle="modal" data-bs-target="#modalHapus<?= $no ?>"><i class="fa-regular fa-trash-can"></i></a>

            <a href="#" class="btn btn-outline-warning text-center rounded mx-1" data-toggle="tooltip" title="UPDATE PASSWORD" data-bs-toggle="modal" data-bs-target="#modalPassword<?= $no ?>"><i class="fa-solid fa-lock"></i></a>
        </div>
    <?php } ?>
</td>

                                        </tr>

                    <!-- Awal Modal Detail -->
                    <div class="modal fade" id="modalDetail<?= $no ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                      <div class="modal-dialog  modal-xl">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h1 class="modal-title fs-5" id="staticBackdropLabel"> DETAIL ANGGOTA </h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                            <form method="POST" action="opsi_anggota.php" enctype="multipart/from-data">
                                <input type="hidden" name="id_user" value="<?= $data['id_user']?>">
                                <div class="row modal-body">
                                    <div class="col-2">
                                  <label class="form-label">Foto</label>
                                  <div>
                                    <img style="width: 70px;" src="img/pengguna/<?= $data['foto'] ?>">
                                    </div>
                                </div>

                                <div class="col-2">
                                  <label class="form-label">No. Identitas</label>
                                  <input type="number" class="form-control" name="identitas" value="<?= $data['identitas'] ?>" readonly>
                                </div>

                                <div class="col-2">
                                  <label class="form-label">Nama Lengkap</label>
                                  <input type="text" class="form-control" name="nama" value="<?= $data['nama'] ?>" readonly>
                                </div>

                                 <div class="col-2">
                                  <label class="form-label">Username</label>
                                  <input type="text" class="form-control" name="username" value="<?= $data['username'] ?>" readonly>
                                </div>

                                <!-- <div class="col-3">
                                    <label class="form-label">Password</label>
                                    <input type="password" class="form-control" name="password" pattern="^(?=.*[a-zA-Z])(?=.*\d).{8,}$" title="Password harus terdiri dari huruf dan angka minimal 8 karakter" required value="<?= $data['password'] ?>" readonly>
                                    <span class="text-danger" id="password-warning" style="display: none;">Password harus terdiri dari huruf dan angka minimal 8 karakter.</span>
                                </div>

                                <script>
                                    // Mendapatkan referensi ke input password
                                    var passwordInput = document.querySelector('input[name="password"]');
                                    // Mendapatkan referensi ke elemen span peringatan
                                    var passwordWarning = document.getElementById('password-warning');

                                    // Memeriksa apakah input password memiliki nilai awal
                                    var originalPassword = '<?= $data['password'] ?>';
                                    var isOriginalPassword = (passwordInput.value === originalPassword);

                                    // Event listener untuk memeriksa setiap kali input password berubah
                                    passwordInput.addEventListener('input', function() {
                                        // Memeriksa apakah nilai password sesuai dengan pola yang ditetapkan
                                        if (!passwordInput.validity.patternMismatch || passwordInput.value.length === 0 || isOriginalPassword) {
                                            // Jika password memenuhi kriteria atau merupakan nilai awal, sembunyikan pesan peringatan
                                            passwordWarning.style.display = 'none';
                                        } else {
                                            // Jika password tidak memenuhi kriteria, tampilkan pesan peringatan
                                            passwordWarning.style.display = 'block';
                                        }
                                    });
                                </script> -->
                                
                                <div class="col-2">
                                  <label class="form-label">Level</label>
                                  <input type="text" class="form-control" name="level" value="<?= $data['level'] ?>" readonly>
                                </div>

                                <div class="col-2">
                                  <label class="form-label">Jenis Kelamin</label>
                                  <input type="text" class="form-control" name="jk" value="<?= $data['jk'] ?>" readonly>
                                </div>

                                <div class="col-2">
                                  <label class="form-label">Alamat</label>
                                  <input type="text" class="form-control" name="alamat" value="<?= $data['alamat'] ?>" readonly>
                                </div>

                                <div class="col-2">
                                  <label class="form-label">Tempat/TanggalLahir</label>
                                  <input type="text" class="form-control" name="lahir" value="<?= $data['tempat_lahir'] ?>" readonly>
                                </div>

                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-outline-info" data-bs-dismiss="modal"> KEMBALI </button>
                          </div>
                          </form>
                        </div>
                      </div>
                    </div>
                    <!-- Akhir Modal Detail -->

                    <!-- Awal Modal Ubah -->
                    <div class="modal fade" id="modalUbah<?= $no ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                      <div class="modal-dialog modal-xl">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h1 class="modal-title fs-5" id="staticBackdropLabel"> UPDATE DATA ANGGOTA </h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                            <form method="POST" action="" enctype="multipart/form-data">
                                <input type="hidden" name="id_user" value="<?= $data['id_user']?>">
                                <div class="row modal-body">
                                <div class="col-3">
                                  <label class="form-label">No. Identitas</label>
                                  <input type="number" class="form-control" name="identitas" required value="<?= $data['identitas'] ?>" placeholder="Wajib Disi !!!">
                                </div>

                                <div class="col-3">
                                  <label class="form-label">Nama Lengkap</label>
                                  <input type="text" class="form-control" name="nama" required value="<?= $data['nama'] ?>">
                                </div>

                                 <div class="col-3">
                                  <label class="form-label">Username</label>
                                  <input type="text" class="form-control" name="username"  required value="<?= $data['username'] ?>">
                                </div>
                            
                                <div class="col-3">
                                  <label class="form-label">Level</label>
                                  <input type="text" class="form-control" name="level" value="<?= $data['level'] ?>" readonly>
                                </div>

                                <div class="col-3">
                                  <label class="form-label">Jenis Kelamin</label>
                                  <select class="form-select" name="jk">
                                      <option value="<?= $data['jk'] ?>"><?= $data['jk'] ?></option>
                                      <option value="laki-laki">laki-laki</option>
                                      <option value="Perempuan">Perempuan</option>
                                  </select>
                                </div>

                                <div class="col-3">
                                  <label class="form-label">Alamat</label>
                                  <input type="text" class="form-control" name="alamat" required value="<?= $data['alamat'] ?>">
                                </div>

                                <div class="col-3">
                                  <label class="form-label">Tempat/Tanggal Lahir</label>
                                  <input type="text" class="form-control" name="lahir" required value="<?= $data['tempat_lahir'] ?>">
                                </div>

                                <div class="col-3">
                                  <label class="form-label">Status</label>
                                  <select class="form-select" name="status" required>
                                      <option value="<?= $data['status'] ?>"><?= $data['status'] ?></option>
                                      <option value="kepalaperpus">Kepala Perpustakaan</option>
                                      <option value="kepsek">Kepala Sekolah</option>
                                      <option value="guru">Guru</option>
                                      <option value="siswa">siswa</option>
                                  </select>
                                </div>

                                <div class="col-3">
                                  <label class="form-label">Foto</label>
                                   <div class="col-4">
                                      <img class="img-fluid rounded-start" style="width: 65px;" src="img/pengguna/<?= $data['foto'] ?>">
                                  </div>
                                  <small class="form-text text-muted">Gambar lama</small>
                                  <input type="file" class="form-control" name="foto">
                                  <small class="form-text text-muted">Pilih foto baru jika ingin mengganti gambar lama.</small>
                                </div>

                          </div>
                          <div class="modal-footer">
                            <button type="submit" class="btn btn-outline-success" name="bubah"> SIMPAN </button>
                          </div>
                          </form>
                        </div>
                      </div>
                    </div>
                    <!-- Akhir Modal Ubah -->

                    <!-- Awal Modal Hapus -->
                    <div class="modal fade" id="modalHapus<?= $no ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h1 class="modal-title fs-5" id="staticBackdropLabel"> HAPUS DATA ANGGOTA </h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                            <form method="POST" action="">
                                <input type="hidden" name="id_user" value="<?= $data['id_user']?>">
                                <div class="row modal-body">
                                    <h5 class="text-center"> Yakin Anda Ingin Menghapus Data Ini <br>
                                        <span class="text-danger"><?= $data['identitas'] ?> - <?= $data['nama'] ?></span>
                                    </h5>
                                
                          </div>
                          <div class="modal-footer">
                            <button type="submit" class="btn btn-outline-success" name="bhapus"> DELETE </button>
                            
                          </div>
                          </form>
                        </div>
                      </div>
                    </div>
                    <!-- Akhir Modal Hapus -->

                    <!-- Modal Update Password -->
<div class="modal fade" id="modalPassword<?= $no ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="passwordModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="passwordModalLabel">UPDATE PASSWORD</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="p-5">
                            <form method="POST">
                                <input type="hidden" name="id_user" value="<?= $data['id_user'] ?>">
                                <div class="form-group">
                                    <div class="input-group">
                                        <input type="password" class="form-control" id="password_baru" name="password" placeholder="Masukkan Password Baru Anda" required pattern="^(?=.*[a-zA-Z])(?=.*\d).{8,}$" title="Password harus terdiri dari huruf dan angka minimal 8 karakter">
                                        <button class="btn btn-outline-secondary" type="button" id="password-toggle"><i class="fas fa-eye"></i></button>
                                    </div>
                                    <span class="text-danger" id="password-warning" style="display: none;">Password harus terdiri dari huruf dan angka minimal 8 karakter.</span>
                                </div>
                                
                                <div class="form-group">
                                    <div class="input-group">
                                        <input type="password" class="form-control" id="konfirmasi_password" name="konfirmasi_password" placeholder="Konfirmasi Password Anda" required pattern="^(?=.*[a-zA-Z])(?=.*\d).{8,}$" title="Password harus terdiri dari huruf dan angka minimal 8 karakter">
                                        <button class="btn btn-outline-secondary" type="button" id="toggle-password"><i class="fas fa-eye"></i></button>
                                    </div>
                                    <span class="text-danger" id="password-warning" style="display: none;">Password harus terdiri dari huruf dan angka minimal 8 karakter.</span>
                                </div>
                                
                                <hr>
                                <button type="submit" name="edit_password" class="btn btn-outline-primary btn-user btn-block">Simpan Perubahan Password</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Skript Password Baru -->
<script>
document.addEventListener("DOMContentLoaded", function() {
    var passwordInput = document.getElementById('password_baru');
    var showPasswordToggle = document.getElementById('password-toggle');
    var passwordWarning = document.getElementById('password-warning');

    showPasswordToggle.addEventListener('click', function() {
        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            showPasswordToggle.innerHTML = '<i class="fas fa-eye-slash"></i>';
        } else {
            passwordInput.type = 'password';
            showPasswordToggle.innerHTML = '<i class="fas fa-eye"></i>';
        }
    });

    passwordInput.addEventListener('input', function() {
        if (!passwordInput.validity.patternMismatch || passwordInput.value.length === 0) {
            passwordWarning.style.display = 'none';
        } else {
            passwordWarning.style.display = 'block';
        }
    });

    var confirmPasswordInput = document.getElementById('konfirmasi_password');
    var togglePasswordButton = document.getElementById('toggle-password');
    var passwordWarningConfirm = document.getElementById('password-warning');

    togglePasswordButton.addEventListener('click', function() {
        if (confirmPasswordInput.type === 'password') {
            confirmPasswordInput.type = 'text';
            togglePasswordButton.innerHTML = '<i class="fas fa-eye-slash"></i>';
        } else {
            confirmPasswordInput.type = 'password';
            togglePasswordButton.innerHTML = '<i class="fas fa-eye"></i>';
        }
    });

    confirmPasswordInput.addEventListener('input', function() {
        if (!confirmPasswordInput.validity.patternMismatch || confirmPasswordInput.value.length === 0) {
            passwordWarningConfirm.style.display = 'none';
        } else {
            passwordWarningConfirm.style.display = 'block';
        }
    });
});
</script>
<!-- Akhir Skript Password Baru -->

                                     <?php endwhile; ?>
                                     </tbody>
                                </table>
                                <?php } ?>
                            </div>
                        </div>
                    </div>

            </div>
            <!-- End of Main Content -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2020</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Logout</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Apakah Anda Ingin Keluar ?</div>
                <div class="modal-footer">
                     <a class="btn btn-outline-danger" href="logout.php">KELUAR</a>
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

    <!-- Sweet Alert-->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Tambah Anggota -->
    <?php
// Uji jika tombol simpan di klik
if(isset($_POST['bsimpan'])) {
    $identitas      = $_POST['identitas'];
    $nama           = $_POST['nama'];
    $username       = $_POST['username'];
    $password       = md5($_POST['password']); // Menggunakan MD5 untuk mengenkripsi kata sandi
    $level          = $_POST['level'];
    $jk             = $_POST['jk'];
    $alamat         = $_POST['alamat'];
    $tempat_lahir   = $_POST['lahir'];
    $status         = $_POST['status'];
    $foto           = $_FILES['foto']['name'];

    $extension_foto = pathinfo($foto, PATHINFO_EXTENSION);
    $size_foto      = $_FILES['foto']['size'];

    // Validate file extension and size
    if (!in_array($extension_foto, array('png', 'jpg', 'jpeg')) || $size_foto > 5000000) {
        ?>
        <script>
            Swal.fire({
                title: "Peringatan!",
                text: "File harus berformat PNG, JPG, atau JPEG dan ukurannya tidak boleh lebih dari 5MB",
                icon: "warning"
            });
        </script>
        <?php
    } else {
        // Generate a unique filename to avoid overwriting existing files
        $foto_baru = rand().'_'.$foto;

        // Move the uploaded file to the desired location
        $destination = './pengguna/' . $foto_baru;
        if (move_uploaded_file($_FILES['foto']['tmp_name'], "img/pengguna/".$foto_baru)) {
            // File uploaded successfully, proceed with database insertion

            // Database connection assumed to be $koneksi

            // Insert data into the database
            $simpan = mysqli_query($koneksi, "INSERT INTO tb_anggota (identitas, nama, username, password, level, jk, alamat, tempat_lahir, status, foto) VALUES ('$identitas', '$nama', '$username', '$password', '$level', '$jk', '$alamat', '$tempat_lahir', '$status', '$foto_baru')");

            if ($simpan) {
                ?>
                <script type="text/javascript">
                    Swal.fire({
                        title: "Sukses!",
                        text: "Data berhasil disimpan",
                        icon: "success"
                    }).then(() => {
                        window.location.href = 'anggota.php';
                    });
                </script>
                <?php
            } else {
                ?>
                <script>
                    Swal.fire({
                        title: "Error!",
                        text: "Gagal menyimpan data ke database",
                        icon: "error"
                    });
                </script>
                <?php
            }
        }
    }
}
?>
<!--akhir Tambah Anggota  -->

<?php
// Uji jika tombol Ubah di klik
if(isset($_POST['bubah'])) {
    $id_user        = $_POST['id_user'];
    $identitas      = $_POST['identitas'];
    $nama           = $_POST['nama'];
    $username       = $_POST['username'];
    $level          = $_POST['level'];
    $jk             = $_POST['jk'];
    $alamat         = $_POST['alamat'];
    $tempat_lahir   = $_POST['lahir'];
    $status         = $_POST['status'];
    $foto           = $_FILES['foto']['name'];

    // Mendapatkan ekstensi file foto
    $extension_foto = pathinfo($foto, PATHINFO_EXTENSION);
    // Mendapatkan ukuran file foto
    $size_foto      = $_FILES['foto']['size'];

    // Mengambil nilai password baru dari input
    $new_password   = $_POST['new_password'];
    // Enkripsi password baru menggunakan MD5
    $password_hash  = md5($new_password);

    // Menghapus data tanpa menghapus foto
    if(empty($foto)) {
        // Update data anggota tanpa mengubah foto
        mysqli_query($koneksi, "UPDATE tb_anggota SET identitas = '$identitas',
                                                    nama = '$nama',
                                                    username = '$username',
                                                    password = '$password_hash',
                                                    level = '$level',
                                                    jk = '$jk',
                                                    alamat = '$alamat',
                                                    tempat_lahir = '$tempat_lahir',
                                                    status = '$status'
                                                    WHERE id_user = '$id_user'");

        // Tampilkan pesan sukses
        ?>
        <script>
            Swal.fire({
                title: "Sukses!",
                text: "Data berhasil diubah",
                icon: "success"
            }).then(() => {
                window.location.href = 'anggota.php';
            });
        </script>
        <?php
    } else {
        // Validasi jenis file dan ukuran file foto
        if (!in_array($extension_foto, array('png', 'jpg', 'jpeg')) || $size_foto > 500000) {
            // Tampilkan pesan peringatan jika format atau ukuran file foto tidak sesuai
            ?>
            <script>
                Swal.fire({
                    title: "Peringatan!",
                    text: "File harus berformat PNG, JPG, atau JPEG dan ukurannya tidak boleh lebih dari 500KB",
                    icon: "warning"
                }).then(() => {
                    window.location.href = 'anggota.php';
                });
            </script>
            <?php
        } else {
            // Generate nama file unik untuk menghindari penimpaan file yang sudah ada
            $upload_baru = rand().'_'.$foto;

            // Pindahkan file foto yang diunggah ke direktori yang ditentukan
            move_uploaded_file($_FILES['foto']['tmp_name'], "img/pengguna/".$upload_baru);

            // Update data anggota dengan mengubah foto dan password baru
            mysqli_query($koneksi, "UPDATE tb_anggota SET identitas = '$identitas',
                                                        nama = '$nama',
                                                        username = '$username',
                                                        password = '$password_hash',
                                                        level = '$level',
                                                        jk = '$jk',
                                                        alamat = '$alamat',
                                                        tempat_lahir = '$tempat_lahir',
                                                        status = '$status',
                                                        foto = '$upload_baru'
                                                        WHERE id_user = '$id_user'");
            // Tampilkan pesan sukses
            ?>
            <script>
                Swal.fire({
                    title: "Sukses!",
                    text: "Data berhasil diubah",
                    icon: "success"
                }).then(() => {
                    window.location.href = 'anggota.php';
                });
            </script>
            <?php
        }
    }
}
?>


<!--Hapus data-->
<?php
//uji jika tombol Hapus di klik
if(isset($_POST['bhapus'])) {
$tampil = mysqli_query($koneksi, "SELECT * FROM tb_anggota WHERE id_user = '$_POST[id_user]'");
if ($tampil) {
    $data = mysqli_fetch_array($tampil);
    if ($data !== null && isset($data['foto'])) {
        $foto_hapus = $data['foto'];
        unlink("img/pengguna/".$foto_hapus);

        // Delete the row after unlinking the file
        $hapus = mysqli_query($koneksi, "DELETE FROM tb_anggota WHERE id_user ='$_POST[id_user]' ");
     
            ?>
            <script>
                Swal.fire({
                    title: "Sukses!",
                    text: "Data berhasil dihapus",
                    icon: "success"
                }).then(() => {
                    window.location.href = 'anggota.php';
                });
            </script>
            <?php
        } else {
            ?>
            <script>
                Swal.fire({
                    title: "Error!",
                    text: "Data tidak ditemukan",
                    icon: "error"
                }).then(() => {
                    window.location.href = 'anggota.php';
                });
            </script>
            <?php
        }
    } else {
        ?>
        <script>
            Swal.fire({
                title: "Error!",
                text: "Gagal menghapus data",
                icon: "error"
            }).then(() => {
                window.location.href = 'anggota.php';
            });
        </script>
        <?php
    }
}
?>

<!-- Tambah data dan password -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const passwordInput = document.getElementById('passwordInput');
        const togglePassword = document.getElementById('togglePassword');

        togglePassword.addEventListener('click', function() {
            const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordInput.setAttribute('type', type);
            this.innerHTML = type === 'password' ? '<i class="fa fa-eye" aria-hidden="true"></i>' : '<i class="fa fa-eye-slash" aria-hidden="true"></i>';
        });
    });
</script>

<?php
if (isset($_POST['edit_password'])) {
    $password = $_POST['password'];
    $konfirmasi_password = $_POST['konfirmasi_password'];
    $id_user = $_POST['id_user'];

    // Validasi password baru
    if ($password !== $konfirmasi_password) {
        // Password baru dan konfirmasi password tidak cocok
        echo "<script>
                Swal.fire({
                    title: 'Peringatan!',
                    text: 'Password baru dan konfirmasi password tidak cocok',
                    icon: 'warning'
                });
            </script>";
    } else {
        // Gunakan md5() untuk mengenkripsi password baru
        $md5_password = md5($password);

        // Simpan password baru yang terenkripsi ke dalam database
        $query = "UPDATE tb_anggota SET password = '$md5_password' WHERE id_user = '$id_user'";
        $result = mysqli_query($koneksi, $query);

        if ($result) {
            // Password berhasil diubah
            echo "<script>
                    Swal.fire({
                        title: 'Sukses!',
                        text: 'Password berhasil diubah',
                        icon: 'success'
                    }).then(() => {
                        window.location.href = 'login.php';
                    });
                </script>";
        } else {
            // Gagal mengubah password
            echo "<script>
                    Swal.fire({
                        title: 'Error!',
                        text: 'Gagal mengubah password',
                        icon: 'error'
                    });
                </script>";
        }
    }
}
?>

</body>
</html>


