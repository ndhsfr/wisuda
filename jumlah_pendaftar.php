<?php $thisPage="SIM Pendaftaran Wisuda - jumlah pendaftar"; ?>
<?php $title = "jumlah Pendaftar - Pendaftar Wisuda" ?>
<?php $description = "Halaman jumlah Pendaftar Sistem Pendaftaran Wisuda" ?>
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
                <h1 class="page-header">Jumlah Pendaftar
                    <small>Pendaftar Wisuda</small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="admin.php">Home Admin</a>
                    </li>
                    <li class="active">Jumlah Pendaftar</li>
                </ol>
            </div> 
            <!-- / col lg 12 -->

          
           <!--  <div class="panel panel-default">
	  			<div class="panel-heading">
	    			<h3 class="panel-title">Form Pendaftaran Wisuda-&raquo; REGULER-A</h3>
	  			</div> -->
	  		
	  			<div class="col-lg-12">
	  			<form class="form-horizontal" action="" method="post">
		            <Table>
					 	<tr>
						 	 <!-- <td>
					      		<select name="s_program" id="s_program" class="form-control" required>
										<option value=""> - PROGRAM - </option>
										<option value="REG-A">REGULER A</option>
										<option value="REG-B">REGULER B</option>
										<option value="all">SEMUA (REGA+REGB))</option>
									</select>
					 	 	</td> -->
							<!-- <td width="20"></td> -->
							<td>
					      		<?php
									$query = "SELECT * FROM ta_sem";
									if($result = mysqli_query($koneksi, $query)){
										if($success = mysqli_num_rows($result) > 0){
											echo "<select class='form-control' name='s_TA' id='s_TA' onclick='changeValue (this.value)' required>";
											echo "<option value=''> - TA & Semester -</option>";
												
										while($row = mysqli_fetch_array($result))
											echo "<option value='$row[ta_sem]'>$row[ta_sem]</option>";												
											echo "</select>";
										}
									}
								?>
					 	 	</td>
							<!-- <td width="20"></td>
					  		<td>
					  			<?php
									$query = "SELECT * FROM prodi";
									if($result = mysqli_query($koneksi, $query)){
										if($success = mysqli_num_rows($result) > 0){
											echo "<select name='s_prodi' id='s_prodi' class='form-control' required>";
											echo "<option value=''> - PRODI -</option>";
												
											while($row = mysqli_fetch_array($result))
												echo "<option value='$row[nm_prodi]'>$row[nm_prodi]</option>";
												echo "<option value='all'> Semua Prodi </option>";
												echo "</select>";
										}
									}
								?>
							</td> -->
							<td width="10"></td>
					  		<td> 
					  		<button type="button" class="btn btn-round btn-success" id="show"><span class="glyphicon glyphicon-search"></span> CARI </button>	
							 <!-- <input type="submit" name="cari" id="cari" class="btn btn-sm-large btn-success" value="CARI" data-toggle="tooltip" title="Cari Data" > -->
							</td>
					 	</tr>
					 </Table>	
					</form>				
				</div> <!-- / col lg 12 -->
			
			<hr/>

					
				<!--  menampilkan data -->	
			<div class="col-lg-12">			
				
				<div id="tampildata"> </div>
            </div> <!-- / col lg 12 -->
			
        </div> 		<!-- /.row -->

       


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

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Script to Activate the Carousel -->
    <script>
    $('.carousel').carousel({
        interval: 5000 //changes the speed
    })
    </script>

    <script src="js/jquery.dataTables.js"></script>
    <script src="js/dataTables.bootstrap.js"></script>   
    <!-- <script type="text/javascript">
        $(function() {
            $('#example1').dataTable();
        });
    </script> -->

    <script>
	$(document).ready(function()
	{
					
		$('#show').click(function()
			{				
				//$('#datatable').dataTable(function()){
				var loadpage = "tampil_jumlah_pendaftar.php";
				var angkatan = $('select[name=s_TA]').val();
				// var prodi = $('select[name=s_prodi]').val();
				$.post(loadpage, {angkatan: angkatan}, function(data)
				{						
					
					$('#tampildata').html(data).show();								
				});		
			});	 
	});
    </script>


</body>

</html>