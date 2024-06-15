<?php

    //panggil koneksi database
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

            $success = 'Sukses.';

    } else  {
        $success = 'Error.';
    }
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
                <div class="sidebar-brand-text mx-1 mt-3"><H6>SMA Muhammadiyah Maumere</H6></div>
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
                        <a class="collapse-item" href="kategori.php"><B>KATEGORI</B></a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-wrench"></i>
                    <span><B>DATA PENGGUNA</B></span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header"><B>DATA PENGGUNA:</B></h6>
                        <a class="collapse-item" href="admin.php"><B>ADMIN</B></a>
                        <a class="collapse-item" href="anggota.php"><B>ANGGOTA</B></a>
                    </div>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                <B>TRANSAKSI</B>
            </div>

            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link" href="pemimjaman.php">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span><B>DATA PEMIMJAMAN</B></span></a>
            </li>

            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="Pengembalian.php">
                    <i class="fas fa-fw fa-table"></i>
                    <span><B>DATA PENGEMBALIAN</B></span></a>
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
                </nav> 
                      
                        <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800"><b> TABEL BUKU </b></h1>

                    <!-- Project Card Example -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">Tabel Tambah Buku</h6>
                                </div>

                            <form method="POST" action="">
                                <div class="row modal-body">
                                <div class="col-6">
                                  <label class="form-label">Judul Buku</label>
                                  <input type="text" class="form-control" name="tjudul" required placeholder="Silahkan Ketik">
                                </div>

                                <div class="col-6">
                                  <label class="form-label">kategori</label>
                                  <select class="form-select" name="tkt" required>
                                      <option>--Silahkan Pilih--</option>
                                      <?php
                                      $muncul = mysqli_query($koneksi, "SELECT * FROM tb_kategori");
                                      while($row = mysqli_fetch_array($muncul)){
                                    echo "<option value=$row[id_kategori]>$row[kategori]</option>";
                                      }
                                      ?>
                                  </select>
                                </div>

                                <div class="col-6">
                                  <label class="form-label">Pengarang</label>
                                  <input type="text" class="form-control" name="tpengarang" required>
                                </div>

                                <div class="col-6">
                                  <label class="form-label">Penerbit</label>
                                  <input type="text" class="form-control" name="tpenerbit" required>
                                </div>

                                <div class="col-6">
                                  <label class="form-label" >Tahun</label>
                                  <input type="number" class="form-control" name="ttahun" required>
                                </div>

                                <div class="col-6">
                                  <label class="form-label">Stok Buku</label>
                                  <input type="number" class="form-control" name="tstok" required>
                                </div>
                                
                          </div>
                          <div class="modal-footer">
                            <button type="submit" class="btn btn-outline-success rounded" id="btn-simpan" name="bsimpan"> SIMPAN </button>
                            <a href="buku.php" type="submit" class="btn btn-outline-danger rounded" id="btn-simpan" name="bsimpan"> KEMBALI </a> 
                          </div>
                          </form>
                        </div>
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
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
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

   <?php if (isset($simpan)) { ?>
    <script>

        Swal.fire({
              title: "<?php echo $success; ?>",
              text: "Data Anda Berhasil Disimpan",
              icon: "success"
              
            }).then(function() {
                window.location = "buku.php";
            });
</script>
<?php } ?>
    
</body>
</html>
