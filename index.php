<?php

    //panggil koneksi database
    include "koneksi.php";
    include "function.php";


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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link href="css/toats.css" rel="stylesheet">
    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.7/dist/sweetalert2.min.css" rel="stylesheet">


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
              <?php if ($_SESSION['level'] == 'admin' || $_SESSION['level'] == 'pengguna') { ?>
            <!-- Heading -->
            <div class="sidebar-heading">
                <B>DATA MASTER</B>
            </div>
             <?php } ?>
            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                  <?php if ($_SESSION['level'] == 'admin' || $_SESSION['level'] == 'pengguna') { ?>
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-book-open"></i>
                    <span><B> DATA BUKU</B></span>
                </a>
                <?php } ?>

                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                         <?php if ($_SESSION['level'] == 'admin' || $_SESSION['level'] == 'pengguna') { ?>
                        <a class="collapse-item" href="buku.php"><B>BUKU</B></a>
                          <?php } ?>
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
                        <a class="collapse-item" href="kembalian.php"><B>PENGEMBALIAN</B></a>
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
             <?php if ($_SESSION['level'] == 'admin' || $_SESSION['level'] == 'kepsek') { ?>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#laporan"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fa-solid fa-user-tie"></i>
                    <span><B>LAPORAN</B></span>
                </a>
                <div id="laporan" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header"><B>DATA LAPORAN:</B></h6>
                        <a class="collapse-item" href="lap_buku.php"><B>LAPORAN BUKU</B></a>
                        <a class="collapse-item" href="lap_pinjam.php"><B>LAP. PEMIMJAMAN</B></a>
                        <a class="collapse-item" href="lap_kembali.php"><B>LAP. PENGEMBALIAN</B></a>
                        
                    </div>
                </div>
            </li>
             <?php } ?>

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
                    <ul class="navbar-nav btn-outline-info ml-auto">
                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                           <span class="mr-2 d-lg-inline text-gray-600 small">Hai, <?php echo $_SESSION['nama'] ?></span>

                           <?php if ($_SESSION['level'] == 'admin' || $_SESSION['level'] == 'kepsek') { ?>
                                <img class="img-profile rounded-circle" src="img/admin/<?php echo $_SESSION['foto'] ?>">
                            <?php } elseif ($_SESSION['level'] == 'pengguna') { ?>
                                <img class="img-profile rounded-circle" src="img/pengguna/<?php echo $_SESSION['foto'] ?>">
                            <?php } ?>
                            
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown" style="width: 300px;">
                                <div class="text-center"><h6><b>Anda Login sebagai <?php echo $_SESSION['level'] ?></b></h6></div>
                                <hr>

                               <a class="dropdown-item" href="profil.php">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <hr>

                                 <button type="button" class="dropdown-item" id="logoutBtn" href="Login.php.php"><i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </button>
                        
                               <!--  <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="login.php" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout -->
                                </a>
                            </div>
                        </li>
                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800"><B>D A S H B O A R D</B></h1>
                    </div>

                    <!-- Content Row -->
                    <div class="row">
                        <!-- Buku -->
                        <div class="col-xl-3 col-md-5 mb-3">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">   
                                        <div class="col mr-2">

                                            <?php
                                        $buku = mysqli_query($koneksi, "SELECT * FROM tb_buku");
                                        $jumlah_buku = mysqli_num_rows($buku);
                                            ?>

                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Data Buku</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $jumlah_buku ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fa-solid fa-book fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings Anggota Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <?php
                                        $anggota = mysqli_query($koneksi, "SELECT * FROM tb_anggota");
                                        $jumlah_anggota = mysqli_num_rows($anggota);
                                            ?>
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Data Pengguna</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $jumlah_anggota ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fa-solid fa-user fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings Pemimjaman Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <?php
                                        $pinjam = mysqli_query($koneksi, "SELECT * FROM tb_pinjam  WHERE status='Buku Masih Dipinjam'");
                                        $jumlah_pinjam = mysqli_num_rows($pinjam);
                                            ?>
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Pemimjaman
                                            </div>
                                            <div class="row no-gutters align-items-center">
                                                <div class="col-auto">
                                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo $jumlah_pinjam ?></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                        <i class="fa-regular fa-clipboard fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Pengembalian -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-dark shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <?php
                                        $kembali = mysqli_query($koneksi, "SELECT * FROM tb_pengembalian INNER JOIN tb_pinjam ON tb_pengembalian.kode_pinjam = tb_pinjam.id_pinjam ");
                                        $jumlah_kembali = mysqli_num_rows($kembali);
                                            ?>
                                            <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">
                                                Pengembalian</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $jumlah_kembali ?></div>
                                        </div>
                                        <div class="col-auto">
                                        <i class="fa-solid fa-cart-shopping fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->


                <div class="row">

                <!-- Area Chart -->
                            <div class="col-xl-8 col-lg-7">
                                <div class="card shadow mb-4">
                                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                        <h6 class="m-0 font-weight-bold text-primary">Data Buku</h6>
                                    </div>
                                    <div class="card-body">
                                        <div class="chart-area">
                                            <canvas id="AreaChart"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        <!-- Pie Chart -->
                        <div class="col-xl-4 col-lg-5">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Data Chart</h6>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="chart-pie pt-4 pb-2">
                                        <canvas id="Chart"></canvas>
                                    </div>
                                    <div class="mt-4 text-center small">
                                        <span class="mr-2">
                                            <i class="fas fa-circle text-primary"></i> Buku
                                        </span>
                                        <span class="mr-2">
                                            <i class="fas fa-circle text-success"></i> Anggota
                                        </span>
                                        <span class="mr-2">
                                            <i class="fas fa-circle text-info"></i> Pemimjaman
                                        </span>
                                        <span class="mr-2">
                                            <i class="fas fa-circle text-warning"></i> Pengembalian
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website <?php echo date("Y"); ?></span>
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
                <button type="button" class="btn btn-danger" id="logoutBtn" href="logout.php">
                    Logout
                </button>
                <!-- <div class="modal-footer">
                     <a class="btn btn-outline-danger" id="logoutBtn" href="logout.php">KELUAR</a>
                </div> -->
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

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
    $(document).ready(function() {
        // Menangani klik pada tombol logout
        $('#logoutBtn').click(function() {
            // Menampilkan SweetAlert untuk konfirmasi logout
            Swal.fire({
                title: 'Apakah Anda yakin ingin Keluar?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Keluar!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Lakukan proses logout di sini (misalnya, redirect ke halaman logout)
                    window.location.href = 'logout.php';
                }
            });
        });
    });
</script>

 <!-- Chart Scripts -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Get data from PHP
            <?php
                $buku = mysqli_query($koneksi, "SELECT * FROM tb_buku");
                $jumlah_buku = mysqli_num_rows($buku);

                $anggota = mysqli_query($koneksi, "SELECT * FROM tb_anggota");
                $jumlah_anggota = mysqli_num_rows($anggota);

                $pinjam = mysqli_query($koneksi, "SELECT * FROM tb_pinjam WHERE status='Buku Masih Dipinjam'");
                $jumlah_pinjam = mysqli_num_rows($pinjam);

                $kembali = mysqli_query($koneksi, "SELECT * FROM tb_pengembalian INNER JOIN tb_pinjam ON tb_pengembalian.kode_pinjam = tb_pinjam.id_pinjam");
                $jumlah_kembali = mysqli_num_rows($kembali);
            ?>
            var bukuCount = <?php echo $jumlah_buku; ?>;
            var anggotaCount = <?php echo $jumlah_anggota; ?>;
            var pinjamCount = <?php echo $jumlah_pinjam; ?>;
            var kembaliCount = <?php echo $jumlah_kembali; ?>;

            // Pie Chart
            var ctxPie = document.getElementById("Chart").getContext('2d');
            var myPieChart = new Chart(ctxPie, {
                type: 'pie',
                data: {
                    labels: ["Buku", "Anggota", "Pemimjaman", "Pengembalian"],
                    datasets: [{
                        data: [bukuCount, anggotaCount, pinjamCount, kembaliCount],
                        backgroundColor: ['#4e73df', '#1cc88a', '#36b9cc', '#f6c23e'],
                        hoverBackgroundColor: ['#2e59d9', '#17a673', '#2c9faf', '#dda20a'],
                        hoverBorderColor: "rgba(234, 236, 244, 1)"
                    }]
                },
                options: {
                    maintainAspectRatio: false,
                    tooltips: {
                        backgroundColor: "rgb(255,255,255)",
                        bodyFontColor: "#858796",
                        borderColor: '#dddfeb',
                        borderWidth: 1,
                        xPadding: 15,
                        yPadding: 15,
                        displayColors: false,
                        caretPadding: 10,
                    },
                    legend: {
                        display: false
                    },
                    cutoutPercentage: 80,
                },
            });

            // Bar Charts for Buku, Anggota, Pemimjaman, Pengembalian
            var ctxBar = document.getElementById("Chart").getContext('2d');
            var myBarChart = new Chart(ctxBar, {
                type: 'bar',
                data: {
                    labels: ["Buku", "Anggota", "Pemimjaman", "Pengembalian"],
                    datasets: [{
                        label: "Jumlah",
                        backgroundColor: ['#4e73df', '#1cc88a', '#36b9cc', '#f6c23e'],
                        borderColor: "#4e73df",
                        data: [bukuCount, anggotaCount, pinjamCount, kembaliCount],
                    }],
                },
                options: {
                    maintainAspectRatio: false,
                    layout: {
                        padding: {
                            left: 10,
                            right: 25,
                            top: 25,
                            bottom: 0
                        }
                    },
                    scales: {
                        xAxes: [{
                            time: {
                                unit: 'Jumlah'
                            },
                            gridLines: {
                                display: false,
                                drawBorder: false
                            },
                            ticks: {
                                maxTicksLimit: 6
                            },
                            maxBarThickness: 25,
                        }],
                        yAxes: [{
                            ticks: {
                                min: 0,
                                max: Math.max(bukuCount, anggotaCount, pinjamCount, kembaliCount) + 10,
                                maxTicksLimit: 5,
                                padding: 10,
                                // Include a dollar sign in the ticks
                                callback: function(value, index, values) {
                                    return value;
                                }
                            },
                            gridLines: {
                                color: "rgb(234, 236, 244)",
                                zeroLineColor: "rgb(234, 236, 244)",
                                drawBorder: false,
                                borderDash: [2],
                                zeroLineBorderDash: [2]
                            }
                        }],
                    },
                    legend: {
                        display: false
                    },
                    tooltips: {
                        titleMarginBottom: 10,
                        titleFontColor: '#6e707e',
                        titleFontSize: 14,
                        backgroundColor: "rgb(255,255,255)",
                        bodyFontColor: "#858796",
                        borderColor: '#dddfeb',
                        borderWidth: 1,
                        xPadding: 15,
                        yPadding: 15,
                        displayColors: false,
                        caretPadding: 10,
                    },
                }
            });
        });
    </script>

    <!-- Chart Scripts -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Get data from PHP
            <?php
            // Ambil data untuk buku (dengan asumsi Anda memiliki catatan berdasarkan tanggal atau waktu untuk buku yang ditambahkan)
             // Di sini Anda harus mengambil data dan memformatnya sesuai kebutuhan.
             // Ini data statis.
            $dates = ["2023-01", "2023-02", "2023-03", "2023-04", "2023-05"]; // Bulan dan tahun
            $book_counts = [10, 15, 5, 8, 20];  // jumlah buku.
            ?>

            var dates = <?php echo json_encode($dates); ?>;
            var bookCounts = <?php echo json_encode($book_counts); ?>;

            // Area Chart
            var ctx = document.getElementById("AreaChart").getContext('2d');
            var AreaChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: dates,
                    datasets: [{
                        label: "Books",
                        lineTension: 0.3,
                        backgroundColor: "rgba(78, 115, 223, 0.05)",
                        borderColor: "rgba(78, 115, 223, 1)",
                        pointRadius: 3,
                        pointBackgroundColor: "rgba(78, 115, 223, 1)",
                        pointBorderColor: "rgba(78, 115, 223, 1)",
                        pointHoverRadius: 3,
                        pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",
                        pointHoverBorderColor: "rgba(78, 115, 223, 1)",
                        pointHitRadius: 10,
                        pointBorderWidth: 2,
                        data: bookCounts,
                    }],
                },
                options: {
                    maintainAspectRatio: false,
                    layout: {
                        padding: {
                            left: 10,
                            right: 25,
                            top: 25,
                            bottom: 0
                        }
                    },
                    scales: {
                        xAxes: [{
                            time: {
                                unit: 'date'
                            },
                            gridLines: {
                                display: false,
                                drawBorder: false
                            },
                            ticks: {
                                maxTicksLimit: 7
                            }
                        }],
                        yAxes: [{
                            ticks: {
                                maxTicksLimit: 5,
                                padding: 10,
                                // Include a dollar sign in the ticks
                                callback: function(value, index, values) {
                                    return number_format(value);
                                }
                            },
                            gridLines: {
                                color: "rgb(234, 236, 244)",
                                zeroLineColor: "rgb(234, 236, 244)",
                                drawBorder: false,
                                borderDash: [2],
                                zeroLineBorderDash: [2]
                            }
                        }],
                    },
                    legend: {
                        display: false
                    },
                    tooltips: {
                        backgroundColor: "rgb(255,255,255)",
                        bodyFontColor: "#858796",
                        titleFontColor: '#6e707e',
                        titleMarginBottom: 10,
                        borderColor: '#dddfeb',
                        borderWidth: 1,
                        xPadding: 15,
                        yPadding: 15,
                        displayColors: false,
                        intersect: false,
                        mode: 'index',
                        caretPadding: 10,
                    }
                }
            });
        });
    </script>
</body>
</html>

