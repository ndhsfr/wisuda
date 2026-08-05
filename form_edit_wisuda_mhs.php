<?php $thisPage="SIM Pendaftaran Wisuda - INDEX"; ?>
<?php $title = "Sim Pendaftaran Wisuda" ?>
<?php $description = "halaman index sistem Pendaftaran wisuda" ?>
<?php 
// require('akses_login.php');
include("header.php"); // memanggil file header.php
include("config/koneksi.php"); // memanggil file koneksi.php untuk koneksi ke database -->
?>

<!-- Page Content -->
<div class="container">

	<!-- Page Heading/Breadcrumbs -->
    <div class="row">
            <div class="col-lg-12 col-sm-12 col-md-12">
                <h1 class="page-header">Form Edit Data
                    <small>Pendaftar Wisuda</small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="index.php">Home</a>
                    </li>
                    <li class="active">Data Pendaftar</li>
                </ol>
            </div> <!-- / col lg 12 -->
        
            
        <div class="col-lg-12 col-sm-12 col-md-12">
            <form class="form-horizontal" action="" method="post" enctype="multipart/form-data"> <!-- Catatan : enctype="multipart/form-data" harus ditulis agar bisa upload file -->

                    <?php                    
                        $sql="select pendaftar_wisuda_rega.*, tahun_akademik, semester from pendaftar_wisuda_rega, ta_sem where (nim='$_GET[nim]' and pendaftar_wisuda_rega.ta_sem=ta_sem.ta_sem)" ;
                         
                        $rs=mysqli_query($koneksi, $sql);
                        $row=mysqli_fetch_array($rs);
                    { ?>

            
            <div class="col-lg-3 col-sm-4 col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Pas Foto</h3>
                    </div>
                    <div class="panel-body">
                        <table>
                            <tr> 
                                <td align="center"><img src="foto/<?php echo $row['foto']; ?>" width="150" height="150"></td>
                            </tr> 
                            <tr> 
                                <td height="10"></td> 
                            </tr>                       
                            <tr> 
                                <td align="center"> <?php echo $row['foto']; ?> </td> 
                            </tr>
                            <tr> 
                                <td height="10"></td> 
                            </tr>
                            <tr>                                           
                              <td align="center"> <input type="file" id="foto" name="foto">  </td>
                            </tr>  
                            <tr>                                           
                              <td> <input type="checkbox" id="ubah_foto" name="ubah_foto" value="true"> Ceklis jika ingin mengubah foto </td>
                            </tr>
                        </table>
                    </div>      <!-- / panel-body -->
                </div>  <!-- / panel-body -->
            </div>  <!-- / col-lg-3 col-sm-4 col-md-4  -->

            <div class="col-lg-7 col-sm-8 col-md-8">

                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Data Pendaftar Wisuda. NIM = <?php echo $row['nim'];?> </h3>
                    </div>
                    <div class="panel-body">                    
                        
                        <div class="form-group">                          
                            <label class="col-sm-5 control-label">PROGRAM :</label>
                                <div class="col-sm-4">
                                    <input type="text" name="t_program" id="t_program" class="form-control" placeholder="Program" value='<?php echo $row['program'];?>' readonly>
                                </div>   
                        </div>

                        <div class="form-group">                          
                            <label class="col-sm-5 control-label">PRODI :</label>
                                <div class="col-sm-4">
                                    <input type="text" name="t_prodi" id="t_prodi" class="form-control" placeholder="Prodi" value='<?php echo $row['prodi'];?>' readonly>
                                </div>   
                        </div>
                        <hr/>

                        <div class="form-group">
                            <label class="col-sm-5 control-label">TAHUN AKADEMIK :</label>
                            <div class="col-sm-4">
                                <?php
                                    $query = "SELECT * FROM ta_sem";
                                        if($result = mysqli_query($koneksi, $query)){
                                            if($success = mysqli_num_rows($result) > 0){
                                              echo "<select name='s_TA' class='form-control' id='s_TA'>";
                                              echo "<option value='$row[ta_sem]'>$row[tahun_akademik] | $row[semester]</option>";
                                              echo "<option value='' >--------------------</option>";
                                              while($r = mysqli_fetch_array($result))
                                              echo "<option value='$r[ta_sem]'>$r[tahun_akademik] | $r[semester]</option>";
                                              
                                               echo "</select>";
                                            }
                                          }
                                ?>                                       
                            </div>
                        </div>

                        <!-- <div class="form-group">
                            <label class="col-sm-5 control-label">PRODI :</label> -->
                                <!-- <div class="col-sm-4"> -->
                                    <?php
                                    // $query = "SELECT * FROM prodi";
                                    //     if($result = mysqli_query($koneksi, $query)){
                                    //         if($success = mysqli_num_rows($result) > 0){
                                    //           echo "<select name='s_prodi' id='s_prodi' class='form-control' readonly required>";
                                    //             echo "<option value='$row[prodi]'>$row[prodi]</option>";
                                    //           //   echo "<option value='' >-----------------------</option>";
                                    //           //   while($r = mysqli_fetch_array($result))
                                    //           //     echo "<option value='$r[nm_prodi]'>$r[nm_prodi]</option>";
                                              
                                    //            echo "</select>";
                                    //         }
                                    //       }
                                    ?>
                                <!-- </div> -->                                
                        <!-- </div> -->

                        <!-- <div class="form-group">
                            <label class="col-sm-5 control-label">NIM *</label>
                                <div class="col-sm-4">
                                    <input type="text" name="t_nim" id="t_nim" class="form-control" placeholder="No Induk Mahasiswa" value='<?php //echo $row['nim'];?>' readonly required>
                                </div>
                        </div> -->
                                    
                        <div class="form-group">
                            <label class="col-sm-5 control-label">NAMA</label>
                                <div class="col-sm-7">
                                    <input type="text" name="t_nama" id="t_nama" class="form-control" value="<?php echo $row['nama'];?>">
                                </div>
                        </div>                          
                                    
                        <div class="form-group">
                            <label class="col-sm-5 control-label">Tempat Lahir</label>
                                <div class="col-sm-4">
                                    <input type="text" name="t_tmpt_lhr" id="t_tmpt_lhr" class="form-control" placeholder="Tempat Lahir" value="<?php echo $row['tmpt_lhr'];?>">
                                </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-5 control-label">Tanggal Lahir</label>
                                <div class="col-sm-4">
                                    <input class="input-group tanggal form-control" type="text" name="t_tgl_lhr" id="t_tgl_lhr" date="" data-date-format="yyyy-mm-dd" placeholder="yyyy-mm-dd" value="<?php echo $row['tgl_lhr'];?>">
                                </div>
                        </div>
                                
                        <div class="form-group">
                            <label class="col-sm-5 control-label">Alamat</label>
                                <div class="col-sm-7">
                                    <textarea name="t_alamat" id="t_alamat" class="form-control" value="<?php echo $row['alamat'];?>"><?php echo $row['alamat']; ?></textarea>
                                </div>
                        </div>
                                
                        <div class="form-group">
                            <label class="col-sm-5 control-label">Jenis Kelamin</label>
                                <div class="col-sm-3">
                                    <select name="t_jenkel" id="t_jenkel" class="form-control" >
                                        <option value="<?php echo $row['jenkel'];?>" ><?php echo $row['jenkel'];?></option>
                                        <option value=""> -Jenis Kelamin- </option>
                                        <option value="L">L</option>
                                        <option value="P">P</option>
                                    </select>
                                </div>
                        </div>                      
                                
                        <div class="form-group">
                            <label class="col-sm-5 control-label">IPK Semester Akhir</label>
                                <div class="col-sm-3">
                                    <input type="text" name="t_ipk" id="t_ipk" class="form-control" placeholder="IPK" value="<?php echo $row['ipk'];?>">
                                </div>
                        </div>
                                
                        <div class="form-group">
                            <label class="col-sm-5 control-label">Judul Skripsi (indonesia)</label>
                                <div class="col-sm-7">
                                    <textarea name="t_judul_indo" id="t_judul_indo" class="form-control" placeholder="Judul Skripsi Versi Indonesia" value="<?php echo $row['judul_indo'];?>"><?php echo $row['judul_indo']; ?> </textarea>
                                </div>
                        </div>
                                
                        <div class="form-group">
                            <label class="col-sm-5 control-label">Judul Skripsi (english)</label>
                                <div class="col-sm-7">
                                    <textarea name="t_judul_english" id="t_judul_english" class="form-control" placeholder="Judul Skripsi Versi English" value="<?php echo $row['judul_english'];?>"><?php echo $row['judul_english']; ?></textarea>
                                </div>
                        </div>  
                                
                        <div class="form-group">
                            <label class="col-sm-5 control-label">Kesan & Pesan</label>
                                <div class="col-sm-7">
                                    <textarea name="t_pesan" id="t_pesan" class="form-control" placeholder="Kesan Dan pesan Selama menjadi Mhs di STIKES" value="<?php echo $row['pesan'];?>"><?php echo $row['pesan']; ?> </textarea>
                                </div>
                        </div>   


                    </div>      <!-- / panel-body -->
                </div>  <!-- / panel-body -->
            </div>  <!-- / col-lg-6 col-sm-6 col-md-6  -->
             <?php } ?>
            
        </div>   <!-- col-lg-12 col-sm-12 col-md-12 --> 
                <!-- <hr/> -->
        <div class="col-sm-3">
            <input type="submit" name="update" id="update" class="btn btn-sm btn-primary" value="UPDATE" data-toggle="tooltip" title="Update Data">
            <a href="view_wisuda_mhs.php" class="btn btn-sm btn-danger" data-toggle="tooltip" title="Batal">Cancel / Back To VIEW Table</a>
        </div>
         </form>       
        <div class="col-sm-5">
            <span> <b>Keterangan :</b><br/> Nim Tidak Dapat di EDIT</span>
        </div>


        <?php 
        if(isset($_POST['update']))
        { // jika tombol 'update' ditekan

            $nim     = $_GET['nim'];

            // $program                  = $_POST['s_program'];
              //$TA_sem                 = $_POST['s_TA'];
            // $prodi                  = $_POST['s_prodi'];
            // $nim                    = $_POST['t_nim'];
              //$nama                   = $_POST['t_nama'];
              //$tmpt_lhr               = $_POST['t_tmpt_lhr'];
              //$tgl_lhr                = $_POST['t_tgl_lhr'];
              //$alamat                 = $_POST['t_alamat'];
              //$jenkel                 = $_POST['t_jenkel'];
              //$ipk                    = $_POST['t_ipk'];
              //$judul_indo             = $_POST['t_judul_indo'];
              //$judul_english          = $_POST['t_judul_english'];
              //$pesan                  = $_POST['t_pesan'];
            

            
 
            $TA_sem                 = mysqli_real_escape_string($koneksi, htmlentities($_POST['s_TA']));            
            $nama                   = addslashes($_POST['t_nama']);
           // $nama                   = mysqli_real_escape_string($koneksi, htmlentities($_POST['t_nama']));            
            $tmpt_lhr               = mysqli_real_escape_string($koneksi, htmlentities($_POST['t_tmpt_lhr']));
            $tgl_lhr                = mysqli_real_escape_string($koneksi, htmlentities($_POST['t_tgl_lhr']));
            $alamat                 = mysqli_real_escape_string($koneksi, htmlentities($_POST['t_alamat']));
            $jenkel                 = mysqli_real_escape_string($koneksi, htmlentities($_POST['t_jenkel']));
            $ipk                    = mysqli_real_escape_string($koneksi, htmlentities($_POST['t_ipk']));
            $judul_indo             = mysqli_real_escape_string($koneksi, htmlentities($_POST['t_judul_indo']));
            $judul_english          = mysqli_real_escape_string($koneksi, htmlentities($_POST['t_judul_english']));
            $pesan                  = mysqli_real_escape_string($koneksi, htmlentities($_POST['t_pesan']));

                            
                        
            if(isset($_POST['ubah_foto']))  // Jika user menceklis checkbox yang ada di form ubah, lakukan :

            { 
                
                // Ambil data foto yang dipilih dari form
                $foto = $_FILES['foto']['name'];
                $tmp = $_FILES['foto']['tmp_name'];
                
                // Rename nama fotonya dengan menambahkan tanggal dan jam upload
                $fotobaru = date('dmYHis')."-".$foto;
                
                // Set path folder tempat menyimpan fotonya
                $path = "foto/".$fotobaru;

                // Proses upload
                // Cek apakah gambar berhasil diupload atau tidak
                if(move_uploaded_file($tmp, $path)) // Jika proses upload sukses
                  { 

                    $sql1="select nim, foto form pendaftar_wisuda_rega where nim=$nim" ;

                    $cari = mysqli_query($koneksi, $sql1) ;

                    $data = mysqli_fetch_array($cari);
                    
                    // Cek apakah file foto sebelumnya ada di folder foto
                    if(is_file("foto/".$data['foto'])) // Jika foto ada
                    unlink("foto/".$data['foto']); // Hapus file foto sebelumnya yang ada di folder foto

                    // Proses ubah ke Database
                    $sql2="update pendaftar_wisuda_rega set ta_sem='$TA_sem', nama='$nama', alamat='$alamat', tmpt_lhr='$tmpt_lhr', tgl_lhr='$tgl_lhr', jenkel='$jenkel', ipk='$ipk', judul_indo='$judul_indo', judul_english='$judul_english', pesan='$pesan', foto='$fotobaru' WHERE nim='$nim'";
                
                        if(mysqli_query($koneksi, $sql2))
                            {
                                echo '<script type="text/javascript">
                                    //<![CDATA[
                                        alert ("Berhasil Edit");
                                        window.location="form_edit_wisuda_mhs.php?nim='.$nim.' " ;
                                    //]]>
                                </script>';
                            } else 
                            {
                                 echo '<script type="text/javascript">
                                    //<![CDATA[
                                    alert ("Gagal Simpan, NB : jangan gunakan tanda petik");
                                    window.location="form_edit_wisuda_mhs.php?nim='.$nim.' " ;                        
                                    //]]>
                                </script>';
                            }
                   }
                   else // Jika proses upload gagal
                   { 
                        echo '<script type="text/javascript">
                                    //<![CDATA[
                                    alert ("Gagal Proses, Karena Anda Ceklist Ubah Foto, Tetapi Foto Belum Anda Pilih");
                                    window.location="form_edit_wisuda_mhs.php?nim='.$nim.' " ;                        
                                    //]]>
                                </script>';
                    }
            }
            else  // Jika user tidak menceklis checkbox yang ada di form, lakukan :
            {
                //Proses ubah ke Database
                $sql2="update pendaftar_wisuda_rega set ta_sem='$TA_sem', nama='$nama', alamat='$alamat', tmpt_lhr='$tmpt_lhr', tgl_lhr='$tgl_lhr', jenkel='$jenkel', ipk='$ipk', judul_indo='$judul_indo', judul_english='$judul_english', pesan='$pesan' WHERE nim='$nim'";
            
                if(mysqli_query($koneksi, $sql2))
                            {
                                echo '<script type="text/javascript">
                                    //<![CDATA[
                                        alert ("Berhasil Edit");
                                        window.location="form_edit_wisuda_mhs.php?nim='.$nim.' " ;
                                    //]]>
                                </script>';
                            } else 
                            {
                                 echo '<script type="text/javascript">
                                    //<![CDATA[
                                    alert ("Gagal Simpan, NB : jangan gunakan tanda petik");
                                    window.location="form_edit_wisuda_mhs.php?nim='.$nim.' " ;                        
                                    //]]>
                                </script>';
                            }
            }
        }

         ?>
               
    </div> <!-- /.row -->
         
    <hr/>
   	<footer>  <!-- Footer -->
        <div class="row">
            <div class="col-lg-12">
                <p>Copyright &copy; <a href="http://stikesmuhgombong.ac.id"> Universitas Muhammadiyah Gombong </a> - 2017</p>
            </div>
        </div>
    </footer> <!-- / end Footer -->
 

</div> <!-- /.container -->

<!-- end Page Content -->

<!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- css datepicker -->
    <!-- <link rel="stylesheet" href="css/bootstrap-datepicker.css" /> -->

    <!-- datepicker JavaScript -->  
    <script src="js/bootstrap-datepicker.js"></script>

    <!-- Script to Activate the Carousel -->
    <script>
    $('.carousel').carousel({
        interval: 5000 //changes the speed
    })

    $('.tanggal').datepicker({     // jika text bok tanggal di klik  
                format: 'yyyy-mm-dd',
          });


    </script>

</body>

</html>