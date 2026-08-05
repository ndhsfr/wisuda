<?php $thisPage="SIM Pendaftaran Wisuda - INDEX"; ?>
<?php $title = "Sim Pendaftaran Wisuda" ?>
<?php $description = "halaman index sistem Pendaftaran wisuda" ?>
<?php 
// require('akses_login.php');
include("header.php"); // memanggil file header.php
// include("koneksi.php"); // memanggil file koneksi.php untuk koneksi ke database -->
?>

<!-- Page Content -->
<div class="container">

		<!-- Page Heading/Breadcrumbs -->
        <div class="row">
            <div class="col-lg-12">
                
                <ol class="breadcrumb">
                    <li><a href="index.php">Home</a>
                    </li>
                    <li class="active">data pendaftar wisuda</li>
                </ol>
            </div>


        <div class="col-lg-12">

            <div style="padding: 0 15px;">
            <button type="button" id="btn-tambah" data-toggle="modal" data-target="#form-modal" class="btn btn-success pull-right">
                <span class="glyphicon glyphicon-plus"></span> &nbsp;Tambah Data
            </button>
            <h1 class="page-header">Data Pendaftaran Wisuda
                    <small></small>
                </h1>
            <hr/>
            
            <div id="pesan-sukses" class="alert alert-success"></div>
            
            <!--
            -- Buat sebuah div dengan id="view" yang digunakan untuk menampung data 
            -- yang ada pada tabel siswa di database
            -->
            <div id="view"><?php include "pendaftar_reg-A/view.php"; ?> </div>
            </div>
            
            <?php include "pendaftar_reg-A/modal.php"; ?>
            </div>

        </div>
        <!-- /.row -->


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

    <!-- Load File jquery.min.js yang ada difolder js -->
    <script src="js/jquery.min.js"></script>
       
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- css datepicker -->
    <link rel="stylesheet" href="css/bootstrap-datepicker.css" />

    <!-- datepicker JavaScript -->  
    <script src="js/bootstrap-datepicker.js"></script>

    <!-- Script to Activate the Carousel -->
    <script>
    $('.carousel').carousel({
        interval: 5000 //changes the speed
    })
    </script>
    
    <!-- Load file ajax.js yang ada di folder js -->
    <script src="js/ajax_pendaftaran_rega.js"></script>

    <script src="js/jquery.dataTables.js"></script>
    <script src="js/dataTables.bootstrap.js"></script>   
    <script type="text/javascript">
                $(function() {
                    $('#example1').dataTable();
                });
    </script>

    <script>

        $(document).ready(function() {

            $('.tanggal').datepicker({     // jika text bok tanggal di klik  
                    format: 'yyyy-mm-dd',
              });
          });

    </script>

</body>

</html>