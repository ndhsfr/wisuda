<?php $thisPage="SIM Pendaftaran Wisuda - VIEW"; ?>
<?php $title = "VIEW - Pendaftar Wisuda" ?>
<?php $description = "Halaman View Sistem Pendaftaran Wisuda" ?>
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
                <h1 class="page-header">Data Mhs Bebas Laboratorium
                    <small></small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="admin.php">Home Admin</a>
                    </li>
                    <li class="active">bebas Lab</li>
                </ol>
            </div> <!-- / col lg 12 -->

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
			</form>         


			 <?php
             	
             	if(isset($_POST['cari']))

             	{ // jika tombol 'cari' ditekan

					$program	 = $_POST['s_program'];														
					$ta_sem	     = $_POST['s_TA'];
					$prodi	     = $_POST['s_prodi'];


					if (($ta_sem != '') and ($prodi != '') and ($program != ''))
						{ 
							$sql1 = mysqli_query($koneksi, "SELECT * FROM bebas_wisuda where (program='$program') AND (ta_sem='$ta_sem') AND (prodi='$prodi') ");    
           		 			
							 							 
			?>

				            <div class="col-lg-12">          	

				             	<div class="panel panel-default">
					                    <div class="panel-heading">
					                        <h3 class="panel-title">Tabel Mhs Bebas Studi -&raquo; <?php echo "$program" ?> | <?php echo "$ta_sem" ?> | <?php echo "$prodi" ?> </h3>
					                    </div>
					            </div>

					            <div class="table-responsive">
					                <table id="example1" class="table table-striped table-hover">
					                    <thead>
					                    <tr>
					                        <th class="text-center">NO</th>
					                        <th>PROGRAM</th>
					                        <th>TA</th>
					                        <th>PRODI</th>               
					                        <th>NIM</th>                         
					                        <th>BEBAS LAB</th>
					                        <!-- <th>Action</th>	                         -->
					                    </tr>
					                    </thead>
					                    <tbody>
					                    <?php					                   		                
					                    
					                    $no = 1; // Untuk penomoran tabel, di awal set dengan 1
					                    
					                    while($data = mysqli_fetch_array($sql1)){ // Ambil semua data dari hasil eksekusi $sql
					                    ?> 
					                        <tr>
					                            <td class="align-middle text-center"><?php echo $no; ?></td>
					                            <td>
					                                <?php echo $data['program']; ?>
					                            </td>
					                            <td><?php echo $data['ta_sem']; ?>                            
					                            </td>
					                            <td><?php echo $data['prodi']; ?>
					                            </td>                                  
					                            <td><?php echo $data['nim']; ?>                            
					                            </td>                           
					                            <td>
					                                <?php  
					                                $status = $data['ket_labkes']; 
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
					                                
					                                <a href="export/srt_ket_bebas_labkes_pdf.php?nim=<?php echo $data['nim']; ?>"  title="Cetak" data-toggle="tooltip" class="btn btn-success btn-sm small" target="_blank"><span class="glyphicon glyphicon-print"></span></a>

					                                <a href="form_edit_bebas_labkes.php?nim=<?php echo $data['nim']; ?> "  title="Edit Data" data-toggle="tooltip" class="btn btn-info btn-sm small"><span class="glyphicon glyphicon-edit">Input</span></a>                               
					                            </td>      	                                          
					                            <!-- <td class="align-middle text-center"> -->
					                                <!-- <a href="edit_bebas_studi.php?nim=<?php echo $data['nim']; ?> "  title="Edit Data" data-toggle="tooltip" class="btn btn-warning btn-sm small"><span class="glyphicon glyphicon-Pencil">Edit</span></a> -->
					                                                                                
					                                <!-- <a href="view_pendaftar_rega.php?aksi=delete&nim=<?php echo $data['nim']; ?>" title="Hapus Data" data-toggle="tooltip" onclick="return confirm('Anda yakin akan menghapus data dengan NIM : <?php echo $data['nim'];?>'); " class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a> -->
					                            <!-- </td> -->
					                        </tr>				                    
					                                    
					                    <?php
					                        $no++; // Tambah 1 setiap kali looping
					                    }
					                    ?>
					                    
					                    </tbody>
					                </table>  
					            </div> 		<!-- /table-responsive -->
							</div> 		<!-- / col lg 12 -->
			<?php
	                    }
	                    else 
	                    {
	                    	echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Silahkan Pilih Program, Tahun Akademik & Prodi untuk mencari !</div>';
	                    }
	        	}
	        	else
	        	{
	        ?>
	        		<div class="col-lg-12">          	

				             	<div class="panel panel-default">
					                    <div class="panel-heading">
					                        <h3 class="panel-title">Tabel Mhs Bebas Studi -&raquo; Prodi </h3>
					                    </div>
					            </div>

					            <div class="table-responsive">
					                <table id="example1" class="table table-striped table-hover">
					                    <thead>
					                    <tr>
					                        <th class="text-center">NO</th>
					                        <th>PROGRAM</th>
					                        <th>TA</th>
					                        <th>PRODI</th>               
					                        <th>NIM</th>                         
					                        <th>BEBAS LAB</th>
					                        <!-- <th>Action</th>	                         -->
					                    </tr>
					                    </thead>
					                    <tbody>
					                    <?php					                   		                
					                    
					                    $sql_sem_aktif=mysqli_query($koneksi, "SELECT * FROM ta_sem WHERE aktif=1 ");
			            
			            				$sem_aktif=mysqli_fetch_array($sql_sem_aktif);

					                    // Buat query untuk menampilkan semua data siswa
	                    				$sql= mysqli_query($koneksi, "SELECT * FROM bebas_wisuda WHERE ta_sem='$sem_aktif[ta_sem]'");

					                    $no = 1; // Untuk penomoran tabel, di awal set dengan 1
					                    
					                    while($data = mysqli_fetch_array($sql)){ // Ambil semua data dari hasil eksekusi $sql
					                    ?> 
					                        <tr>
					                            <td class="align-middle text-center"><?php echo $no; ?></td>
					                            <td>
					                                <?php echo $data['program']; ?>
					                            </td>
					                            <td><?php echo $data['ta_sem']; ?>                            
					                            </td>
					                            <td><?php echo $data['prodi']; ?>
					                            </td>                                  
					                            <td><?php echo $data['nim']; ?>                            
					                            </td>                           
					                            <td>
					                                <?php  
					                                $status = $data['ket_labkes']; 
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
					                                
					                                <a href="export/srt_ket_bebas_labkes_pdf.php?nim=<?php echo $data['nim']; ?>"  title="Cetak" data-toggle="tooltip" class="btn btn-success btn-sm small" target="_blank"><span class="glyphicon glyphicon-print"></span></a>

					                                <a href="form_edit_bebas_labkes.php?nim=<?php echo $data['nim']; ?> "  title="Edit Data" data-toggle="tooltip" class="btn btn-info btn-sm small"><span class="glyphicon glyphicon-edit">Input</span></a>                               
					                            </td>      	                                          
					                            <!-- <td class="align-middle text-center"> -->
					                                <!-- <a href="edit_bebas_studi.php?nim=<?php echo $data['nim']; ?> "  title="Edit Data" data-toggle="tooltip" class="btn btn-warning btn-sm small"><span class="glyphicon glyphicon-Pencil">Edit</span></a> -->
					                                                                                
					                                <!-- <a href="view_pendaftar_rega.php?aksi=delete&nim=<?php echo $data['nim']; ?>" title="Hapus Data" data-toggle="tooltip" onclick="return confirm('Anda yakin akan menghapus data dengan NIM : <?php echo $data['nim'];?>'); " class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a> -->
					                            <!-- </td> -->
					                        </tr>				                    
					                                    
					                    <?php
					                        $no++; // Tambah 1 setiap kali looping
					                    }
					                    ?>
					                    
					                    </tbody>
					                </table>  
					            </div> 		<!-- /table-responsive -->
							</div> 		<!-- / col lg 12 -->

	        <?php
	        	}	

	        ?>
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