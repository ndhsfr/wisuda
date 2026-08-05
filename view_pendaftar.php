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
                <h1 class="page-header">Data Pendaftar Wisuda
                    <small></small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="admin.php">Home Admin</a>
                    </li>
                    <li class="active">Data Pendaftar</li>
                </ol>
            </div> <!-- / col lg 12 -->

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
											echo "<option value=''> - Pilih Sk WISUDA -</option>";
												
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

             	<!-- klo mau hapus -->

             	<?php

                if(isset($_GET['aksi']) == 'delete')
                     { 
                        $nim = $_GET['nim'];
                                    
                        $cek = mysqli_query($koneksi, "SELECT nim FROM pendaftar_wisuda_rega WHERE nim='$nim'"); 
                                    
                            if(mysqli_num_rows($cek) != 0)
                                { 
                                    $delete = mysqli_query($koneksi, "DELETE FROM pendaftar_wisuda_rega WHERE nim='$nim' "); 
                                            
                                    echo '<script type="text/javascript">
                                        //<![CDATA[
                                        alert("Data Berhasil Di Hapus")
                                        window.location="view_pendaftar.php" ;
                                        //]]>
                                        </script>';                              
                                }
                    }
           		 ?>

            	<!-- batas hapus disini -->


            	<?php

                // if(isset($_GET['aksi']) == 'delete')
                //      { 
                //         $nim = $_GET['nim'];
                                    
                //         $cek = mysqli_query($koneksi, "SELECT nim FROM sk_wisuda WHERE nim='$nim'"); 
                                    
                //             if(mysqli_num_rows($cek) != 0)
                //                 { 
                //                     $delete = mysqli_query($koneksi, "DELETE FROM sk_wisuda WHERE nim='$nim' "); 
                                            
                //                     echo '<script type="text/javascript">
                //                         //<![CDATA[
                //                         alert("Data Berhasil Di Hapus")
                                       
                //                         //]]>
                //                         </script>';                              
                //                 }
                //     }
           		 
           		if(isset($_POST['cari']))

             	{ // jika tombol 'cari' ditekan

					
					$no_sk	     = $_POST['s_sk_wisuda'];
					$tasem	     = $_POST['s_ta_sem'];


					//if (($TA_sem != '') and ($prodi != '') and ($program != ''))
					if ($no_sk == 'all')
						{ 
							$sql= mysqli_query($koneksi, "SELECT * FROM pendaftar_wisuda_rega WHERE ta_sem='$tasem' "); 
           		 			
							// $row = mysqli_fetch_array($sql1);
						} 
					else
						{
							$sql= mysqli_query($koneksi, "SELECT * FROM pendaftar_wisuda_rega WHERE (no_sk='$no_sk' AND ta_sem='$tasem') ");

						}

				?>
			            

			            <div class="panel panel-default">
			                    <div class="panel-heading">
			                        <h3 class="panel-title">Tabel Data -&raquo; Pendaftar Wisuda  </h3>
			                    </div>
			            </div>

			            <div class="table-responsive">
			                <table id="example1" class="table table-striped table-hover">
			                    <thead>
			                    <tr>
			                        <th class="text-center">NO</th>
			                        <th class="text-center">FOTO</th>
			                        <th>NIM</th>
			                        <th>NAMA</th>               
			                        <th>PROGRAM</th>                         
			                        <th>TA</th>
			                        <th>PRODI</th>
		                                <th>NO_SK</th>
			                        <th>Action..</th>
			                    </tr>
			                    </thead>
			                    <tbody>
			                    <?php
			                    // Include / load file koneksi.php
			                    // include "koneksi.php";
			                    
			                   // $sql_sem_aktif=mysqli_query($koneksi, "SELECT * FROM ta_sem WHERE aktif=1 ");
					            
					          //  $sem_aktif=mysqli_fetch_array($sql_sem_aktif);

			                    // Buat query untuk menampilkan semua data siswa
			                  //  $sql= mysqli_query($koneksi, "SELECT * FROM pendaftar_wisuda_rega WHERE TA_sem='$sem_aktif[TA_sem]' ");
			                
			                    
			                    $no = 1; // Untuk penomoran tabel, di awal set dengan 1
			                    while($data = mysqli_fetch_array($sql)){ // Ambil semua data dari hasil eksekusi $sql
			                    ?> 
			                        <tr>
			                            <td class="align-middle text-center"><?php echo $no; ?></td>
			                            <td class="align-middle text-center">
			                                <img src="foto/<?php echo $data['foto']; ?>" width="80" height="80">
			                            </td>
			                            <td><?php echo $data['nim']; ?>                            
			                            </td>
			                            <td><?php echo $data['nama']; ?>
			                            </td>                                  
			                            <td><?php echo $data['program']; ?>                            
			                            </td>                           
			                            <td><?php echo $data['ta_sem']; ?>                                
			                            </td>      
			                            <td><?php echo $data['prodi']; ?>                                
			                            </td>  
		                                    <td><?php echo $data['no_sk']; ?>                                
			                            </td>              
			                            <td class="align-middle text-center">
			                                <a href="form_edit_pendaftar.php?nim=<?php echo $data['nim']; ?> "  title="Edit Data" data-toggle="tooltip" class="btn btn-warning btn-sm small" target="_blank"><span class="glyphicon glyphicon-edit"></span>Edit</a>
			                                                                                
			                                <a href="view_pendaftar.php?aksi=delete&nim=<?php echo $data['nim']; ?>" title="Hapus Data" data-toggle="tooltip" onclick="return confirm('Anda yakin akan menghapus data dengan NIM : <?php echo $data['nim'];?>'); " class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span>Hapus</a>
			                                                                                
			                                <a href="export/form_pendaftar_wisuda_pdf.php?nim=<?php echo $data['nim']; ?>"  title="View Detil" data-toggle="tooltip" class="btn btn-success btn-sm small" target="_blank"><span class="glyphicon glyphicon-search">Cetak</span></a>
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
			            </div> 		<!-- /table-responsive -->
			<?php } ?>
			</div> 		<!-- / col lg 12 -->
        </div> 		<!-- /.row -->

       


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