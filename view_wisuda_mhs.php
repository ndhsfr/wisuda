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
            	<div class="title_left">
                	<div class="col-md-5 col-sm-5 col-xs-12 form-group pull-left top_search">
                 		<div class="input-group">
                   			<input type="text" name="t_search" id="t_search" class="form-control" placeholder="cari berdasarkan NIM anda.">
                    			<span class="input-group-btn">
                              		<button class="btn btn-default" type="button" id="go">Go!</button>
                          		</span>
                  		</div>
                	</div>
              	</div>
            </div>      <!-- / col lg 12 -->

              	<hr/>

            <div class="col-lg-12">	
                <div id="tampildata"> </div>             	
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
	$(document).ready(function()
	{
						 
		// $("#t_search").keyup(function() {		
		// 	var loadpage = "pendaftar_reg-A/view_pendaftar_wisuda_mhs_ajax.php";
		// 		var cari = $('input[name=t_search]').val();				
		// 		$.post(loadpage, {cari: cari}, function(data)
		// 		{						
					
		// 			$('#tampildata').html(data).show();
		// 		});		
		// });	
		

		$("#go").click(function() {
	
			var loadpage = "pendaftar_reg-A/view_pendaftar_wisuda_mhs_ajax.php";
				var cari = $('input[name=t_search]').val();				
				$.post(loadpage, {cari: cari}, function(data)
				{						
					
					$('#tampildata').html(data).show();					
				});		
		});	
						
	});	
	</script> 

</body>

</html>