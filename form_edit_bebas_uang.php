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
                <h1 class="page-header">Form Input
                    <small>Bebas Keuangan</small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="admin.php">Home Admin</a>
                    </li>
                    <li class="active">Bebas keuangan</li>
                </ol>
            </div> <!-- / col lg 12 -->
        
            
        <div class="col-lg-12 col-sm-12 col-md-12">
            <form class="form-horizontal" action="" method="post" enctype="multipart/form-data"> <!-- Catatan : enctype="multipart/form-data" harus ditulis agar bisa upload file -->

                    <?php                    
                        $sql="select * from bebas_wisuda where (nim='$_GET[nim]')" ;
                         
                        $rs=mysqli_query($koneksi, $sql);
                        $row=mysqli_fetch_array($rs);
                    { ?>      
           
             <div class="col-lg-5 col-sm-5 col-md-5">

                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Data mahasiswa dengan Nim = <?php echo $row['nim'];?> </h3>
                    </div>
                    <div class="panel-body">                    
                        
                        <div class="form-group">
                            <!-- <label class="col-sm-4 control-label">NIM</label> -->
                                <div class="col-sm-4">                                
                                    <input type="hidden" name="t_nim" id="t_nim" class="form-control" placeholder="Nim" value='<?php echo $row['nim'];?>'readonly>
                                </div>
                        </div>                                                                          
                                
                        <div class="form-group">
                            <label class="col-sm-4 control-label">Bebas Keuangan</label>
                                <div class="col-sm-4">
                                    <select name="s_bebas_uang" id="s_bebas_uang" class="form-control" >                                      
                                        <?php  
		                                $status = $row['ket_keuangan']; 
		                                if ($status == 1 ) 
		                                {
		                                	$pesan = 'OK' ; 		                                	
										} 
										else 
										{
											$pesan = 'NOT'; 												
										} ?> 

										<option value="<?php  echo "$status" ?>"> <?php  echo "$pesan" ?></option> 
                                        <option value=""> - Pilih - </option>
                                        <option value="1">OK</option>
                                        <option value="0">BELUM</option>
                                    </select>
                                </div>
                        </div>   

                        <!-- <hr/> -->
                        <div class="form-group">
                        <label class="col-sm-3 control-label"></label>
        				<div class="col-sm-3">
           					 <!-- <input type="submit" name="update" id="update" class="btn btn-sm btn-primary" value="Simpan" data-toggle="tooltip" title="Update Data"> -->
           					<button type="button" id="btn-update" class="btn btn-sm btn-info pull-right"><span class="glyphicon glyphicon-save"></span> save </button>
        				</div>         				      
        				<div class="col-sm-2">
        					<a href="cek_bebas_uang.php" class="btn btn-sm btn-danger" data-toggle="tooltip" title="Batal"><span class="glyphicon glyphicon-repeat"></span>Back</a>
            			</div> 
            			</div> 
            			<hr/>
						<div class="col-sm-8">
            				<span> <b>Keterangan :</b> Nim Tidak Dapat di EDIT </span>  
            			</div>           	            
                    </div>      <!-- / panel-body -->
                </div>  <!-- / panel-body -->
             </div>  <!-- / col-lg-6 col-sm-6 col-md-6  -->
             <?php } ?>
            </form>  
            
        </div>   <!-- col-lg-12 col-sm-12 col-md-12 --> 
          
       
	        <?php 
	        if (isset($_POST['update']))
	        { // jika tombol 'update' ditekan

	           // $nim     		= $_GET['nim'];
	           
	            $nim     		= $_POST['t_nim'];
	            $ket_keuangan	= $_POST['s_bebas_prodi'];          	                            
	                  
	            
	                if ($ket_prodi != "")
	                	{
	                    // Proses ubah ke Database
	                    $sql2="update bebas_wisuda set ket_keuangan='$ket_keuangan' WHERE nim='$nim'";
	                
	                        if(mysqli_query($koneksi, $sql2))
	                            {
	                                echo '<script type="text/javascript">
	                                    //<![CDATA[
	                                        alert ("Berhasil Edit");
	                                        window.location="cek_bebas_uang.php?nim='.$nim.' " ;
	                                    //]]>
	                                </script>';
	                            } else  // Jika proses upload gagal
	                            {
	                                 echo '<script type="text/javascript">
	                                    //<![CDATA[
	                                    alert ("Gagal Simpan");
	                                        
	                                    //]]>
	                                </script>';
	                            }
	                   }	           
	                   else // belum dipilih bebas prodi
	                   { 
	                        echo '<script type="text/javascript">
	                                    //<![CDATA[
	                                    alert ("Pilih dulu Bebas Keuangan ?"); 

	                                    //]]>
	                                </script>';
	                    }
	          }
	            

	         ?>

               
    </div> <!-- /.row -->
         
    <hr/>
   	<footer>  <!-- Footer -->
        <div class="row">
            <div class="col-lg-12">
                <p>Copyright &copy; <a href="http://unimugo.ac.id"> Stikes Muhammadiyah Gombong </a> - 2017</p>
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
		     
			 var parameter = "nim=" + $(t_nim).val() + "&ket_keuangan=" + $(s_bebas_uang).val() ; // 2variabel

				 if ( ($(s_bebas_uang).val() != "") )
				 {
				 
					 $.ajax({
				            type: 'POST', // Metode pengiriman data menggunakan POST
				          	url: 'ket_bebas/proses_update_bebas_keuangan.php', // File yang akan memproses data
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
											window.location="cek_bebas_uang.php" ; 			
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
				}
			   	else { alert ("Pilih Dulu Bebas Keuangan ? "); 
				}
		    });  // ttup function - btn-update
		});  // tutup document ready

	</script>

</body>

</html>