<?php

//panggil koneksi database Kategori
include "koneksi.php";

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
                <!-- End of Topbar -->

                 <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800"><B> A D M I N</B></h1>
                    </div>

                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                         <!-- Button trigger modal -->
                            <button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#modalTambah"><i class="fa-solid fa-user-plus mr-1"></i>
                             TAMBAHKAN
                            </button>
                        </div>

                    <!-- Awal Modal Tambah -->
                    <div class="modal fade" id="modalTambah" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                      <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h1 class="modal-title fs-5" id="staticBackdropLabel"> TAMBAHKAN ADMIN </h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>

                            <form method="POST" action="" enctype="multipart/form-data">
                                <div class="row modal-body">
                                <div class="col-6">
                                  <label class="form-label">No. Identitas</label>
                                  <input type="text" class="form-control" name="tidentitas"  required placeholder=" Silahkan Input">
                                </div>

                                <div class="col-6">
                                  <label class="form-label">Nama Lengkap</label>
                                  <input type="text" class="form-control" name="tnama"  required>
                                </div>

                                <div class="col-6">
                                  <label class="form-label">Username</label>
                                  <input type="text" class="form-control" name="tuser"  required>
                                </div>

                                <div class="col-6">
                                  <label class="form-label">Password</label>
                                  <input type="text" class="form-control" name="tpass"  required >
                                </div>

                                <div class="col-6">
                                  <label class="form-label">Level</label>
                                  <select class="form-control" name="tlevel" required>
                                      <option> Silahkan Input </option>
                                      <option value=<?php echo $_SESSION['level']; ?>>Admin</option>
                                      <option value=<?php echo $_SESSION['level']; ?>>Kepsek</option>
                                  </select>
                                </div>

                                <div class="col-6">
                                  <label class="form-label">Jenis Kelamin</label>
                                  <select class="form-control" name="tjk" required>
                                      <option> Silahkan Input Jenis Kelamin Anda</option>
                                      <option value="laki-laki">laki-laki</option>
                                      <option value="Perempuan">Perempuan</option>
                                  </select>
                                </div>

                                <div class="col-6">
                                  <label class="form-label">Alamat</label>
                                  <input type="text" class="form-control" name="talamat"  required>
                                </div>

                                <div class="col-6">
                                  <label class="form-label">Tempat/Tanggal Lahir</label>
                                  <input type="text" class="form-control" name="tlahir"  required>
                                </div>

                                <div class="col-6">
                                  <label class="form-label">Jabatan</label>
                                  <input type="text" class="form-control" name="tjabatan"  required>
                                </div>

                                <div class="col-6">
                                  <label class="form-label">Foto</label>
                                  <input type="file" class="form-control" name="tfoto" required>
                                </div> 

                          </div>
                          <div class="modal-footer">
                            <button type="submit" class="btn btn-outline-success" name="bsimpan">SIMPAN</button>
                            <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">KEMBALI</button>
                          </div>
                          </form>
                        </div>
                      </div>
                    </div>
                    <!-- Akhir Modal Tambah -->

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>No. Identitas</th>
                                            <th>Nama Lengkap</th>
                                            <th>Username</th>
                                            <th>Password</th>
                                            <th>Level</th>
                                            <th>Jabatan</th>
                                            <th>Foto</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>

                                    <?php

                                    //persiapan menampilkan data
                                $no = 1;
                                $tampil = mysqli_query($koneksi, "SELECT * FROM tb_admin ORDER BY id_admin DESC");
                                while ($data = mysqli_fetch_array($tampil)) : 

                                        ?>

                                    <tbody>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $data['identitas'] ?></td>
                                            <td><?= $data['nama'] ?></td>
                                            <td><?= $data['username'] ?></td>
                                            <td><?= $data['password'] ?></td>
                                            <td><?= $data['level'] ?></td>
                                            <td><?= $data['jabatan'] ?></td>
                                             <td>
                                                 <img style="width: 70px;" src="img/admin/<?= $data['foto'] ?>">
                                             </td>
                                            <td class="row justify-content-center">
            <div class="col-md-4">                                    
            <a href="#" class="btn btn-outline-primary text-center rounded" data-toggle="tooltip" title="DETAIL" data-bs-toggle="modal" data-bs-target="#modalDetail<?= $no ?>"><i class="fa-regular fa-eye"></i></a></div>

            <div class="col-md-4"> 
            <a href="#" class="btn btn-outline-secondary text-center rounded" data-toggle="tooltip" title="UPDATE" data-bs-toggle="modal" data-bs-target="#modalUbah<?= $no ?>"><i class="fa-solid fa-pen-to-square"></i></a></div>

            <div class="col-md-4"> 
            <a href="#" class="btn btn-outline-danger text-center rounded" data-toggle="tooltip" title="DELETE" data-bs-toggle="modal" data-bs-target="#modalHapus<?= $no ?>"><i class="fa-regular fa-trash-can"></i></a></div>

                                            </td>
                                        </tr>
                                    </tbody>

                                   
                     <!-- Awal Modal Detail -->
                    <div class="modal fade" id="modalDetail<?= $no ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                      <div class="modal-dialog modal-xl">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h1 class="modal-title fs-5" id="staticBackdropLabel"> DETAIL DATA ADMIN </h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>

                            <form method="POST" action="" enctype="multipart/form-data">
                                <input type="hidden" name="id_admin" value="<?= $data['id_admin']?>">

                                <div class="row modal-body">
                                    <div class="col-6">
                                  <label class="form-label">Foto</label>
                                  <div>
                                      <img style="width: 70px;" src="img/admin/<?= $data['foto'] ?>">
                                  </div>
                                  
                                </div>

                                <div class="col-6">
                                  <label class="form-label">No. Identitas</label>
                                  <input type="number" class="form-control" name="tidentitas" required value="<?= $data['identitas'] ?>" readonly>
                                </div>

                                <div class="col-6">
                                  <label class="form-label">Nama Lengkap</label>
                                  <input type="text" class="form-control" name="tnama" required value="<?= $data['nama'] ?>" readonly>
                                </div>

                                 <div class="col-6">
                                  <label class="form-label">Username</label>
                                  <input type="text" class="form-control" name="tuser"  required value="<?= $data['username'] ?>" readonly>
                                </div>
                                
                                <div class="col-6">
                                  <label class="form-label">Level</label>
                                  <input type="text" class="form-control" name="tlevel"  required value="<?= $data['level'] ?>" readonly>
                                </div>

                                <div class="col-6">
                                  <label class="form-label">Jenis Kelamin</label>
                                  <input type="text" class="form-control" name="tjk"  required value="<?= $data['jk'] ?>" readonly>
                                </div>


                                <div class="col-6">
                                  <label class="form-label">Alamat</label>
                                  <input type="text" class="form-control" name="talamat" required value="<?= $data['alamat'] ?>" readonly>
                                </div>

                                <div class="col-6">
                                  <label class="form-label">Tempat/Tanggal Lahir</label>
                                  <input type="text" class="form-control" name="tlahir" required value="<?= $data['tempat_lahir'] ?>" readonly>
                                </div>


                                <div class="col-6">
                                  <label class="form-label">Jabatan</label>
                                  <input type="text" class="form-control" name="tjabatan" required value="<?= $data['jabatan'] ?>" readonly>
                                </div>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal"> KEMBALI </button>
                          </div>
                          </form>
                        </div>
                      </div>
                    </div>
                    <!-- Akhir Modal Detail -->

                    <!-- Awal Modal Ubah -->
                    <div class="modal fade" id="modalUbah<?= $no ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h1 class="modal-title fs-5" id="staticBackdropLabel"> UPDATE DATA ADMIN </h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>

                            <form method="POST" action="" enctype="multipart/form-data">
                                <input type="hidden" name="id_admin" value="<?= $data['id_admin']?>">

                                <div class="row modal-body">
                                <div class="col-6">
                                  <label class="form-label">No. Identitas</label>
                                  <input type="number" class="form-control" name="tidentitas" required value="<?= $data['identitas'] ?>" placeholder="Wajib Disi !!!">
                                </div>

                                <div class="col-6">
                                  <label class="form-label">Nama Lengkap</label>
                                  <input type="text" class="form-control" name="tnama" required value="<?= $data['nama'] ?>">
                                </div>

                                 <div class="col-6">
                                  <label class="form-label">Username</label>
                                  <input type="text" class="form-control" name="tuser"  required value="<?= $data['username'] ?>">
                                </div>

                                <div class="col-6">
                                  <label class="form-label">Password</label>
                                  <input type="text" class="form-control" name="tpass"  required value="<?= $data['password'] ?>" >
                                </div>

                                <div class="col-6">
                                  <label class="form-label">Level</label>
                                  <select class="form-select" name="tlevel" required>
                                      <option value="<?= $data['level'] ?>"><?= $data['level'] ?></option>
                                      <option value="Admin">Admin</option>
                                      <option value="Kepsek">Kepsek</option>
                                  </select>
                                </div>

                                <div class="col-6">
                                  <label class="form-label">Jenis Kelamin</label>
                                  <select class="form-select" name="tjk" required>
                                      <option value="<?= $data['jk'] ?>"><?= $data['jk'] ?></option>
                                      <option value="laki-laki">laki-laki</option>
                                      <option value="Perempuan">Perempuan</option>
                                  </select>
                                </div>


                                <div class="col-6">
                                  <label class="form-label">Alamat</label>
                                  <input type="text" class="form-control" name="talamat" required value="<?= $data['alamat'] ?>">
                                </div>

                                <div class="col-6">
                                  <label class="form-label">Tempat/Tanggal Lahir</label>
                                  <input type="text" class="form-control" name="tlahir" required value="<?= $data['tempat_lahir'] ?>">
                                </div>

                                <div class="col-6">
                                  <label class="form-label">Jabatan</label>
                                  <input type="text" class="form-control" name="tjabatan" required value="<?= $data['jabatan'] ?>">
                                </div>

                                <div class="col-6">
                                  <label class="form-label">Foto</label>
                                   <div>
                                      <img style="width: 70px;" src="img/admin/<?= $data['foto'] ?>">
                                  </div>
                                  <small class="form-text text-muted">Gambar lama</small>
                                  <input type="file" class="form-control" name="tfoto" required>
                                  <small class="form-text text-muted">Pilih foto baru jika ingin mengganti gambar lama.</small>
                                </div>

                          </div>
                          <div class="modal-footer">
                            <button type="submit" class="btn btn-outline-success" name="bubah"> UPDATE</button>
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
                            <h1 class="modal-title fs-5" id="staticBackdropLabel"> HAPUS DATA ADMIN </h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>

                            <form method="POST" action="" enctype="multipart/form-data">
                                <input type="hidden" name="id_admin" value="<?= $data['id_admin']?>">

                                <div class="modal-body">
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

                                     <?php endwhile; ?>
                                </table>
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

</body>

</html>