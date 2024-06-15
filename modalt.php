 <!-- Awal Modal Tambah -->
                    <div class="modal fade" id="modalTambah" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">

                      <div class="modal-dialog modal-xl">
                        <div class="modal-content">
                          <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel"> TAMBAHKAN DATA ANGGOTA </h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                            <form method="POST" action="opsi_buku.php">
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
                          </div>
                          </form>
                        </div>
                      </div>
                    </div>
                    <!-- Akhir Modal Tambah -->