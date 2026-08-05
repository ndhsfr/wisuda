<?php $thisPage="SIM Pendaftaran Wisuda - INDEX"; ?>
<?php $title = "Sim Pendaftaran Wisuda" ?>
<?php $description = "halaman index sistem Pendaftaran wisuda" ?>
<?php 
// require('akses_login.php');
include("header_admin.php"); // memanggil file header.php
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
                    <li><a href="admin.php">Home Admin</a>
                    </li>
                    <li class="active">Edit Data Pendaftar Wisuda</li>
                </ol>
            </div> <!-- / col lg 12 -->
        
            
        <div class="col-lg-12 col-sm-12 col-md-12">
            

                    <?php                    
                        $sql="select pendaftar_wisuda_rega.*, tahun_akademik, semester from pendaftar_wisuda_rega, ta_sem where (nim='$_GET[nim]' and pendaftar_wisuda_rega.ta_sem=ta_sem.ta_sem)" ;
                         
                        $rs=mysqli_query($koneksi, $sql);
                        $row=mysqli_fetch_array($rs);
                    { ?>

            <table>
                <tr>
                    <td width="57"><b>Program</b></td>
                    <td width="10"></td>
                    <td width="3">:</td>
                    <td width="10"></td>
                    <td width="251"><?php echo $row['program'];?></td>
                    <td width="10">&nbsp;</td>
                    <td width="10">&nbsp;</td>
                    <td width="92" rowspan="3"><a href="export/form_pendaftar_wisuda_pdf.php?nim=<?php echo $row['nim']; ?>"  title="View Detil" data-toggle="tooltip" class="btn btn-success btn-sm small" target="_blank"><span class="glyphicon glyphicon-search">Cetak</span></a></td>
                </tr>                   
                <tr>
                    <td><b>Prodi</b></td>
                    <td width="10"></td>
                    <td>:</td>
                    <td width="10"></td>
                    <td><?php echo $row['prodi'];?></td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td><b>Nim </b></td>
                    <td width="10"></td>
                    <td>:</td>
                    <td width="10"></td>
                    <td><?php echo $row['nim'];?>
                    <input type="hidden" name="t_nim" id="t_nim" class="form-control" value='<?php echo $row['nim'];?>'>

                    </td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                </tr>                
            </table>
            <hr/>

            
            <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#home">EDIT1 : <b>Biodata Wisuda</b></a></li>
                <li><a data-toggle="tab" href="#menu1">EDIT2 : <b>Kelengkapan Berkas</b></a></li>                
            </ul>
                            
            <div class="tab-content">
                <!-- ============================================================================ -->
                <div id="home" class="tab-pane fade in active">
                    <h3>Biodata Wisuda</h3>

                <form class="form-horizontal" action="" method="post" enctype="multipart/form-data"> <!-- Catatan : enctype="multipart/form-data" harus ditulis agar bisa upload file -->

                    <div class="col-lg-3 col-sm-4 col-md-4">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title">Edit Foto</h3>
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
                                <h3 class="panel-title">Edit Data Pendaftar Wisuda </h3>
                            </div>
                            <div class="panel-body">   

                                <!-- <div class="form-group">                          
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
                                <hr/> -->

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
                                            <input type="text" name="t_nama" id="t_nama" class="form-control" placeholder="Nama" value="<?php echo $row['nama'];?>">
                                        </div>
                                </div>                          
                                            
                                <div class="form-group">
                                    <label class="col-sm-5 control-label">Tempat Lahir</label>
                                        <div class="col-sm-4">
                                            <input type="text" name="t_tmpt_lhr" id="t_tmpt_lhr" class="form-control" placeholder="Tempat Lahir" value='<?php echo $row['tmpt_lhr'];?>'>
                                        </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-5 control-label">Tanggal Lahir</label>
                                        <div class="col-sm-4">
                                            <input class="input-group tanggal form-control" type="text" name="t_tgl_lhr" id="t_tgl_lhr" date="" data-date-format="yyyy-mm-dd" placeholder="yyyy-mm-dd" value='<?php echo $row['tgl_lhr'];?>'>
                                        </div>
                                </div>
                                        
                                <div class="form-group">
                                    <label class="col-sm-5 control-label">Alamat</label>
                                        <div class="col-sm-7">
                                            <textarea name="t_alamat" id="t_alamat" class="form-control" value='<?php echo $row['alamat'];?>'><?php echo $row['alamat']; ?></textarea>
                                        </div>
                                </div>
                                        
                                <div class="form-group">
                                    <label class="col-sm-5 control-label">Jenis Kelamin</label>
                                        <div class="col-sm-3">
                                            <select name="t_jenkel" id="t_jenkel" class="form-control" >
                                                <option value='<?php echo $row['jenkel'];?>' ><?php echo $row['jenkel'];?></option>
                                                <option value=""> -Jenis Kelamin- </option>
                                                <option value="L">L</option>
                                                <option value="P">P</option>
                                            </select>
                                        </div>
                                </div>                      
                                        
                                <div class="form-group">
                                    <label class="col-sm-5 control-label">IPK Semester Akhir</label>
                                        <div class="col-sm-3">
                                            <input type="text" name="t_ipk" id="t_ipk" class="form-control" placeholder="IPK" value='<?php echo $row['ipk'];?>'>
                                        </div>
                                </div>
                                        
                                <div class="form-group">
                                    <label class="col-sm-5 control-label">Judul Skripsi (indonesia)</label>
                                        <div class="col-sm-7">
                                            <textarea name="t_judul_indo" id="t_judul_indo" class="form-control" placeholder="Judul Skripsi Versi Indonesia" value='<?php echo $row['judul_indo'];?>'><?php echo $row['judul_indo']; ?> </textarea>
                                        </div>
                                </div>
                                        
                                <div class="form-group">
                                    <label class="col-sm-5 control-label">Judul Skripsi (english)</label>
                                        <div class="col-sm-7">
                                            <textarea name="t_judul_english" id="t_judul_english" class="form-control" placeholder="Judul Skripsi Versi English" value='<?php echo $row['judul_english'];?>'><?php echo $row['judul_english']; ?></textarea>
                                        </div>
                                </div>  
                                        
                                <div class="form-group">
                                    <label class="col-sm-5 control-label">Kesan & Pesan</label>
                                        <div class="col-sm-7">
                                            <textarea name="t_pesan" id="t_pesan" class="form-control" placeholder="Kesan Dan pesan Selama menjadi Mhs di STIKES" value='<?php echo $row['pesan'];?>'><?php echo $row['pesan']; ?> </textarea>
                                        </div>
                                </div>   

                                <div class="form-group">
                                    <label class="col-sm-5 control-label">NOMOR SK</label>
                                        <div class="col-sm-7">
                                            <input type="text" name="t_no_sk" id="t_no_sk" class="form-control" placeholder="No SK Wisuda" value='<?php echo $row['no_sk'];?>'>
                                        </div>
                                </div>


                            </div>      <!-- / panel-body -->
                        </div>  <!-- / panel-body -->
                    </div>  <!-- / col-lg-7 col-sm-8 col-md-8  -->
                     <?php } ?>
                    
                    
                    
                    <div class="col-sm-4">
                        <input type="submit" name="update1" id="update1" class="btn btn-sm btn-primary" value="UPDATE" data-toggle="tooltip" title="Update Data">
                        <a href="view_pendaftar.php" class="btn btn-sm btn-danger" data-toggle="tooltip" title="Batal">Cancel / Back To VIEW Table</a>
                    </div>                     
                    <div class="col-sm-5">
                        <span> <b>Keterangan :</b><br/> Nim Tidak Dapat di EDIT</span>
                    </div>
                
                </form>                        

                </div> <!-- end home --> 

                <!-- ============================================================================ -->
                <div id="menu1" class="tab-pane fade">
                	<h3>Kelengkapan Berkas</h3>
                
                <form class="form-horizontal" action="" method="post" enctype="multipart/form-data"> <!-- Catatan : enctype="multipart/form-data" harus ditulis agar bisa upload file -->
                    
                    <div class="col-lg-7 col-sm-7 col-md-7">

                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title">Berkas Yang di Kumpulkan</h3>
                            </div>

                            <div class="panel-body">                        
                                <div class="form-group">
                                    <label class="col-sm-5 control-label">PAS FOTO 4X6 (2 lbr)</label>
                                    <div class="col-sm-1">
                                        <?php $status = $row['pas_foto46']; 
                                        if ($status == 1 ) $check = 'checked'; else $check = '';
                                            echo '<input type="checkbox" name="cb_pas_foto46" value="'.$status.'"'.$check.'>' ?>
                                    </div>
                                    <div class="col-sm-2">
                                       <?php
                                           if ($status == 1 ) {
                                                $pesan = 'ada' ;  ?>
                                                <span class="label label-success"><?php  echo "$pesan" ?></span>  <?php } 
                                            else {
                                                $pesan = 'belum Ada'; ?>
                                                <span class="label label-danger"><?php  echo "$pesan" ?></span> <?php } ?>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-5 control-label">FC Sertifikat Baitul Arqam</label>
                                    <div class="col-sm-1">
                                        <?php $status = $row['fc_BAPS']; 
                                        if ($status == 1 ) $check = 'checked'; else $check = '';
                                            echo '<input type="checkbox" name="cb_BAPS" value="'.$status.'"'.$check.'>' ?>
                                    </div>
                                    <div class="col-sm-2">
                                       <?php
                                           if ($status == 1 ) {
                                                $pesan = 'ada' ;  ?>
                                                <span class="label label-success"><?php  echo "$pesan" ?></span>  <?php } 
                                            else {
                                                $pesan = 'belum Ada'; ?>
                                                <span class="label label-danger"><?php  echo "$pesan" ?></span> <?php } ?>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-5 control-label">FC Sertifikat Ibadah(HPT)</label>
                                    <div class="col-sm-1">
                                        <?php $status = $row['fc_HPT']; 
                                        if ($status == 1 ) $check = 'checked'; else $check = '';
                                            echo '<input type="checkbox" name="cb_HPT" value="'.$status.'"'.$check.'>' ?>
                                    </div>
                                    <div class="col-sm-2">
                                       <?php
                                           if ($status == 1 ) {
                                                $pesan = 'ada' ;  ?>
                                                <span class="label label-success"><?php  echo "$pesan" ?></span>  <?php } 
                                            else {
                                                $pesan = 'belum Ada'; ?>
                                                <span class="label label-danger"><?php  echo "$pesan" ?></span> <?php } ?>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-5 control-label">FC Abstrak (Indonesia)</label>
                                    <div class="col-sm-1">
                                        <?php $status = $row['fc_abstrak_indo']; 
                                        if ($status == 1 ) $check = 'checked'; else $check = '';
                                            echo '<input type="checkbox" name="cb_abstrak_indo" value="'.$status.'"'.$check.'>' ?>
                                    </div>
                                    <div class="col-sm-2">
                                       <?php
                                           if ($status == 1 ) {
                                                $pesan = 'ada' ;  ?>
                                                <span class="label label-success"><?php  echo "$pesan" ?></span>  <?php } 
                                            else {
                                                $pesan = 'belum Ada'; ?>
                                                <span class="label label-danger"><?php  echo "$pesan" ?></span> <?php } ?>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-5 control-label">FC Abstrak (English)</label>
                                    <div class="col-sm-1">
                                        <?php $status = $row['fc_abstrak_english']; 
                                        if ($status == 1 ) $check = 'checked'; else $check = '';
                                            echo '<input type="checkbox" name="cb_abstrak_english" value="'.$status.'"'.$check.'>' ?>
                                    </div>
                                    <div class="col-sm-2">
                                       <?php
                                           if ($status == 1 ) {
                                                $pesan = 'ada' ;  ?>
                                                <span class="label label-success"><?php  echo "$pesan" ?></span>  <?php } 
                                            else {
                                                $pesan = 'belum Ada'; ?>
                                                <span class="label label-danger"><?php  echo "$pesan" ?></span> <?php } ?>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-5 control-label">FC Ijazah Terakhir</label>
                                    <div class="col-sm-1">
                                        <?php $status = $row['fc_ijazah_terakhir']; 
                                        if ($status == 1 ) $check = 'checked'; else $check = '';
                                            echo '<input type="checkbox" name="cb_ijazah" value="'.$status.'"'.$check.'>' ?>
                                       
                                    </div>
                                    <div class="col-sm-2">
                                       <?php
                                           if ($status == 1 ) {
                                                $pesan = 'ada' ;  ?>
                                                <span class="label label-success"><?php  echo "$pesan" ?></span>  <?php } 
                                            else {
                                                $pesan = 'belum Ada'; ?>
                                                <span class="label label-danger"><?php  echo "$pesan" ?></span> <?php } ?>
                                    </div>
                                </div>                                               
                    

                                <hr/>
                                <div class="col-sm-5">
                                    <input type="submit" name="update2" id="update2" class="btn btn-sm btn-primary" value="Update" data-toggle="tooltip" title="Update Data">

                                    <!-- <button type="button" id="btn-update" class="btn btn-sm btn-info pull-right"><span class="glyphicon glyphicon-save"></span> UPDATE </button> -->

                                    <a href="view_pendaftar.php" class="btn btn-sm btn-danger" data-toggle="tooltip" title="Batal">Batal</a>
                                </div>                                
                            </div>	<!-- panel body --> 
                        </div>   <!-- panel default -->
                    </div>    <!-- col-lg-7 col-sm-7  -->
                
                </form>   	

                </div> <!-- endmenu1 -->                 
            </div> <!-- tab content -->
         	
        </div>   <!-- col-lg-12 col-sm-12 col-md-12 --> 

        			
        			<!--  ============================  PROSES MENYIMPAN TAB 2 ==================================== -->

        			<?php 
                        if(isset($_POST['update1']))
                        { // jika tombol 'update' ditekan

                            $nim     = $_GET['nim'];

                            // $program                  = $_POST['s_program'];
                                    // $TA_sem                 = $_POST['s_TA'];
                            // $prodi                  = $_POST['s_prodi'];
                            // $nim                    = $_POST['t_nim'];
                                    // $nama                   = $_POST['t_nama'];
                                    // $tmpt_lhr               = $_POST['t_tmpt_lhr'];
                                    // $tgl_lhr                = $_POST['t_tgl_lhr'];
                                    // $alamat                 = $_POST['t_alamat'];
                                    // $jenkel                 = $_POST['t_jenkel'];
                                    // $ipk                    = $_POST['t_ipk'];
                                    // $judul_indo             = $_POST['t_judul_indo'];
                                    // $judul_english          = $_POST['t_judul_english'];
                                    // $pesan                  = $_POST['t_pesan'];
                                    // $no_sk                  = $_POST['t_no_sk'];
                                            
                                        
                            $ta_sem                 = mysqli_real_escape_string($koneksi, htmlentities($_POST['s_TA']));
                            
                            $nama                   = mysqli_real_escape_string($koneksi, htmlentities($_POST['t_nama']));
                            $tmpt_lhr               = mysqli_real_escape_string($koneksi, htmlentities($_POST['t_tmpt_lhr']));
                            $tgl_lhr                = mysqli_real_escape_string($koneksi, htmlentities($_POST['t_tgl_lhr']));
                            $alamat                 = mysqli_real_escape_string($koneksi, htmlentities($_POST['t_alamat']));
                            $jenkel                 = mysqli_real_escape_string($koneksi, htmlentities($_POST['t_jenkel']));
                            $ipk                    = mysqli_real_escape_string($koneksi, htmlentities($_POST['t_ipk']));
                            $judul_indo             = mysqli_real_escape_string($koneksi, htmlentities($_POST['t_judul_indo']));
                            $judul_english          = mysqli_real_escape_string($koneksi, htmlentities($_POST['t_judul_english']));
                            $pesan                  = mysqli_real_escape_string($koneksi, htmlentities($_POST['t_pesan']));
                            $no_sk                  = mysqli_real_escape_string($koneksi, htmlentities($_POST['t_no_sk'])); 

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
                                    $sql2="update pendaftar_wisuda_rega set ta_sem='$ta_sem', nama='$nama', alamat='$alamat', tmpt_lhr='$tmpt_lhr', tgl_lhr='$tgl_lhr', jenkel='$jenkel', ipk='$ipk', judul_indo='$judul_indo', judul_english='$judul_english', pesan='$pesan', foto='$fotobaru', no_sk='$no_sk' WHERE nim='$nim'";
                                
                                        if(mysqli_query($koneksi, $sql2))
                                            {
                                                echo '<script type="text/javascript">
                                                    //<![CDATA[
                                                        alert ("Berhasil Edit");
                                                        window.location="form_edit_pendaftar.php?nim='.$nim.' " ;
                                                    //]]>
                                                </script>';
                                            } else 
                                            {
                                                 echo '<script type="text/javascript">
                                                    //<![CDATA[
                                                    alert ("Gagal Simpan");
                                                    window.location="form_edit_pendaftar.php?nim='.$nim.' " ;                        
                                                    //]]>
                                                </script>';
                                            }
                                   }
                                   else // Jika proses upload gagal
                                   { 
                                        echo '<script type="text/javascript">
                                                    //<![CDATA[
                                                    alert ("Gagal Proses, Karena Anda Ceklist Ubah Foto, Tetapi Foto Belum Anda Pilih");
                                                    window.location="form_edit_pendaftar.php?nim='.$nim.' " ;                        
                                                    //]]>
                                                </script>';
                                    }
                            }
                            else  // Jika user tidak menceklis checkbox yang ada di form, lakukan :
                            {
                                //Proses ubah ke Database
                                $sql2="update pendaftar_wisuda_rega set ta_sem='$ta_sem', nama='$nama', alamat='$alamat', tmpt_lhr='$tmpt_lhr', tgl_lhr='$tgl_lhr', jenkel='$jenkel', ipk='$ipk', judul_indo='$judul_indo', judul_english='$judul_english', pesan='$pesan', no_sk='$no_sk' WHERE nim='$nim'";
                            
                                if(mysqli_query($koneksi, $sql2))
                                            {
                                                echo '<script type="text/javascript">
                                                    //<![CDATA[
                                                        alert ("Berhasil Edit");
                                                        window.location="form_edit_pendaftar.php?nim='.$nim.' " ;
                                                    //]]>
                                                </script>';
                                            } else 
                                            {
                                                 echo '<script type="text/javascript">
                                                    //<![CDATA[
                                                    alert ("Gagal Simpan");
                                                    window.location="form_edit_pendaftar.php?nim='.$nim.' " ;                        
                                                    //]]>
                                                </script>';
                                            }
                            }
                        }
                    ?>


                    <!--  ============================  PROSES MENYIMPAN TAB 2 ==================================== -->

                    <?php

                    	if(isset($_POST['update2']))
						{
							//============================ VARIABLE TAB 2 ========================
							
							 $nim		 = $_GET['nim'];														
							
							if (isset($_POST['cb_pas_foto46'])) 
			                    $pas_foto46 = 1 ; else $pas_foto46 = 0 ; 
			                                                      
			                if (isset($_POST['cb_BAPS'])) 
			                   $fc_BAPS = 1 ; else $fc_BAPS = 0 ; 
			                                                      
			                if (isset($_POST['cb_HPT'])) 
			                   $fc_HPT = 1 ; else $fc_HPT = 0 ; 
			                                                      
			                if (isset($_POST['cb_abstrak_indo'])) 
			                    $fc_abstrak_indo = 1 ; else $fc_abstrak_indo = 0 ;
			                                      
			                if (isset($_POST['cb_abstrak_english'])) 
			                   $fc_abstrak_english = 1 ; else $fc_abstrak_english = 0 ;
			                                                      
			                if (isset($_POST['cb_ijazah'])) 
			                   $fc_ijazah_terakhir = 1 ; else $fc_ijazah_terakhir = 0 ;
							
							
										
							$sql2="update pendaftar_wisuda_rega set pas_foto46='$pas_foto46', fc_BAPS='$fc_BAPS', fc_HPT='$fc_HPT', fc_abstrak_indo='$fc_abstrak_indo', fc_abstrak_english='$fc_abstrak_english', fc_ijazah_terakhir='$fc_ijazah_terakhir' WHERE nim='$nim' ";
								
							$hasil	= mysqli_query($koneksi, $sql2);
								
								if ($hasil) // Jika proses update berhasil
									{
										echo '<script type="text/javascript">
												//<![CDATA[
													alert ("Berhasil Edit");	
													window.location="form_edit_pendaftar.php?nim='.$nim.' " ;									
												//]]>
												</script>';
									} 
									else 
									{
										echo '<script type="text/javascript">
												//<![CDATA[
													alert ("Gagal Simpan");	
													window.location="form_edit_pendaftar.php?nim='.$nim.' " ;								
												//]]>
												</script>';
									}
						} ?>
                                  
                        
    </div> <!-- /.row -->
         
    <hr/>
   	<footer>  <!-- Footer -->
        <div class="row">
            <div class="col-lg-12">
                <p>Copyright &copy; <a href="http://stikesmuhgombong.ac.id"> Stikes Muhammadiyah Gombong </a> - 2017</p>
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

    <script>
        $(document).ready(function() {

            $('#btn-update').click(function() { 


            var parameter = "nim=" + $(t_nim).val() + "&pas_foto46=" + $(cb_pas_foto46).checked() + "&fc_BAPS=" + $(cb_BAPS).checked() + "&fc_HPT=" + $(cb_HPT).checked() + "&fc_abstrak_indo=" + $(cb_abstrak_indo).checked() + "&fc_abstrak_english=" + $(cb_abstrak_english).checked() + "&fc_ijazah_terakhir=" + $(cb_ijazah).checked() ;
             
             // var parameter = "nim=" + $(t_nim).val() + "&pas_foto46=" + $(cb_pas_foto46).val() + "&fc_BAPS=" + $(cb_BAPS).val() + "&fc_HPT=" + $(cb_HPT).val() + "&fc_abstrak_indo=" + $(cb_abstrak_indo).val() + "&fc_abstrak_english=" + $(cb_abstrak_english).val() + "&fc_ijazah_terakhir=" + $(cb_ijazah).val() ;

                if (isset($_POST['cb_pas_foto46'])) 
                    $pas_foto46 = 1 ; else $pas_foto46 = 0 ; 
                                                      
                if (isset($_POST['cb_BAPS'])) 
                   $fc_BAPS = 1 ; else $fc_BAPS = 0 ; 
                                                      
                if (isset($_POST['cb_HPT'])) 
                   $fc_HPT = 1 ; else $fc_HPT = 0 ; 
                                                      
                if (isset($_POST['cb_abstrak_indo'])) 
                    $fc_abstrak_indo = 1 ; else $fc_abstrak_indo = 0 ;
                                      
                if (isset($_POST['cb_abstrak_english'])) 
                   $fc_abstrak_english = 1 ; else $fc_abstrak_english = 0 ;
                                                      
                if (isset($_POST['cb_ijazah'])) 
                   $fc_ijazah_terakhir = 1 ; else $fc_ijazah_terakhir = 0 ;

               // var parameter = "nim=" + $(t_nim).val() + "&pas_foto46=" + $pas_foto46 + "&fc_BAPS=" + $fc_BAPS + "&fc_HPT=" + $fc_HPT + "&fc_abstrak_indo=" + $fc_abstrak_indo + "&fc_abstrak_english=" + $fc_abstrak_english + "&fc_ijazah_terakhir=" + $fc_ijazah_terakhir ;


                     $.ajax({
                            type: 'POST', // Metode pengiriman data menggunakan POST
                            url: 'pendaftar_reg-A/proses_update_pendaftar_wisuda.php', // File yang akan memproses data
                            data:  parameter,           
                            
                            beforeSend: function(e) 
                                {
                                    if(e && e.overrideMimeType) 
                                    {
                                        e.overrideMimeType("application/json;charset=UTF-8");
                                    }
                                },
                            success: function(response) // Ketika proses pengiriman berhasil
                                {                               
                                    if(response.status == "sukses") // Jika Statusnya = sukses
                                        { 
                                            alert ("Berhasil Tersimpan");
                                            // $("#pesan-sukses2").html(response.pesan).fadeIn().delay(5000).fadeOut(); 
                                            // $("#pesan-gagal2").html(response.pesan).hide();  
                                            window.location="view_pendaftar_rega.php" ;            
                                        }   
                                    else   // Jika statusnya = gagal
                                         { 
                                            alert ("Gagal Tersimpan");
                                            // $("#pesan-gagal2").html(response.pesan).fadeIn().delay(5000).fadeOut();
                                            // $("#pesan-sukses2").html(response.pesan).hide();
                                        }
                                },
                             error: function (xhr, ajaxOptions, thrownError)  // Ketika terjadi error
                                { 
                                    alert(xhr.responseText); // Munculkan alert
                                }
                       }); // tutup ajax                
            });  // ttup function - btn-update
        });  // tutup document ready

    </script>

</body>

</html>