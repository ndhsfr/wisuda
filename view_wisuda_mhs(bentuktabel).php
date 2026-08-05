<?php $thisPage="SIM Pendaftaran Wisuda - VIEW"; ?>
<?php $title = "VIEW - Pendaftar Wisuda" ?>
<?php $description = "Halaman View Sistem Pendaftaran Wisuda" ?>
<?php 
// require('akses_login.php');
include("header.php"); // memanggil file header.php
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
                    <li><a href="index.php">Home</a>
                    </li>
                    <li class="active">Data Pendaftar</li>
                </ol>
            </div> <!-- / col lg 12 -->

            <div class="col-lg-12">

             	<!-- klo mau hapus -->

             	<?php

                // if(isset($_GET['aksi']) == 'delete')
                //      { 
                //         $nim = $_GET['nim'];
                                    
                //         $cek = mysqli_query($koneksi, "SELECT nim FROM pendaftar_wisuda_rega WHERE nim='$nim'"); 
                                    
                //             if(mysqli_num_rows($cek) != 0)
                //                 { 
                //                     $delete = mysqli_query($koneksi, "DELETE FROM pendaftar_wisuda_rega WHERE nim='$nim' "); 
                                            
                //                     echo '<script type="text/javascript">
                //                         //<![CDATA[
                //                         alert("Data Berhasil Di Hapus")
                //                         window.location="view_wisuda_mhs.php" ;
                //                         //]]>
                //                         </script>';                              
                //                 }
                //     }
           		 ?>

            	<!-- batas hapus disini -->

	            <div class="panel panel-default">
	                    <div class="panel-heading">
	                        <h3 class="panel-title">Tabel Data -&raquo; Reguler A  </h3>
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
	                        <th>ACTION..</th>	                      
	                    </tr>
	                    </thead>
	                    <tbody>
	                    <?php
	                    // Include / load file koneksi.php
	                    // include "koneksi.php";
	                    
	                    // Buat query untuk menampilkan semua data siswa
	                    $sql= mysqli_query($koneksi, "SELECT * FROM pendaftar_wisuda_rega");
	                
	                    
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
	                            <td><?php echo $data['TA_sem']; ?>                                
	                            </td>      
	                            <td><?php echo $data['prodi']; ?>                                
	                            </td>                
	                            <td class="align-middle text-center">
	                                <a href="form_edit_wisuda_mhs.php?nim=<?php echo $data['nim']; ?> "  title="Edit Data" data-toggle="tooltip" class="btn btn-warning btn-sm small"><span class="glyphicon glyphicon-edit">Edit</span></a>
	                                                                                
	                                <!-- <a href="view_pendaftar_rega.php?aksi=delete&nim=<?php echo $data['nim']; ?>" title="Hapus Data" data-toggle="tooltip" onclick="return confirm('Anda yakin akan menghapus data dengan NIM : <?php echo $data['nim'];?>'); " class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a> -->
	                                
	                                <!-- <a href="export/form_pendaftar_wisuda_rega_pdf.php?nim=<?php echo $data['nim']; ?>"  title="View Detil" data-toggle="tooltip" class="btn btn-success btn-sm small" target="_blank"><span class="glyphicon glyphicon-search">CETAK</span></a> -->
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

</body>

</html>