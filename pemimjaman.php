<?PHP error_reporting (E_ALL ^ (E_NOTICE | E_WARNING)); ?>
<?php

    //panggil koneksi database
    include "koneksi.php";
     include "function.php";


     $tgl_pinjam = date("d-m-Y");
     $tujuh_hari = mktime(0,0,0, date("n"), date("j")+7, date("y"));
     $kembali = date("d-m-Y", $tujuh_hari);

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

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link href="css/toats.css" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">

    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.7/dist/sweetalert2.min.css" rel="stylesheet">

    <!-- select2 -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />

    <style>
    /* Atur margin antara judul buku dan ikon remove item */
    .select2-selection__choice {
        margin-right: 10px !important; /* Sesuaikan dengan ukuran yang Anda inginkan */
    }
</style>

     
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
                                <div class="text-center btn-outline-success"><h6>Anda Login sebagai <?php echo $_SESSION['level'] ?></h6></div>
                                <a class="dropdown-item" href="profil.php">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>

                                <!-- <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="login.php" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a> -->
                            </div>
                        </li>
                    </ul>

                </nav>
                <!-- End of Topbar -->
                
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800"><B> P E M I M J A M A N</B></h1>
                    </div>

                    <!-- DataTales Example -->
                     <div class="card shadow mb-4">
                        <div class="card-header py-2">
                            <!-- Button trigger modal -->
                            <?php if ($_SESSION['level'] == 'admin') { ?>
                            <button type="button" class="btn btn-outline-info" data-bs-toggle="modal" data-bs-target="#modalTambah"><i class="fas fa-plus-square mr-1"></i>
                             TAMBAHKAN PEMIMJAMAN BUKU
                            </button>
                            <?php } ?>

                            <a href="cetak_pemimjaman.php" onclick="cetakPinjam();" id="Cetak" target="_blank" class="btn btn-outline-success"><i class="fa-solid fa-print mr-1"></i></i>
                            CETAK PEMIMJAMAN
                            </a>
                        </div>
                        
                    <!-- Awal Modal Tambah -->
                    <div class="modal fade" id="modalTambah" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h1 class="modal-title fs-5" id="staticBackdropLabel"> TAMBAHKAN DATA PEMIMJAMAN</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                            <form method="POST" action="" onsubmit="return validasi(this)">
                            <div class="modal-body">
                            <div class="mb-3">
                                <label class="form-label">Judul Buku</label>
                                <select class="form-select select2" style="width: 100%;" name="tbuku[]" multiple required>
                                    <?php
                                    $tampil = mysqli_query($koneksi, "SELECT * FROM tb_buku ORDER BY id_buku");
                                    while ($data = mysqli_fetch_array($tampil)) {
                                        echo "<option value='" . $data['id_buku'] . "." . $data['judul_buku'] . "'>" . $data['judul_buku'] . "</option>";
                                    }
                                    ?>
                                </select>
                            </div>

                                <div class="mb-3">
                                  <label class="form-label">Nama Pemimjam</label>
                                  <select class="form-select select2" style="width: 100%;" name="tnama" required>
                                        <?php
                                    // Misalkan $koneksi sudah diinisialisasi sebelumnya

                                    $levels = array('pengguna'); // Define the levels
                                    foreach ($levels as $level) {
                                        $query = "SELECT * FROM tb_anggota WHERE level='$level' ORDER BY id_user";
                                        $tampil = mysqli_query($koneksi, $query);

                                        if (!$tampil) {
                                            die('Query Error: ' . mysqli_error($koneksi));
                                        }

                                        while ($data = mysqli_fetch_array($tampil)) {
                                            echo "<option value='" . $data['identitas'] . "." . $data['nama'] . "'>" . $data['identitas'] . "-" . $data['nama'] . "</option>";
                                        }
                                    }
                                    ?>

                                  </select>
                                </div>

                                <div class="mb-3">
                                  <label class="form-label">Tggl Pinjam </label>
                                  <input type="text" class="form-control" name="tgl_pinjam" id="tgl" value="<?php echo $tgl_pinjam; ?>" readonly>
                                </div>

                                <div class="mb-3">
                                  <label class="form-label">Tggl Kembali</label>
                                  <input type="text" class="form-control" name="tgl_kembali" id="tgl" value="<?php echo $kembali; ?>" readonly>
                                </div>
                          </div>

                          <div class="modal-footer">
                            <button type="submit" class="btn btn-outline-success" name="bsimpan">Simpan</button>
                            <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Kembali</button>
                          </div>
                          </form>
                        </div>
                      </div>
                    </div>
                    <!-- Akhir Modal Tambah -->

                        <!-- Tabel Awal pengembalian -->
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>No. Identitas</th>
                                            <th>Judul Buku</th>
                                            <th>Tggl Pinjam</th>
                                            <th>Tggl Kembali</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php

                                    //persiapan menampilkan data
                                $no = 1;
                    $tampil = mysqli_query($koneksi, "SELECT * FROM tb_pinjam WHERE status='Buku Masih Dipinjam'");
                                while ($data = mysqli_fetch_array($tampil)) : 

                                        ?>
                                        <tr>
                                            <td><?php echo $no++; ?></td>
                                            <td><?php echo $data['nama']; ?></td>
                                            <th><?php echo $data['identitas']; ?></th>
                                            <td><?php echo $data['judul_buku']; ?></td>
                                            <td><?php echo $data['tgl_pinjam']; ?></td>
                                            <td><?php echo $data['tgl_kembali']; ?></td>
                                        </tr>
                                    <?php endwhile; ?>
                                    </tbody>
                                </table>
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

    <!-- JQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- DataTables -->
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>
    <!-- sweetlaert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- select2 -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>

    <script>
    $(document).ready(function() {
        $('.select2').select2({
            dropdownParent: $('#modalTambah')
        });
    });
    </script>

   <script type="text/javascript">
       $(document).ready(function() {
    try {
        $('#dataTable').DataTable();
    } catch (error) {
        console.error("DataTables initialization error:", error);
    }
});
   </script>

   
    <!--Awal Data Pinjam Buku -->
<?php
if(isset($_POST['bsimpan'])) {
    // Ambil dan sanitasi data input
    $tgl_pinjam = mysqli_real_escape_string($koneksi, $_POST['tgl_pinjam']);
    $tgl_kembali = mysqli_real_escape_string($koneksi, $_POST['tgl_kembali']);
    
    // Periksa apakah ada buku yang dipilih
    if(!isset($_POST['tbuku']) || empty($_POST['tbuku'])) {
        ?>
        <script type="text/javascript">
            Swal.fire({
                title: "Error!",
                text: "Anda belum memilih buku",
                icon: "error"
            });
        </script>
        <?php
        exit; // Keluar dari skrip jika tidak ada buku yang dipilih
    }
    
    // Ambil data peminjam
    $nama_identitas = mysqli_real_escape_string($koneksi, $_POST['tnama']);
    $pecah_nama_identitas = explode(".", $nama_identitas);
    $identitas = mysqli_real_escape_string($koneksi, $pecah_nama_identitas[0]);
    $nama_peminjam = mysqli_real_escape_string($koneksi, $pecah_nama_identitas[1]);

    // Memproses setiap buku yang dipinjam
    foreach ($_POST['tbuku'] as $buku_item) {
        $pecah_buku = explode(".", $buku_item);
        $id_buku = mysqli_real_escape_string($koneksi, $pecah_buku[0]);
        $judul_buku = mysqli_real_escape_string($koneksi, $pecah_buku[1]);

        // Cek stok buku
        $tampil = mysqli_query($koneksi, "SELECT * FROM tb_buku WHERE id_buku = '$id_buku'");
        if (!$tampil) {
            die("Query error: " . mysqli_error($koneksi));
        }

        $data = mysqli_fetch_array($tampil);
        if ($data) {
            $sisa = $data['stok_buku'];

            if ($sisa == 0) {
                ?>
                <script type="text/javascript">
                    Swal.fire({
                        title: "Stok Buku habis",
                        text: "Transaksi Gagal, Silahkan Tambah Stok Buku Terlebih Dahulu",
                        icon: "warning"
                    }).then(() => {
                        window.location.href = 'pemimjaman.php';
                    });
                </script>
                <?php
            } else {
                // Mulai transaksi
                mysqli_begin_transaction($koneksi);

                try {
                    // Insert data pinjam
                    $insertPinjam = mysqli_query($koneksi, "INSERT INTO tb_pinjam(nama, identitas, judul_buku, tgl_pinjam, tgl_kembali, status) VALUES ('$nama_peminjam', '$identitas', '$judul_buku', '$tgl_pinjam', '$tgl_kembali', 'Buku Masih Dipinjam')");
                    if (!$insertPinjam) {
                        throw new Exception("Error insert pinjam: " . mysqli_error($koneksi));
                    }

                    // Update stok buku
                    $updateBuku = mysqli_query($koneksi, "UPDATE tb_buku SET stok_buku = stok_buku - 1 WHERE id_buku = '$id_buku'");
                    if (!$updateBuku) {
                        throw new Exception("Error update buku: " . mysqli_error($koneksi));
                    }

                    // Commit transaksi
                    mysqli_commit($koneksi);
                } catch (Exception $e) {
                    // Rollback transaksi jika terjadi error
                    mysqli_rollback($koneksi);
                    ?>
                    <script type="text/javascript">
                        Swal.fire({
                            title: "Error!",
                            text: "<?php echo $e->getMessage(); ?>",
                            icon: "error"
                        }).then(() => {
                            window.location.href = 'pemimjaman.php';
                        });
                    </script>
                    <?php
                }
            }
        } else {
            ?>
            <script type="text/javascript">
                Swal.fire({
                    title: "Error!",
                    text: "Buku tidak ditemukan",
                    icon: "error"
                }).then(() => {
                    window.location.href = 'pemimjaman.php';
                });
            </script>
            <?php
        }
    }

    ?>
    <script type="text/javascript">
        Swal.fire({
            title: "Sukses!",
            text: "Data berhasil disimpan",
            icon: "success"
        }).then(() => {
            window.location.href = 'pemimjaman.php';
        });
    </script>
    <?php
}
?>

<!--Awal Perpanjang Masa Pemimjaman Buku  -->
<?php
    session_start();
    if (isset($_SESSION['alert']) && isset($_SESSION['alert_type'])) {
        $alertMessage = $_SESSION['alert'];
        $alertType = $_SESSION['alert_type'];

        echo "<script>
            Swal.fire({
                icon: '$alertType',
                title: '" . ($alertType == 'success' ? 'Success' : 'Error') . "',
                text: '$alertMessage',
                showConfirmButton: true
            });
        </script>";

        // Hapus pesan setelah ditampilkan
        unset($_SESSION['alert']);
        unset($_SESSION['alert_type']);
    }
    ?>
<!--Akhir  -->


<?php
    session_start();
    
    // Check apakah ada session alert dan alert_type yang telah diset
    if(isset($_SESSION['alert']) && isset($_SESSION['alert_type'])) {
        // Tampilkan SweetAlert berdasarkan nilai session alert dan alert_type
        echo "<script src='https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js'></script>";
        echo "<script>";
        echo "swal('{$_SESSION['alert']}', '', '{$_SESSION['alert_type']}');";
        echo "</script>";

        // Hapus session setelah digunakan
        unset($_SESSION['alert']);
        unset($_SESSION['alert_type']);
    }
?>


</body>
</html>

