<?php
	include "config/koneksi.php";	
?>

<?php	
		$angkatan 	= $_POST['angkatan'];
  		// $prodi 		= $_POST['prodi'];

  		if ($angkatan != '')
				{ 
					$sql_semuaprogram_semuaprodi = mysqli_query($koneksi, "SELECT * FROM pendaftar_wisuda_rega WHERE (TA_sem = '$angkatan') "); 

						$hasil_all = mysqli_num_rows($sql_semuaprogram_semuaprodi);		


					$sql_rega_semuaprodi = mysqli_query($koneksi, "SELECT * FROM pendaftar_wisuda_rega WHERE (program = 'REG-A') & (TA_sem = '$angkatan') "); 

						$hasil_rega = mysqli_num_rows($sql_rega_semuaprodi);	


					$sql_regb_semuaprodi = mysqli_query($koneksi, "SELECT * FROM pendaftar_wisuda_rega WHERE (program = 'REG-B') & (TA_sem = '$angkatan') "); 

						$hasil_regb = mysqli_num_rows($sql_regb_semuaprodi);		

				?> 

						<!-- =============== semua program ==================-->

						<div class="panel panel-default">
								<div class="panel-heading">
									<h3 class="panel-title">Jumlah Pendaftar Wisuda  -&raquo; Semua Program REG A & REG B </h3>
								</div>

								<div class="box-body  table-responsive">

								<table class="table table-striped table-hover">
									<thead>
										<tr>										
											<?php
												$q = "SELECT * FROM prodi";
												$cari = mysqli_query($koneksi, $q);
												if($sukses = mysqli_num_rows($cari) > 0){
												while($show = mysqli_fetch_array($cari)) { ?>
											<th><?php echo $show['nm_prodi']; } ?></th>
												<?php
													}
												?>
											<th> Jumlah Pendaftar Total</th>
										</tr>
									</thead>
									<tbody>
										<tr>											
											<?php
												$q = "SELECT * FROM prodi";
												$cari = mysqli_query($koneksi, $q);
												if($sukses = mysqli_num_rows($cari) > 0){
												while($show = mysqli_fetch_array($cari)) { ?>
											<th>
												<?php 
												$nm=$show['nm_prodi']; 
												$sql_prodi = mysqli_query($koneksi, "SELECT * FROM pendaftar_wisuda_rega WHERE (TA_sem = '$angkatan') and (prodi = '$nm') "); 
												$hasil_jml_prodi = mysqli_num_rows($sql_prodi);
												echo $hasil_jml_prodi;
													 } 
												?>
											</th>
												<?php
												}
												?>
												<td><?php echo $hasil_all ?></td>
																										
										</tr>
									</tbody>
								</table>
							</div> <!--  /.responsive  -->

						</div>
						<!-- =============== Batas semua program ==================-->
						<hr/>
						<!-- =============== JUMLAH REGULER A ==================-->

						<div class="panel panel-default">
								<div class="panel-heading">
									<h3 class="panel-title">Jumlah Pendaftar Wisuda  -&raquo; REGULER A</h3>
								</div>

								<div class="box-body  table-responsive">

								<table class="table table-striped table-hover">
									<thead>
										<tr>										
											<?php
												$q = "SELECT * FROM prodi";
												$cari = mysqli_query($koneksi, $q);
												if($sukses = mysqli_num_rows($cari) > 0){
												while($show = mysqli_fetch_array($cari)) { ?>
											<th><?php echo $show['nm_prodi']; } ?></th>
												<?php
													}
												?>
											<th> Jumlah Pendaftar Reguler A</th>
										</tr>
									</thead>
									<tbody>
										<tr>											
											<?php
												$q = "SELECT * FROM prodi";
												$cari = mysqli_query($koneksi, $q);
												if($sukses = mysqli_num_rows($cari) > 0){
												while($show = mysqli_fetch_array($cari)) { ?>
											<th>
												<?php 
												$nm=$show['nm_prodi']; 
												$sql_prodi_rega = mysqli_query($koneksi, "SELECT * FROM pendaftar_wisuda_rega WHERE (TA_sem = '$angkatan') and (prodi = '$nm') and (program = 'REG-A') "); 
												$hasil_jml_prodi_rega = mysqli_num_rows($sql_prodi_rega);
												echo $hasil_jml_prodi_rega;
													 } 
												?>
											</th>
												<?php
												}
												?>
												<td><?php echo $hasil_rega ?></td>
																										
										</tr>
									</tbody>
								</table>
							</div> <!--  /.responsive  -->

						</div>
						<!-- =============== Batas JUMLAH REG A ==================-->
						<hr/>
						<!-- =============== JUMLAH REGULER B ==================-->

						<div class="panel panel-default">
								<div class="panel-heading">
									<h3 class="panel-title">Jumlah Pendaftar Wisuda  -&raquo; REGULER B </h3>
								</div>

								<div class="box-body  table-responsive">

								<table class="table table-striped table-hover">
									<thead>
										<tr>										
											<?php
												$q = "SELECT * FROM prodi";
												$cari = mysqli_query($koneksi, $q);
												if($sukses = mysqli_num_rows($cari) > 0){
												while($show = mysqli_fetch_array($cari)) { ?>
											<th><?php echo $show['nm_prodi']; } ?></th>
												<?php
													}
												?>
											<th> Jumlah Pendaftar Reguler B </th>
										</tr>
									</thead>
									<tbody>
										<tr>											
											<?php
												$q = "SELECT * FROM prodi";
												$cari = mysqli_query($koneksi, $q);
												if($sukses = mysqli_num_rows($cari) > 0){
												while($show = mysqli_fetch_array($cari)) { ?>
											<th>
												<?php 
												$nm=$show['nm_prodi']; 
												$sql_prodi_regb = mysqli_query($koneksi, "SELECT * FROM pendaftar_wisuda_rega WHERE (TA_sem = '$angkatan') and (prodi = '$nm') and (program = 'REG-B') "); 
												$hasil_jml_prodi_regb = mysqli_num_rows($sql_prodi_regb);
												echo $hasil_jml_prodi_regb;
													 } 
												?>
											</th>
												<?php
												}
												?>
												<td><?php echo $hasil_regb ?></td>
																										
										</tr>
									</tbody>
								</table>
							</div> <!--  /.responsive  -->

						</div>
						<!-- =============== Batas JUMLAH REG B ==================-->

				<?php } 
		
		else
				{ 
					
					// $sql = mysqli_query($koneksi, "SELECT * FROM pendaftar_wisuda_regA WHERE (angkatan = '$angkatan') and (jalur_masuk = '$jalur') ");				
					
					echo '<script type="text/javascript">
                                //<![CDATA[
                                  alert ("Pilih Dulu Tahun Akademiknya ..!");                                  
                                //]]>
                           </script>';
					
				} 
						
?>


	<!-- css dataTables -->	
	<link href="../../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
	<link href="../../asset/css/dataTables.bootstrap.css" rel="stylesheet">
	<link href="../../build/css/custom.min.css" rel="stylesheet">

	<script src="../../vendors/jquery/dist/jquery.min.js"></script>
	
	<script src="../../build/js/custom.min.js"></script>

	<script src="../../asset/js/jquery.dataTables.js"></script>
	<script src="../../asset/js/dataTables.bootstrap.js"></script>	
	<script type="text/javascript">
				$(function() {
				$('#example1').dataTable();
				});
	</script> 

	