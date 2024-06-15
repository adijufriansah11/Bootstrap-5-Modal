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

<!-- Page Heading -->
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
                                  <select class="form-select" name="tbuku" required>
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
                                  <select class="form-select" name="tnama" required>
                                        <?php
                                    // Misalkan $koneksi sudah diinisialisasi sebelumnya

                                    $levels = array('pengguna'); // Define the levels
                                    foreach ($levels as $level) {
                                        $query = "SELECT * FROM tb_user WHERE level='$level' ORDER BY id_user";
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
                                  <label class="form-label">Tgl Pinjam </label>
                                  <input type="text" class="form-control" name="tgl_pinjam" id="tgl" value="<?php echo $tgl_pinjam; ?>" readonly>
                                </div>

                                <div class="mb-3">
                                  <label class="form-label">Tgl Kembali</label>
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

                    <?php

                                    //persiapan menampilkan data
                                $no = 1;
                    $tampil = mysqli_query($koneksi, "SELECT * FROM tb_transaksi WHERE status='Buku Masih Dipinjam'");
                                while ($data = mysqli_fetch_array($tampil)) : 

                                        ?>
                                    <tbody>
                                        <tr>
                                            <td><?php echo $no++; ?></td>
                                            <td><?php echo $data['nama']; ?></td>
                                            <th><?php echo $data['identitas']; ?></th>
                                            <td><?php echo $data['judul_buku']; ?></td>
                                            <td><?php echo $data['tgl_pinjam']; ?></td>
                                            <td><?php echo $data['tgl_kembali']; ?></td>
                                            <td>

                                                <?php

                                            $denda = 1000;
                                            $tgl_dateline = $data['tgl_kembali'];
                                            $tgl_kembali = date('Y-m-d');

                                            $lambat = terlambat($tgl_dateline, $tgl_kembali);
                                            $denda1 = $lambat*$denda;

                                            if ($lambat>0) {
                                                 echo "

                                                    <font color='red'>$lambat hari<br>(Rp $denda1)</font>

                                                        ";
                                                        
                                            } else {
                                                echo $lambat ."Hari";
                                            }

                                                ?>
                                                
                                            </td>
                                            <td><?php echo $data['status']; ?></td>
                                            <td class="row justify-content-center">
<?php if ($_SESSION['level'] == 'admin') { ?>
<a href="kembali.php?judul_buku=<?php echo $data['judul_buku']; ?>&id_transaksi=<?php echo $data['id_transaksi']; ?>" class="btn btn-outline-info p-1 text-center rounded" data-toggle="tooltip" title="DI KEMBALIKAN"><i class="fa-solid fa-left-long"></i></a>
<?php } ?>

 <?php if ($_SESSION['level'] == 'admin') { ?>
<a href="perpanjang.php?id_transaksi=<?php echo $data['id_transaksi']; ?>&judul_buku=<?php echo $data['judul_buku']; ?>&lambat=<?php echo $lambat; ?>&tgl_kembali=<?php echo $data['tgl_kembali']; ?>" class="btn btn-outline-danger p-1 text-center rounded" data-toggle="tooltip" title="DI PERPANJANG MASA PEMIMJAMAN BUKU"><i class="fa-solid fa-right-long"></i></a>
<?php } ?>

            
                                            </td>
                                        </tr>
                                    </tbody>
                                    <?php endwhile; ?>
                                </table>



    <!-- aksi pemanggilan data -->
    <!--Awal Data Pinjam Buku -->
<?php

//uji jika tombol simpan di klik
if(isset($_POST['bsimpan'])) {
    $tgl_pinjam = $_POST['tgl_pinjam'];
    $kembali = $_POST['tgl_kembali'];

    $buku = $_POST['tbuku'];
    $pecah_buku = explode(".", $buku);
    $id_buku = $pecah_buku[0];
    $judul_buku = $pecah_buku[1];

    $nama = $_POST['tnama'];
    $pecah_nama = explode(".", $nama);
    $identitas = $pecah_nama[0];
    $nama = $pecah_nama[1];

    $tampil = mysqli_query($koneksi, "SELECT * FROM tb_buku WHERE judul_buku = '$judul_buku'");

    while ($data = mysqli_fetch_array($tampil)){
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
            $tampil = mysqli_query($koneksi, "INSERT INTO tb_transaksi(nama, identitas, judul_buku, tgl_pinjam, tgl_kembali, status)VALUES('$nama', '$identitas', '$judul_buku', '$tgl_pinjam', '$kembali', 'Buku Masih Dipinjam')");
            $tampil2 = mysqli_query($koneksi, "UPDATE tb_buku SET stok_buku=(stok_buku-1) WHERE id_buku='$id_buku'");
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
    }
}
?>
<!--Akhir  -->

<!--Awal Perpanjang Masa Pemimjaman Buku  -->
<?php
session_start(); // Mulai sesi

if (isset($_SESSION['alert'])) {
    ?>
    <script type="text/javascript">
        Swal.fire({
            icon: '<?php echo $_SESSION['alert_type']; ?>',
            title: '<?php echo $_SESSION['alert']; ?>',
            showConfirmButton: true,
        });
    </script>
    <?php
    unset($_SESSION['alert']); // Hapus sesi setelah digunakan
    unset($_SESSION['alert_type']);
}
?>
<!--Akhir  -->


<?php
    session_start();
    
    // Check apakah ada session alert dan alert_type yang telah diset
    if(isset($_SESSION['alert1']) && isset($_SESSION['alert_type'])) {
        // Tampilkan SweetAlert berdasarkan nilai session alert dan alert_type
        echo "<script src='https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js'></script>";
        echo "<script>";
        echo "swal('{$_SESSION['alert1']}', '', '{$_SESSION['alert_type']}');";
        echo "</script>";

        // Hapus session setelah digunakan
        unset($_SESSION['alert1']);
        unset($_SESSION['alert_type']);
    }
?>


<script>
    function updateButtonState() {
        var checkboxes = document.querySelectorAll('input[name="selector[]"]');
        var button = document.getElementById('btnCetak');
        var checked = false;
        checkboxes.forEach(function(checkbox) {
            if (checkbox.checked) {
                checked = true;
            }
        });
        button.disabled = !checked;
    }

    function cetakKartu() {
        // Ambil semua checkbox yang dicentang
        var checkboxes = document.querySelectorAll('input[name="selector[]"]:checked');
        // Jika tidak ada checkbox yang dicentang
        if (checkboxes.length === 0) {
            Swal.fire({
                title: "Error!",
                text: "Pilih setidaknya satu item untuk mencetak kartu.",
                icon: "error"
            });
            // Hentikan proses cetak kartu karena tidak ada yang dipilih
            return false;
        } else {
            // Kirim formulir untuk proses cetak kartu
            document.getElementById('formCetak').submit();
        }
    }

    // Panggil fungsi untuk mengupdate state button saat halaman dimuat
    document.addEventListener('DOMContentLoaded', function() {
        updateButtonState();
    });

    // Panggil fungsi untuk mengupdate state button saat ada perubahan pada checkbox
    document.querySelectorAll('input[name="selector[]"]').forEach(function(checkbox) {
        checkbox.addEventListener('change', updateButtonState);
    });
</script>