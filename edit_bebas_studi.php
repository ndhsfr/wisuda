<?php $thisPage="SIM Pendaftaran Wisuda - EDIT BEBAS KEUANGAN"; ?>
<?php $title = "Sim Pendaftaran Wisuda" ?>
<?php $description = "halaman Edit Keuangan sistem Pendaftaran wisuda" ?>
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
                <h1 class="page-header">EDIT BEBAS STUDI mhs
                    <small>editing </small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="admin.php">Home Admin</a>
                    </li>
                    <li class="active">Edit Bebas Studi mhs</li>
                </ol>
            </div> <!-- / col lg 12 -->
        
            
        <div class="col-lg-12 col-sm-12 col-md-12">
            <form class="form-horizontal" action="" method="post" enctype="multipart/form-data"> <!-- Catatan : enctype="multipart/form-data" harus ditulis agar bisa upload file -->

                    <?php                    
                        $sql="select bebas_wisuda.* , ta_sem.* from bebas_wisuda, ta_sem where (nim='$_GET[nim]' and bebas_wisuda.ta_sem=ta_sem.ta_sem )" ;
						                       
                        $rs=mysqli_query($koneksi, $sql);
                        $row=mysqli_fetch_array($rs);
                    { ?>      
           
             <div class="col-xs-6 col-lg-6 col-sm-6 col-md-6">

                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Data mahasiswa dengan Nim = <?php echo $row['nim'];?> </h3>
                    </div>
                    <div class="panel-body">                    
                        
                        <div class="form-group">
                            <!-- <label class="col-sm-4 control-label">NIM</label> -->
                                <div class="col-sm-4">                                
                                    <input type="hidden" name="t_nim" id="t_nim" class="form-control" placeholder="Nim" value='<?php echo $row['nim'];?>' readonly>
                                </div>
                        </div>                                                                          
                                
                        
                        <div class="form-group">
                                <label class="col-sm-5 control-label">PROGRAM </label>
                                <div class="col-sm-5">
                                    <select name="s_program" id="s_program" class="form-control" required>
                                        <option value='<?php echo $row['program'];?>'><?php echo $row['program'];?></option>
                                        <option value=""> ------ </option>
                                        <option value="REG-A">REGULER A</option>
                                        <option value="REG-B">REGULER B</option>
                                    </select>
                                </div>
                            </div>  
                            <div class="form-group">
                                <label class="col-sm-5 control-label">TAHUN AKADEMIK </label>
                                <div class="col-sm-6">
                                <?php
                                    $query = "SELECT * FROM ta_sem";
                                    if($result = mysqli_query($koneksi, $query)){
                                        if($success = mysqli_num_rows($result) > 0){
                                            echo "<select class='form-control' name='s_ta' id='s_ta'>";
                                            echo "<option value='$row[ta_sem]'>$row[tahun_akademik] | $row[semester]</option>";
                                            echo "<option value=''> --------</option>";
                                            while($data = mysqli_fetch_array($result))
                                                echo "<option value='$data[ta_sem]'>$data[tahun_akademik] | $data[semester]</option>";
                                            
                                            echo "</select>";
                                        }
                                    }
                                ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-5 control-label">PRODI </label>
                                <div class="col-sm-5">
                                <?php
                                $query = "SELECT * FROM prodi";
                                if($result = mysqli_query($koneksi, $query)){
                                    if($success = mysqli_num_rows($result) > 0){
                                        echo "<select name='s_prodi' id='s_prodi' class='form-control' required>";
                                        echo "<option value='$row[prodi]'>$row[prodi]</option>";
                                        echo "<option value=''> --------</option>";
                                        while($data = mysqli_fetch_array($result))
                                            echo "<option value='$data[nm_prodi]'>$data[nm_prodi]</option>";
                                        
                                        echo "</select>";
                                    }
                                }
                                ?>
                                </div>
                            </div>  

                            					
                        <hr/> 
                        <div class="form-group">
                        <label class="col-sm-3 control-label"></label>
        				<div class="col-sm-3">
           					 <!-- <input type="submit" name="update" id="update" class="btn btn-sm btn-primary" value="Simpan" data-toggle="tooltip" title="Update Data"> -->
           					<button type="button" id="btn-update" class="btn btn-sm btn-info pull-right"><span class="glyphicon glyphicon-save"></span> UPDATE </button>
        				</div>         				      
        				<div class="col-sm-2">
        					<a href="admin.php" class="btn btn-sm btn-danger" data-toggle="tooltip" title="Batal"><span class="glyphicon glyphicon-repeat"></span>Cancel</a>
            			</div> 
            			</div> 
            			<hr/>
						<div class="col-sm-9">
            				<span> <b>Keterangan :</b> Nim Tidak Dapat di EDIT </span>  
            			</div>           	            
                    </div>      <!-- / panel-body -->
                </div>  <!-- / panel-body -->
             </div>  <!-- / col-lg-6 col-sm-6 col-md-6  -->
             <?php } ?>
            </form>  
            
        </div>   <!-- col-lg-12 col-sm-12 col-md-12 -->    	                     
    </div> <!-- /.row -->
         
    <hr/>
   	<footer>  <!-- Footer -->
        <div class="row">
            <div class="col-lg-12">
                <p>Copyright &copy; <a href="http://unimugo.ac.id">Universitas Muhammadiyah Gombong </a> - 2017</p>
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
    <!-- <script src="js/bootstrap-datepicker.js"></script> -->

    <!-- Script to Activate the Carousel -->
    <script>
    $('.carousel').carousel({
        interval: 5000 //changes the speed
    })

    </script>

    <script>
		$(document).ready(function() {

		    $('#btn-update').click(function() { 
		     
			 //var parameter = "nim=" + $(t_nim).val() + "&program=" + $(s_program).val() + "&ta_sem=" + $(s_ta).val() + "&prodi=" + $(s_prodi).val() + "&bebasprodi=" + $(s_bebas_prodi).val() + "&bebasperpus1=" + $(s_bebas_perpus1).val() + "&bebasperpus2=" + $(s_bebas_perpus2).val() + "&bebaslp3m=" + $(s_bebas_lp3m).val() + "&bebasuang=" + $(s_bebas_uang).val() + "&bebaslabkes=" + $(s_bebas_labkes).val() + "&bebascdc=" + $(s_bebas_cdc).val() ;
              
              var parameter = "nim=" + $(t_nim).val() + "&program=" + $(s_program).val() + "&ta_sem=" + $(s_ta).val() + "&prodi=" + $(s_prodi).val() ;

					 $.ajax({
				            type: 'POST', // Metode pengiriman data menggunakan POST
				          	url: 'ket_bebas/proses_update_bebas_studi.php', // File yang akan memproses data
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
											window.location="rekap_bebas_studi.php" ; 			
										}	
									else   // Jika statusnya = gagal
										 { 
											alert ("Gagal Tersimpan cak");
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