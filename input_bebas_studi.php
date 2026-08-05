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
            <div class="col-lg-12">
                <h1 class="page-header">Input NIM MHS
                    <small>untuk bebas studi </small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="admin.php">Home Admin</a>
                    </li>
                    <li class="active">Input Nim</li>
                </ol>
            </div>
        </div>
        <!-- /.row -->

        <div class="row">

        <!-- <div class="col-xs-6 col-sm-6">         							
				<div class="panel panel-default">
	  				<div class="panel-heading">
	    				<h3 class="panel-title">Cek Mahasiswa-&raquo; </h3>
	  				</div>
	  				<div class="panel-body">
	  					<div class="form-group">
							<label class="col-sm-2 control-label">NIM *</label>
							<div class="col-sm-6">
								<input type="text" name="t_nim1" id="t_nim1" class="form-control" placeholder="No Induk Mahasiswa" required>
							</div>
							<div class="col-sm-3">
								<button type="button" id="btn-cari" class="btn btn-info pull-right"><span class="glyphicon glyphicon-search"></span> CEK </button>									
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-5 control-label"></label>

						</div>
	  				</div>
	  			</div>
	  	</div> -->


        <div class="col-xs-6 col-sm-6"> 
        	<form class="form-horizontal" action="" method="post" enctype="multipart/form-data">								
				<div class="panel panel-default">
	  				<div class="panel-heading">
	    				<h3 class="panel-title">Input Nim -&raquo; untuk membuat srt bebas studi</h3>
	  				</div>
	  				<div class="panel-body">
		          		
	          		
						<!--<div id="pesan-sukses" class="alert alert-success"></div> -->

						<?php
							// include("pendaftar_reg-A/proses_save.php"); // memanggil file proses simpan
						?>
																	
						<!-- bagian ini merupakan bagian form untuk menginput data yang akan dimasukkan ke database -->
							
							<div class="form-group">
								<label class="col-sm-5 control-label">PROGRAM *</label>
								<div class="col-sm-5">
									<select name="s_program" id="s_program" class="form-control" required>
										<option value=""> - KELAS - </option>
										<option value="REG-A">REGULER A</option>
										<option value="REG-B">REGULER B</option>
									</select>
								</div>
							</div>	
							<div class="form-group">
								<label class="col-sm-5 control-label">TAHUN AKADEMIK *</label>
								<div class="col-sm-6">
								<?php
								$query = "SELECT * FROM ta_sem";
								if($result = mysqli_query($koneksi, $query)){
									if($success = mysqli_num_rows($result) > 0){
										echo "<select class='form-control' name='s_TA' id='s_TA' onclick='changeValue (this.value)' required>";
										echo "<option value=''> - TA & Semester -</option>";
										
										while($row = mysqli_fetch_array($result))
											echo "<option value='$row[ta_sem]'>$row[tahun_akademik] | $row[semester]</option>";
										
										echo "</select>";
									}
								}
								?>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-5 control-label">PRODI *</label>
								<div class="col-sm-5">
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
								<label class="col-sm-5 control-label">NIM *</label>
								<div class="col-sm-5">
									<input type="text" name="t_nim" id="t_nim" class="form-control" placeholder="No Induk Mahasiswa" required>
								</div>
							</div>	
							<!-- <div class="form-group">
								<label class="col-sm-5 control-label">BEBAS PRODI</label>
								<div class="col-sm-5">
									<select name="s_bebas" id="s_bebas" class="form-control" required>
										<option value=""> - pilih - </option>
										<option value="1">OK</option>
										<option value="">BELUM</option>
									</select>
								</div>
							</div>																
 -->							<div class="form-group">
								<label class="col-sm-5 control-label">&nbsp;</label>
								<div class="col-sm-6">
									<button type="button" id="btn-save" class="btn btn-success pull-right"><span class="glyphicon glyphicon-plus"></span> SAVE </button>
									<button type="reset" id="btn-reset" class="btn btn-danger"><span class="glyphicon glyphicon-stop"></span> Reset </button>

									<!-- <input type="submit" name="save" id="save" class="btn btn-sm btn-primary" value="simpan" data-toggle="tooltip" title="Simpan Data"> -->
									<!-- <a href="" class="btn btn-sm btn-danger" data-toggle="tooltip" title="Batal">Batal</a> -->
								</div>
							</div>
							<hr/><span> <b>Keterangan :</b><br/> *) Tidak Boleh Ada Yang Kosong</span>
					</div> <!--/.panel body-->
				</div><!--/.class=panel default-->
			</form>
		</div><!--/.col-xs-6.col-sm-6-->
		</div>

		<hr/>

   		<footer>  <!-- Footer -->
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; <a href="http://unimugo.ac.id"> Universitas Muhammadiyah Gombong </a> - 2017</p>
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
    </script>

    

    <script>

	$(document).ready(function() {

		
		// $('#btn-cari').click(function() { // Jika tombol button simpan - di klik
	     	 
		//  var 		   
		// 	parameter = "nim_cari=" + $(t_nim1).val() ; 
		 
		// if ( ($(t_nim1).val() != "") )
		// 	{
		//  	 $.ajax({
		// 			type: 'POST', // Metode pengiriman data menggunakan POST
		// 			url: 'ket_bebas/proses_cari.php', // File yang akan memproses data
		
		// 			data: parameter,
		
		// 			beforeSend: function(e) 
		// 			{
		// 				if(e && e.overrideMimeType) 
		// 				{
		// 					e.overrideMimeType("application/json;charset=UTF-8");
		// 				}
		// 			},
		// 			success: function() // Ketika proses pengiriman berhasil
		// 			{ 								
		// 				if(response.status == "kosong") // Jika Statusnya = sukses
		// 					{ 
		// 						alert ("Nim Tersebut Belum ada !");														
		// 					}	
		// 				else if(response.status == "error")  // Jika statusnya = gagal
		// 					 { 
		// 						alert ("Nim Tersebut Sudah Ada!");							
		// 					}					
		// 			},
		// 			error: function (xhr, ajaxOptions, thrownError)  // Ketika terjadi error
		// 		 	{ 
		// 				alert(xhr.responseText); // Munculkan alert
		// 				//alert ("error bro");
		// 			}
		// 	   });  // tutup ajax
		//   	}
		//   	else { alert (" isi dulu NIM yang akan di cari"); }
	 //    });   


	    $('#btn-save').click(function() { // Jika tombol button simpan - di klik
	     	 
		 var 
		   
			parameter = "program=" + $(s_program).val() + "&ta_sem=" + $(s_TA).val() + "&prodi=" + $(s_prodi).val() + "&nim=" + $(t_nim).val() ; 
		 
		if ( ($(s_program).val() != "") & ($(s_TA).val() != "") & ($(s_prodi).val() != "") & ($(t_nim).val() != "") )
			{
		 	 $.ajax({
					type: 'POST', // Metode pengiriman data menggunakan POST
					url: 'ket_bebas/proses_save.php', // File yang akan memproses data
					//data:  data,
					data: parameter,
					//processData: false,
					//contentType: false,
					//dataType: "json",

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
								$("#btn-reset").click();								
							}	
						else if(response.status == "gagal")  // Jika statusnya = gagal
							 { 
								alert ("Gagal Tersimpan");							
							}
						else if(response.status == "dobel")  // Jika statusnya = doble atau sudah ada no pendaftaran
							{ 
								alert ("NIM sudah Terdaftar");							
							}
						
					},
					error: function (xhr, ajaxOptions, thrownError)  // Ketika terjadi error
				 	{ 
						alert(xhr.responseText); // Munculkan alert
						//alert ("error bro");
					}
			   });  // tutup ajax
		  	}
		  	else { alert ("Yang bertanda bintang *) harus di isi"); }
	    });   // tutup function #simpan	    
	  
 	});

</script>

</body>

</html>