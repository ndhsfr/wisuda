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
            <div class="col-lg-12">
                <h1 class="page-header">PENDAFTARAN
                    <small>Wisuda</small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="index.php">Home</a>
                    </li>
                    <li class="active">Form Reg A</li>
                </ol>
            </div>
        </div>
        <!-- /.row -->

        <div class="row">
        <div class="col-xs-9 col-sm-9"> 
        	<form class="form-horizontal" action="" method="post" enctype="multipart/form-data">								
				<div class="panel panel-default">
	  				<div class="panel-heading">
	    				<h3 class="panel-title">Form Pendaftaran -&raquo; Wisuda</h3>
	  				</div>
	  				<div class="panel-body">
		          		
	          		
						<!--<div id="pesan-sukses" class="alert alert-success"></div> -->

						<?php
							include("pendaftar_reg-A/proses_save-2.php"); // memanggil file proses simpan
						?>
																	
						<!-- bagian ini merupakan bagian form untuk menginput data yang akan dimasukkan ke database -->
							
							<div class="form-group">
								<label class="col-sm-5 control-label">PROGRAM</label>
								<div class="col-sm-5">
									<select name="s_program" id="s_program" class="form-control" required>
										<option value=""> - KELAS - </option>
										<option value="REG-A">REGULER A</option>
										<option value="REG-B">REGULER B</option>
									</select>
								</div>
							</div>	

							<div class="form-group">
								<label class="col-sm-5 control-label">TAHUN AKADEMIK</label>
								<div class="col-sm-5">
								<?php
									$query = "SELECT * FROM ta_sem";
									if($result = mysqli_query($koneksi, $query)){
										if($success = mysqli_num_rows($result) > 0){
											echo "<select class='form-control' name='s_TA' id='s_TA' onclick='changeValue (this.value)' required>";
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
								<label class="col-sm-5 control-label">PRODI *</label>
								<div class="col-sm-4">
								<?php
									$query = "SELECT * FROM prodi";
									if($result = mysqli_query($koneksi, $query)){
										if($success = mysqli_num_rows($result) > 0){
											echo "<select name='s_prodi' id='s_prodi' class='form-control' required>";
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
								<label class="col-sm-5 control-label">NIM </label>
								<div class="col-sm-4">
									<input type="text" name="t_nim" id="t_nim" class="form-control" placeholder="No Induk Mahasiswa" required>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-5 control-label">NAMA </label>
								<div class="col-sm-7">
									<input type="text" name="t_nama" id="t_nama" class="form-control" placeholder="Nama" required>
								</div>
							</div>							
							<div class="form-group">
								<label class="col-sm-5 control-label">Tempat Lahir</label>
								<div class="col-sm-4">
									<input type="text" name="t_tmpt_lhr" id="t_tmpt_lhr" class="form-control" placeholder="Tempat Lahir" required>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-5 control-label">Tanggal Lahir</label>
								<div class="col-sm-4">
								<input class="input-group tanggal form-control" type="text" name="t_tgl_lhr" id="t_tgl_lhr" date="" data-date-format="yyyy-mm-dd" placeholder="yyyy-mm-dd" required>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-5 control-label">Alamat</label>
								<div class="col-sm-7">
									<textarea name="t_alamat" id="t_alamat" class="form-control" placeholder="Alamat" required></textarea>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-5 control-label">Jenis Kelamin</label>
								<div class="col-sm-3">
									<select name="t_jenkel" id="t_jenkel" class="form-control" required>
										<option value=""> -Jenis Kelamin- </option>
										<option value="L">L</option>
										<option value="P">P</option>
									</select>
								</div>
							</div>						
				 			<div class="form-group">
								<label class="col-sm-5 control-label">IPK Semester Akhir</label>
								<div class="col-sm-3">
									<input type="text" name="t_ipk" id="t_ipk" class="form-control" placeholder="IPK" required>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-5 control-label">Judul Skripsi (indonesia)</label>
								<div class="col-sm-7">
									<textarea name="t_judul_indo" id="t_judul_indo" class="form-control" placeholder="Judul Skripsi Versi Indonesia" required></textarea>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-5 control-label">Judul Skripsi (english)</label>
								<div class="col-sm-7">
									<textarea name="t_judul_english" id="t_judul_english" class="form-control" placeholder="Judul Skripsi Versi English" required></textarea>
								</div>
							</div>	
							<div class="form-group">
								<label class="col-sm-5 control-label">Kesan & Pesan</label>
								<div class="col-sm-7">
									<textarea name="t_pesan" id="t_pesan" class="form-control" placeholder="Kesan Dan pesan Selama menjadi Mhs di STIKES" required></textarea>
								</div>
							</div>	
							<div class="form-group">
								<label class="col-sm-5 control-label">Pas Foto</label>
								<div class="col-sm-4">
									<input type="file" id="foto" name="foto" required>										
								</div>
								<span class="label label-success">MAX : 50.KB</span> 
							</div>	
																
							<div class="form-group">
								<label class="col-sm-5 control-label">&nbsp;</label>
								<div class="col-sm-5">
									<!-- <button type="button" id="btn-save" class="btn btn-success pull-right"><span class="glyphicon glyphicon-plus"></span> SAVE </button> -->
									<button type="reset" id="btn-reset" class="btn btn-danger"><span class="glyphicon glyphicon-stop"></span> Reset </button>

									<input type="submit" name="save" id="save" class="btn btn-sm btn-primary" value="simpan" data-toggle="tooltip" title="Simpan Data">
									<!-- <a href="" class="btn btn-sm btn-danger" data-toggle="tooltip" title="Batal">Batal</a> -->
								</div>
							</div>
							<hr/><span> <b>Keterangan :</b><br/> Tidak Boleh Ada Yang Kosong</span>
					</div> <!--/.panel body-->
				</div><!--/.class=panel default-->
			</form>
		</div><!--/.col-xs-9.col-sm-6-->
		</div>

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
    <!-- <script src="js/jquery-3.2.1.js"></script> -->

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- css datepicker -->
    <link rel="stylesheet" href="css/bootstrap-datepicker.css" />

    <!-- datepicker JavaScript -->	
    <script src="js/bootstrap-datepicker.js"></script>
    

    
    <script>
	    // Script to Activate the Carousel
	    // $('.carousel').carousel({
	    //     interval: 5000 //changes the speed
	    // }) 

	    $('.tanggal').datepicker({     // jika text bok tanggal di klik  
	            format: 'yyyy-mm-dd',
	      });  
    </script>   
    
</body>

</html>