<?php $thisPage="SIM Pendaftaran Wisuda - INDEX"; ?>
<?php $title = "Sim Pendaftaran Wisuda" ?>
<?php $description = "halaman index sistem Pendaftaran wisuda" ?>
<?php 
//require('config/akses_login.php');
include("header_admin.php"); // memanggil file header.php
// include("koneksi.php"); // memanggil file koneksi.php untuk koneksi ke database -->
?>

    <!-- Header Carousel -->
    <header id="myCarousel" class="carousel slide">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner">
            <div class="item active">
                <div class="fill" style="background-image:url('img/aula-stikes.jpg');"></div>
                <div class="carousel-caption">
                    <h2>Aula Gedung rektorat Lt III</h2>
                </div>
            </div>
            <div class="item">
                <div class="fill" style="background-image:url('img/foto-bersama.jpg');"></div>
                <div class="carousel-caption">
                    <h2>Foto Bersama Wisuda</h2>
                </div>
            </div>
            <div class="item">
                <div class="fill" style="background-image:url('img/wisuda.jpg');"></div>
                <div class="carousel-caption">
                    <h2>Pemindahan Tali Toga Wisuda</h2>
                </div>
            </div>
        </div>

        <!-- Controls -->
        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
            <span class="icon-prev"></span>
        </a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next">
            <span class="icon-next"></span>
        </a>
    </header>

    <!-- end header animasi slide -->

    <!-- Page Content -->
    <div class="container">

        <!-- Marketing Icons Section -->
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12 col-lg-12">
                  <!-- Main component for a primary marketing message or call to action -->
                  <div class="jumbotron">
                    <h2><b>Selamat Datang<b></h2>
                    <h3>SIM PENDAFTARAN WISUDA</h3>                   
                    <h4>UNIVERSITAS MUHAMMADIYAH GOMBONG</h4>                                 

<!--                     <a href="logout.php" data-toggle="tooltip" title="Login!" class="btn-lg btn-success" role="button"><span class="glyphicon glyphicon-list"></span> Logout!</a> -->

                  
                  </div> <!-- /jumbotron -->
            </div> <!-- /col-md-12 -->

        </div>  <!-- / row -->

        <hr>


        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; <a href="https://unimugo.ac.id"> Universitas Muhammadiyah Gombong </a> - 2017</p>
                </div>
            </div>
        </footer>

    </div> <!-- /.container -->
    

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

</body>

</html>
