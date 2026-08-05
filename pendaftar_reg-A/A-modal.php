<!-- 
            -- Membuat sebuah tag div untuk Modal Dialog untuk Form Tambah dan Ubah
            -- Beri id "form-modal" untuk tag div tersebut
            -->
            <div id="form-modal" class="modal fade">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title">
                                <!-- Beri id "modal-title" untuk tag span pada judul modal -->
                                <span id="modal-title"></span>
                            </h4>
                        </div>
                        <div class="modal-body">
                            <!-- Beri id "pesan-error" untuk menampung pesan error -->
                            <div id="pesan-error" class="alert alert-danger"></div>
                            
                            <!-- Beri id "form" untuk tag form -->
                            <form id="form">
                                <!-- 
                                -- Beri id untuk masing-masing form input
                                -- textbox nis : id="nis"
                                -- textbox nama : id="nama"
                                -- combobox jenis kelamin : id="jenis_kelamin"
                                -- textbox no.telepon : id="telp"
                                -- textarea alamat : id="alamat"
                                -- checkbox foto : id="checkbox_foto"
                                -- input file foto : id="foto"
                                -->

                                <?php 
                                include("config/koneksi.php"); 
                                ?>
                                <div class="form-group">
                                    <label class="col-sm-5 control-label">TAHUN AKADEMIK*</label>
                                    <div class="col-sm-5">
                                    <?php
                                    $query = "SELECT * FROM TA_sem";
                                    if($result = mysqli_query($koneksi, $query)){
                                        if($success = mysqli_num_rows($result) > 0){
                                            echo "<select class='form-control' name='TA_sem' id='TA_sem'>";
                                            echo "<option value=''> - TA & Semester -</option>";
                                            
                                            while($row = mysqli_fetch_array($result))
                                                echo "<option value='$row[TA_sem]'>$row[tahun_akademik] | $row[semester]</option>";
                                            
                                            echo "</select>";
                                        }
                                    }
                                    ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-5 control-label">PRODI</label>
                                    <div class="col-sm-4">
                                    <?php
                                    $query = "SELECT * FROM prodi";
                                    if($result = mysqli_query($koneksi, $query)){
                                        if($success = mysqli_num_rows($result) > 0){
                                            echo "<select name='prodi' id='prodi' class='form-control'>";
                                            echo "<option value=''> - PRODI -</option>";
                                            
                                            while($row = mysqli_fetch_array($result))
                                                echo "<option value='$row[nm_prodi]'>$row[nm_prodi]</option>";
                                            
                                            echo "</select>";
                                        }
                                    }
                                    ?>
                                    </div>
                                </div> 
                                <div class="form-group">
                                    <label class="col-sm-5 control-label">Nim</label>
                                    <div class="col-sm-4">
                                        <input type="text" name="nim" id="nim" class="form-control" placeholder="No Induk Mahasiswa" >
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-5 control-label">Nama</label>
                                    <div class="col-sm-7">
                                        <input type="text" name="nama" id="nama" class="form-control" placeholder="Nama">
                                    </div>
                                </div>                          
                                <div class="form-group">
                                    <label class="col-sm-5 control-label">Tempat Lahir</label>
                                    <div class="col-sm-4">
                                        <input type="text" name="tmpt_lhr" id="tmpt_lhr" class="form-control" placeholder="Tempat Lahir" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-5 control-label">Tanggal Lahir</label>
                                    <div class="col-sm-4">
                                    <input class="input-group tanggal form-control" type="text" name="tgl_lhr" id="tgl_lhr" date="" data-date-format="yyyy-mm-dd" placeholder="yyyy-mm-dd" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-5 control-label">Alamat</label>
                                    <div class="col-sm-7">
                                        <textarea name="alamat" id="alamat" class="form-control" placeholder="Alamat" required></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-5 control-label">Jenis Kelamin</label>
                                    <div class="col-sm-4">
                                        <select name="jenkel" id="jenkel" class="form-control" required>
                                            <option value=""> -Jenis Kelamin- </option>
                                            <option value="L">L</option>
                                            <option value="P">P</option>
                                        </select>
                                    </div>
                                </div>                      
                                <div class="form-group">
                                    <label class="col-sm-5 control-label">IPK Semester Akhir *</label>
                                    <div class="col-sm-3">
                                        <input type="text" name="ipk" id="ipk" class="form-control" placeholder="IPK" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-5 control-label">Judul Skripsi (indonesia)</label>
                                    <div class="col-sm-7">
                                        <textarea name="judul_indo" id="judul_indo" class="form-control" placeholder="Judul Skripsi Versi Indonesia" required></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-5 control-label">Judul Skripsi (english)</label>
                                    <div class="col-sm-7">
                                        <textarea name="judul_english" id="judul_english" class="form-control" placeholder="Judul Skripsi Versi English" required></textarea>
                                    </div>
                                </div>  
                                <div class="form-group">
                                    <label class="col-sm-5 control-label">Kesan & Pesan</label>
                                    <div class="col-sm-7">
                                        <textarea name="pesan" id="pesan" class="form-control" placeholder="Kesan Dan pesan Selama menjadi Mhs di STIKES" required></textarea>
                                    </div>
                                </div>                                  
                                
                                <div class="form-group">
                                    <label class="col-sm-5 control-label">Pas Foto</label>
                                    <div id="checkbox_foto" class="col-sm-6">
                                        <input type="checkbox" id="ubah_foto" name="ubah_foto" value="true"> Ceklis jika ingin mengubah foto
                                    </div>
                                    <input type="file" id="foto" name="foto" class="form-control" >
                                </div>
                                <button type="reset" id="btn-reset"></button>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <!-- Beri id "loading-simpan" untuk loading ketika klik tombol simpan -->
                            <div id="loading-simpan" class="pull-left">
                                <b>Sedang menyimpan...</b>
                            </div>
                            
                            <!-- Beri id "loading-ubah" untuk loading ketika klik tombol ubah -->
                            <div id="loading-ubah" class="pull-left">
                                <b>Sedang mengubah...</b>
                            </div>
                            
                            <!-- Beri id "btn-simpan" untuk tombol simpan nya -->
                            <button type="button" class="btn btn-primary" id="btn-simpan">Simpan</button>
                            
                            <!-- Beri id "btn-ubah" untuk tombol simpan nya -->
                            <button type="button" class="btn btn-primary" id="btn-ubah">Ubah</button>
                            
                            <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- 
            -- Membuat sebuah tag div untuk Modal Dialog untuk Form delete atau hapus
            -- Beri id "delete-modal" untuk tag div tersebut
            -->
            <div id="delete-modal" class="modal fade">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title">
                                Konfirmasi
                            </h4>
                        </div>
                        <div class="modal-body">
                            <!--
                            -- Beri id "data-nis" untuk textbox nis yang digunakan untuk menampung
                            -- data nis yang akan dihapus
                            -->
                            <input type="hidden" id="data-nim">
                            
                            Apakah anda yakin ingin menghapus data ini?
                        </div>
                        <div class="modal-footer">
                            <!-- Beri id "loading-hapus" untuk loading ketika klik tombol hapus -->
                            <div id="loading-hapus" class="pull-left">
                                <b>Sedang meghapus...</b>
                            </div>
                            
                            <!-- Beri id "btn-hapus" untuk tombol hapus nya -->
                            <button type="button" class="btn btn-primary" id="btn-hapus">Ya</button>
                            
                            <button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
                        </div>
                    </div>
                </div>
            </div>