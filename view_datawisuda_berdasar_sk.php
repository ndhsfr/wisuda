<?php $thisPage="SIM Pendaftaran Wisuda - VIEW"; ?>
<?php $title = "VIEW - Data Wisuda yang sesuai SK-wisuda" ?>
<?php $description = "Halaman View Data Wisuda berdasar SK-WISUDA - SIM Wisuda" ?>
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
                    <li class="active">Data Wisuda Sesuai SK</li>
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
                                    
                        $cek = mysqli_query($koneksi, "SELECT nim FROM sk_wisuda WHERE nim='$nim'"); 
                                    
                            if(mysqli_num_rows($cek) != 0)
                                { 
                                    $delete = mysqli_query($koneksi, "DELETE FROM sk_wisuda WHERE nim='$nim' "); 
                                            
                                    echo '<script type="text/javascript">
                                        //<![CDATA[
                                        alert("Data Berhasil Di Hapus")
                                       
                                        //]]>
                                        </script>';                              
                                }
                    }
           		 ?>

            	<!-- batas hapus disini -->

            	<!-- window.location="view_datawisuda_berdasar_sk.php" ; -->

	           <div class="panel panel-default">
	                    <div class="panel-heading">
	                        <h3 class="panel-title">Import Data Wisuda-&raquo;  berdasar SK-Wisuda  </h3>
	                    </div>
	            </div>
	            <div class="alert alert-info alert-dismissable">
	            	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h4>Pastikan Extensi File Excel yang digunakan excel 2003 (.xls) untuk format excel anda bisa download  <a href="import/MasterDataImportSK.xls">di sini</a></h4>
	            </div>
                 
                <form name="myForm" id="myForm" onSubmit="return validateForm()" action="view_datawisuda_berdasar_sk.php" method="post" enctype="multipart/form-data">
                	<table>
                		<tr>
                			<td>
                				<input type="file" id="filedatawisuda" class="form-control" name="filedatawisuda" required /> </br>
                			</td>                			
                		</tr>                 	            		
                		<tr>
                			<td>
                				<input type="submit" name="submit" class="brn btn-sm btn-success" value="Import Data Wisuda Berdasarkan SK" /><br/>
                			</td>
                			
                			<td>
                				<!-- <label><input type="checkbox" name="drop" value="1" /> <u>Jika ini di ceklis : semua data akan dihapus dan akan terisi data yang baru dimport</u> </label> -->
                			</td>                		
                		</tr>
                	</table>	   				
				</form>


				<?php

 
					//memanggil file excel_reader
					require "import/excel_reader.php";
					 
					//jika tombol import ditekan
					if(isset($_POST['submit'])){
					 
					    $target = basename($_FILES['filedatawisuda']['name']) ;
					    move_uploaded_file($_FILES['filedatawisuda']['tmp_name'], $target);
					    
					    $data = new Spreadsheet_Excel_Reader($_FILES['filedatawisuda']['name'],false);
					    
					//    menghitung jumlah baris file xls
					    $baris = $data->rowcount($sheet_index=0);
					    
					//    jika kosongkan data dicentang jalankan kode berikut
					    $drop = isset( $_POST["drop"] ) ? $_POST["drop"] : 0 ;
					    if($drop == 1)
					    {
					//             kosongkan tabel data wisuda berdasarkan sk
					             $truncate ="TRUNCATE TABLE sk_wisuda";
					             mysqli_query($koneksi, $truncate);
					    };
					    
					//    import data excel mulai baris ke-2 (karena tabel xls ada header pada baris 1)
					    for ($i=2; $i<=$baris; $i++)
					    {
					//       membaca data (kolom ke-1 sd terakhir)
					      $nim        = $data->val($i, 1);
					      $no_sk      = $data->val($i, 2);
					      $program    = $data->val($i, 3);
					      $prodi     = $data->val($i, 4);
					      $ta_sem     = $data->val($i, 5);
					
					          
					 
					//      setelah data dibaca, masukkan ke tabel pegawai sql
					      $query = "INSERT INTO sk_wisuda (nim, no_sk, program, prodi, ta_sem) VALUES ('$nim', '$no_sk', '$program', '$prodi', '$ta_sem')";
					      $hasil = mysqli_query($koneksi,$query);
					    }
					    
					    if(!$hasil){
					//          jika import gagal
					         // die(mysqli_error());
					          echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data berhasil di import, tapi ada beberapa data yang sama tdk jadi masalah. ok lanjut...!</div>';
					      }else{
					//          jika impor berhasil
					          echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data berhasil di import</div>';
					    }
					    
					//    hapus file xls yang udah dibaca
					    unlink($_FILES['filedatawisuda']['name']);
					}
					 
				
             	
             	if(isset($_POST['cari']))

             	{ // jika tombol 'cari' ditekan

					
					$no_sk	     = $_POST['s_sk_wisuda'];
					$tasem	     = $_POST['s_ta_sem'];


					//if (($TA_sem != '') and ($prodi != '') and ($program != ''))
					if ($no_sk == 'all')
						{ 
							$sql1 = mysqli_query($koneksi, "select * from sk_wisuda where TA_sem='$tasem' ");  
           		 			
							// $row = mysqli_fetch_array($sql1);
						} 
					else
						{
							$sql1 = mysqli_query($koneksi, "SELECT * from sk_wisuda WHERE (no_sk='$no_sk' AND TA_sem='$tasem') ");

						}

						?>


			            <div class="panel panel-default">
			                    <div class="panel-heading">
			                        <h3 class="panel-title">Tabel Data -&raquo; Wisuda berdasar SK-Wisuda  </h3>
			                    </div>
			            </div>

			            <div class="table-responsive">
			                <table id="example1" class="table table-striped table-hover">
			                    <thead>
			                    <tr>
			                        <th class="text-center">NO</th>	            
			                        <th>NIM</th>
			                        <th>NO-SK</th>               
			                        <th>PROGRAM</th>                  
			                        <th>PROGRAM_STUDI</th>
			                        <th>TA / Sem</th>
			                        <th>Action....</th>
			                    </tr>
			                    </thead>
			                    <tbody>
			                    <?php
			                    // Include / load file koneksi.php
			                    // include "koneksi.php";
			                    
			                    // Buat query untuk menampilkan semua data siswa
			                    //$sql= mysqli_query($koneksi, "SELECT * FROM sk_wisuda");
			                
			                    
			                    $no = 1; // Untuk penomoran tabel, di awal set dengan 1
			                    while($data = mysqli_fetch_array($sql1))

			                    { // Ambil semua data dari hasil eksekusi $sql
			                    ?> 
			                        <tr>
			                            <td class="align-middle text-center"><?php echo $no; ?></td>	                           
			                            <td><?php echo $data['nim']; ?>                            
			                            </td>
			                            <td><?php echo $data['no_sk']; ?>
			                            </td>                                  
			                            <td><?php echo $data['program']; ?>                            
			                            </td>                                  
			                            <td><?php echo $data['prodi']; ?>                                
			                            </td>   
			                            <td><?php echo $data['ta_sem']; ?>                                
			                            </td>             
			                            <td class="align-middle text-center">                         
			                                                                                
			                                <a href="view_datawisuda_berdasar_sk.php?aksi=delete&nim=<?php echo $data['nim']; ?>" title="Hapus Data" data-toggle="tooltip" onclick="return confirm('Anda yakin akan menghapus data dengan NIM : <?php echo $data['nim'];?>'); " class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span>Hapus</a>                                                                                                        
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
				  <?php 
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

    <script type="text/javascript">

//    validasi form (hanya file .xls yang diijinkan)
    function validateForm()
    {
        function hasExtension(inputID, exts) {
            var fileName = document.getElementById(inputID).value;
            return (new RegExp('(' + exts.join('|').replace(/\./g, '\\.') + ')$')).test(fileName);
        }
 
        if(!hasExtension('filedatawisuda', ['.xls'])){
            alert("Hanya file XLS (Excel 2003) yang diijinkan.");
            return false;
        }
    }
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