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
					  			<?php
									$query_sem = "SELECT * FROM ta_sem";
									if($result_sem = mysqli_query($koneksi, $query_sem)){
										if($sukses = mysqli_num_rows($result_sem) > 0){
											echo "<select name='s_ta_sem' id='s_ta_sem' class='form-control' required>";
											echo "<option value=''> - TA/Semester -</option>";
												
											while($data = mysqli_fetch_array($result_sem))
												echo "<option value='$data[ta_sem]'>$data[ta_sem]</option>";
												
												echo "</select>";
										}
									}
								?>
							</td>
							<td width="10"></td>
							<td>
					  			<?php
					  			echo "<select name='s_sk_wisuda' id='s_sk_wisuda' class='form-control' required>";
								echo "<option value=''> - Sk WISUDA -</option>";
								echo "</select>";
								?>										
							</td>
					  		<!-- <td>
					  			<?php
									$query = "SELECT no_sk FROM sk_wisuda group by no_sk";
									if($result = mysqli_query($koneksi, $query)){
										if($success = mysqli_num_rows($result) > 0){
											echo "<select name='s_sk_wisuda' id='s_sk_wisuda' class='form-control' required>";
											echo "<option value=''> - Sk WISUDA -</option>";
												
											while($row = mysqli_fetch_array($result))
												echo "<option value='$row[no_sk]'>$row[no_sk]</option>";
												
												echo "</select>";
										}
									}
								?>
							</td> -->
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

					
					$no_sk	     = $_POST['s_sk_wisuda'];
					$tasem	     = $_POST['s_ta_sem'];


					//if (($TA_sem != '') and ($prodi != '') and ($program != ''))
					if ($no_sk == 'all')
						{ 
							$sql1 = mysqli_query($koneksi, "SELECT * from pendaftar_wisuda_rega WHERE ta_sem='$tasem' ");    
           		 			
							// $row = mysqli_fetch_array($sql1);
						}
					else
						{
							$sql1 = mysqli_query($koneksi, "SELECT * from pendaftar_wisuda_rega WHERE (no_sk='$no_sk' AND ta_sem='$tasem')");  
						}

						$row = mysqli_fetch_array($sql1);

						?>
            

			            <div class="panel panel-default">
			                    <div class="panel-heading">
			                        <h3 class="panel-title">Tabel Data -&raquo; NO Sk = <?php echo "$no_sk" ?> </h3>
			                    </div>
			            </div>

			            <div class="col-lg-12">
			            	<table width="400" border="0">
			    				<tr>
				        			<td width="152">
				        				<a href="export/rekap_pendaftar_wisuda_excel.php?no_sk=<?php echo $row['no_sk']; ?>" class="btn btn-danger btn-small" target="_blank" title="Export Excel"><span class="glyphicon glyphicon-export">to EXCEL: Tabel</span></a> 
				        			</td>
				        			<td width="152">
				        				<a href="export/rekap_pendaftar_wisuda_pdf.php?no_sk=<?php echo $row['no_sk']; ?>" class="btn btn-info btn-small" target="_blank" title="Export PDF"><span class="glyphicon glyphicon-export">to PDF: Biodata</span></a> 
				        			</td>	 
				        			<td width="152">
				        				<a href="export/rekap_pendaftar_wisuda_excel2.php?no_sk=<?php echo $row['no_sk']; ?>&ta=<?php echo $row['ta_sem']; ?>" class="btn btn-success btn-small" target="_blank" title="Export Excel"><span class="glyphicon glyphicon-export">to Excel: Biodata</span></a> 
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
			                        <th>PESAN_&_KESAN</th>
			                        <th>Nama_File_FOTO</th>
			                        <th>PAS FOT0:4X6</th>   
			                        <th>FC BAITUL ARQAM</th>                      
			                        <th>FC HPT</th>
			                        <th>FC ABSTRAK INDO</th>
			                        <th>FC ABSTRAK ENG</th>
			                        <th>FC IJAZAH TERAKHIR</th>	
			                        <th>NO_SK</th>                      	                        
			                    </tr>
			                    </thead>
			                    <tbody>
			                    <?php
			                    // Include / load file koneksi.php
			                    // include "koneksi.php";
			                    
			                    // Buat query untuk menampilkan semua data siswa
			                     // $sql2 = mysqli_query($koneksi, "SELECT * FROM pendaftar_wisuda_rega where (program='$program') AND (TA_sem='$TA_sem') AND (prodi='$prodi') AND (no_sk='$no_sk') ");

			                    //$sql2 = mysqli_query($koneksi, "select * from pendaftar_wisuda_rega where no_sk='$no_sk' ");


			                    if ($no_sk == 'all')
									{ 
										$sql2 = mysqli_query($koneksi, "SELECT * from pendaftar_wisuda_rega WHERE ta_sem='$tasem' ");    
			           		 			
										// $row = mysqli_fetch_array($sql1);
									}
								else
									{
										$sql2 = mysqli_query($koneksi, "SELECT * from pendaftar_wisuda_rega WHERE (no_sk='$no_sk' AND ta_sem='$tasem')");  
									}
			                
			                    
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
			                            <td><?php echo $data['no_sk']; ?>                                
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
				?>
			</div> 		<!-- / col lg 12 -->
        </div> 		<!-- /.row -->

       


   		<footer>  <!-- Footer -->
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; <a href="http://unimugo.ac.id"> unimugo Muhammadiyah Gombong </a> - 2017</p>
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

    <script>
    $(document).ready(function() {
       $('#s_ta_sem').change(function() { // Jika Select Box id provinsi dipilih
         var       
          parameter = "tasem=" + $(this).val() ;
         $.ajax({
                type: 'POST', // Metode pengiriman data menggunakan POST
                url: 'pendaftar_reg-A/tampil_sk_wisuda_diselect.php', // File yang akan memproses data
                data: parameter, // Data yang akan dikirim ke file pemroses
                success: function(response) { // Jika berhasil
                  $('#s_sk_wisuda').html(response); // Berikan hasil ke id kota
                }
           });
        }); 
      });
    </script>

</body>

</html>