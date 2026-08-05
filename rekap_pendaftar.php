<?php $thisPage="SIM Pendaftaran Wisuda - REKAP"; ?>
<?php $title = "REKAP - Pendaftar Wisuda" ?>
<?php $description = "Halaman REKAP Sistem Pendaftaran Wisuda" ?>
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
                <h1 class="page-header">REKAP Data 
                    <small>Pendaftar Wisuda</small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="admin.php">Home Admin</a>
                    </li>
                    <li class="active">Rekapitulasi</li>
                </ol>
            </div> 
            <!-- / col lg 12 -->

          
           <!--  <div class="panel panel-default">
	  			<div class="panel-heading">
	    			<h3 class="panel-title">Form Pendaftaran Wisuda-&raquo; REGULER-A</h3>
	  			</div> -->
	  		<form class="form-horizontal" action="" method="post">
	  			<div class="col-lg-12">
		            <Table>
					 	<tr>
						 	<td>
					      		<select name="s_program" id="s_program" class="form-control" required>
									<option value=""> - PROGRAM - </option>
									<option value="REG-A">REGULER A</option>
									<option value="REG-B">REGULER B</option>									
								</select>
					 	 	</td>
							<td width="20"></td>
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
							<td width="20"></td>
					  		<td>
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
							</td>
							<td width="10"></td>
					  		<td> 
							 <input type="submit" name="cari" id="cari" class="btn btn-sm-large btn-success" value="CARI" data-toggle="tooltip" title="Cari Data" >
							</td>
					 	</tr>
					 </Table>
					<hr/>
				</div>
			<!-- </div> -->
		</form>


            <div class="col-lg-12">

             	<?php
             	
             	if(isset($_POST['cari']))

             	{ // jika tombol 'cari' ditekan

					$program	 = $_POST['s_program'];														
					$ta_sem	     = $_POST['s_TA'];
					$prodi	     = $_POST['s_prodi'];


					if (($ta_sem != '') and ($prodi != '') and ($program != ''))
						{ 
							$sql1 = mysqli_query($koneksi, "SELECT * FROM pendaftar_wisuda_rega where (program='$program') AND (ta_sem='$ta_sem') AND (prodi='$prodi') ");    
           		 			
							 $row = mysqli_fetch_array($sql1);

						?>
            

			            <div class="panel panel-default">
			                    <div class="panel-heading">
			                        <h3 class="panel-title">Tabel Data -&raquo; Reguler A  </h3>
			                    </div>
			            </div>

			            <div class="col-lg-12">
			            	<table width="400" border="0">
			    				<tr>
				        			<td width="152">
				        				<a href="export/rekap_pendaftar_excel.php?program=<?php echo $row['program']; ?>&TA_sem=<?php echo $row['ta_sem']; ?>&prodi=<?php echo $row['prodi']; ?>" class="btn btn-danger btn-small" target="_blank" title="Export Excel"><span class="glyphicon glyphicon-export">to EXCEL: Tabel</span></a> 
				        			</td>
				        			<td width="152">
				        				<a href="export/rekap_pendaftar_pdf.php?program=<?php echo $row['program']; ?>&TA_sem=<?php echo $row['ta_sem']; ?>&prodi=<?php echo $row['prodi']; ?>" class="btn btn-info btn-small" target="_blank" title="Export PDF"><span class="glyphicon glyphicon-export">to PDF: Biodata</span></a> 
				        			</td>	 
				        			<td width="152">
				        				<a href="export/rekap_pendaftar_excel2.php?program=<?php echo $row['program']; ?>&ta_sem=<?php echo $row['ta_sem']; ?>&prodi=<?php echo $row['prodi']; ?>" class="btn btn-success btn-small" target="_blank" title="Export Excel"><span class="glyphicon glyphicon-export">to Excel: Biodata</span></a> 
				        			</td>	        			
			    				</tr>
							</table>
							<hr/>
						</div>

			            <!-- <div class="table-responsive"> -->
			                <table id="example1" class="table table-striped table-hover">
			                    <thead>
			                    <tr>
			                        <th class="text-center">NO</th>	
			                        <th>PROGRAM</th>                        
			                        <th>TAHUN_AKADEMIK</th>
			                        <th>PROGRAM_STUDI</th>
			                        <th>NIM</th>
			                        <th>NAMA_LENGKAP</th>
			                        <th>TMPT_LAHIR</th>   
			                        <th>TGL_LAHIR</th> 
			                        <th>ALAMAT_LENGKAP</th>             
			                        <th>JEN_KEL</th>   
			                        <th>IPK_TERAKHIR</th>                      
			                        <th>JUDUL_TA_(versi.indonesia)</th>
			                        <th>JUDUL_TA_(versi.english)</th>
			                        <th>PESAN_KESAN</th>
			                        <th>Nama_File_FOTO</th>
			                        <th>PAS FOT0:4X6</th>   
			                        <th>FC BAITUL ARQAM</th>                      
			                        <th>FC HPT</th>
			                        <th>FC ABSTRAK INDO</th>
			                        <th>FC ABSTRAK ENG</th>
			                        <th>FC IJAZAH TERAKHIR</th>	                        	                        
			                    </tr>
			                    </thead>
			                    <tbody>
			                    <?php
			                    // Include / load file koneksi.php
			                    // include "koneksi.php";
			                    
			                    // Buat query untuk menampilkan semua data siswa
			                     $sql2 = mysqli_query($koneksi, "SELECT * FROM pendaftar_wisuda_rega WHERE ((program='$program') AND (ta_sem='$ta_sem') AND (prodi='$prodi')) ");
			                
			                    
			                    $no = 1; // Untuk penomoran tabel, di awal set dengan 1
			                    while($data = mysqli_fetch_array($sql2)) // Ambil semua data dari hasil eksekusi $sql
			                    { 
			                    	?> 
			                        <tr>
			                            <td class="align-middle text-center"><?php echo $no; ?></td>
			                            <!-- <td class="align-middle text-center">
			                                <img src="foto/<?php //echo $data['foto']; ?>" width="80" height="80">
			                            </td> -->
			                            <td><?php echo $data['program']; ?>                            
			                            </td>
			                            <td><?php echo $data['ta_sem']; ?>                            
			                            </td>
			                            <td><?php echo $data['prodi']; ?>
			                            </td>             
			                            <td><?php echo $data['nim']; ?>                            
			                            </td>
			                            <td><?php echo $data['nama']; ?>
			                            </td>                                  
			                            <td><?php echo $data['tmpt_lhr']; ?>                            
			                            </td>                           
			                            <td><?php echo $data['tgl_lhr']; ?>                                
			                            </td>      
			                            <td><?php echo $data['alamat']; ?> 
			                            </td>
			                            <td><?php echo $data['jenkel']; ?>                            
			                            </td>                           
			                            <td><?php echo $data['ipk']; ?>                                
			                            </td>      
			                            <td><?php echo $data['judul_indo']; ?>                                
			                            </td>  
			                            <td><?php echo $data['judul_english']; ?>                                
			                            </td>  
			                            <td><?php echo $data['pesan']; ?>                                
			                            </td>  
			                            <td><?php echo $data['foto']; ?>                                
			                            </td>  
			                            <td>
			                                <?php  
			                                $status = $data['pas_foto46']; 
			                                if ($status == 1 ) 
			                                {
			                                	$pesan = 'OK' ; 
			                                	?>
												<span class="label label-success"><?php  echo "$pesan" ?></span> <?php 
											} 
											else 
											{
												$pesan = 'NOT'; ?>
												<span class="label label-danger"><?php  echo "$pesan" ?></span>  <?php 
													
											} ?>                                     
			                                                                
			                            </td> 
			                            <td>
			                                <?php  
			                                $status = $data['fc_BAPS']; 
			                                if ($status == 1 ) 
			                                {
			                                	$pesan = 'OK' ; 
			                                	?>
												<span class="label label-success"><?php  echo "$pesan" ?></span> <?php 
											} 
											else 
											{
												$pesan = 'NOT'; ?>
												<span class="label label-danger"><?php  echo "$pesan" ?></span>  <?php 
													
											} ?>                                     
			                                                                
			                            </td>  
			                            <td>
			                                <?php  
			                                $status = $data['fc_HPT']; 
			                                if ($status == 1 ) 
			                                {
			                                	$pesan = 'OK' ; 
			                                	?>
												<span class="label label-success"><?php  echo "$pesan" ?></span> <?php 
											} 
											else 
											{
												$pesan = 'NOT'; ?>
												<span class="label label-danger"><?php  echo "$pesan" ?></span>  <?php 
													
											} ?>                                     
			                                                                
			                            </td>  
			                            <td>
			                                <?php  
			                                $status = $data['fc_abstrak_indo']; 
			                                if ($status == 1 ) 
			                                {
			                                	$pesan = 'OK' ; 
			                                	?>
												<span class="label label-success"><?php  echo "$pesan" ?></span> <?php 
											} 
											else 
											{
												$pesan = 'NOT'; ?>
												<span class="label label-danger"><?php  echo "$pesan" ?></span>  <?php 
													
											} ?>                                     
			                                                                
			                            </td>
			                            <td>
			                                <?php  
			                                $status = $data['fc_abstrak_english']; 
			                                if ($status == 1 ) 
			                                {
			                                	$pesan = 'OK' ; 
			                                	?>
												<span class="label label-success"><?php  echo "$pesan" ?></span> <?php 
											} 
											else 
											{
												$pesan = 'NOT'; ?>
												<span class="label label-danger"><?php  echo "$pesan" ?></span>  <?php 
													
											} ?>                                     
			                                                                
			                            </td> 
			                            <td>
			                                <?php  
			                                $status = $data['fc_ijazah_terakhir']; 
			                                if ($status == 1 ) 
			                                {
			                                	$pesan = 'OK' ; 
			                                	?>
												<span class="label label-success"><?php  echo "$pesan" ?></span> <?php 
											} 
											else 
											{
												$pesan = 'NOT'; ?>
												<span class="label label-danger"><?php  echo "$pesan" ?></span>  <?php 
													
											} ?>                                     
			                                                                
			                            </td>                      
			                        </tr>
			                        <!--
			                        -- Membuat sebuah textbox hidden yang akan digunakan untuk form ubah
			                        -->
			                    			                                    
			                    <?php
			                        $no++; // Tambah 1 setiap kali looping
			                    }
			                    ?>
			                    
			                    </tbody>
			                </table>  
			            <!-- </div> 		/table-responsive -->

			         <?php 
			            }
					else 
						{ 
							echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Silahkan Pilih Program, Tahun Akademik & Prodi !</div>';
						}
				}        
				?>
			</div> 		<!-- / col lg 12 -->
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
    <script type="text/javascript">
        $(function() {
            $('#example1').dataTable();
        });
    </script>

</body>

</html>