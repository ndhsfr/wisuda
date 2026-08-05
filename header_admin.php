<?php
include("config/cek_user_login.php"); // restriksi halaman admin
?><!-- <!DOCTYPE html> -->
<html lang="en">

<head>

    <!-- <meta charset="utf-8"> -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="<?php echo $description; ?> ">
    <meta name="author" content="anwar">

    <link rel="shortcut icon" href="img/favicon-stimugo.jpg" type="image/x-icon" />

    <title><?php echo $title; ?></title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- css dataTables -->
    <link href="css/dataTables.bootstrap.css" rel="stylesheet">

    <!-- css datepicker -->
    <link href="css/bootstrap-datepicker.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/modern-business.css" rel="stylesheet">
     <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!-- [if lt IE 9] -->
        <!-- <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script> -->
    <!-- [endif] -->

    <!-- Load File jquery.min.js yang ada difolder js -->
    <!-- <script src="js/jquery.min.js"></script> -->
        
    <!-- Load File bootstrap.min.js yang ada difolder js -->
    <!-- <script src="js/bootstrap.min.js"></script> -->


</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">SIM Pendaftaran Wisuda</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">  
                <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Data Wisuda sesuai SK<b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="view_datawisuda_berdasar_sk.php">IMPORT DATA</a>
                            </li>
                            <li role="separator" class="divider"></li>                     
                        </ul>
                    </li>                     
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Laporan Data<b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="rekap_pendaftar_wisuda.php">Rekap Pendaftar Wisuda(Sesuai SK)</a>
                            </li>
                            <li role="separator" class="divider"></li>
                            <li>
                                <a href="rekap_pendaftar.php">Rekap Pendaftar Wisuda</a>
                            </li>
                            <li role="separator" class="divider"></li>
                            <li>
                                <a href="rekap_bebas_studi.php">Rekap mhs Bebas Studi</a>
                            </li>
                            <li role="separator" class="divider"></li>
                            <li>
                                <a href="jumlah_pendaftar.php">Jumlah Pendaftar</a>
                            </li>
                            <li role="separator" class="divider"></li>
                            <li>
                                <a href="#">Predikat Terbaik Nilai Kelulusan</a>
                            </li>
                            <!-- <li>
                                <a href="blog-post.html">Blog Post</a>
                            </li> -->
                        </ul>
                    </li>   
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Bebas Studi<b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="ceking_bebas_studi_mhs.php">CEKING BEBAS STUDI mhs</a>
                            </li>
                            <li role="separator" class="divider"></li>
                            <li>
                                <a href="input_bebas_studi.php">INPUT BEBAS STUDI mhs</a>
                            </li>
                            <li role="separator" class="divider"></li>
                            <li role="separator" class="divider"></li>                        
                            <li>
                                <a href="cek_bebas_prodi.php">Prodi</a>
                            </li>
                            <li role="separator" class="divider"></li>
                            <li>
                                <a href="cek_bebas_perpus.php">Perpustakaan</a>
                            </li>
                            <li role="separator" class="divider"></li>
                            <li>
                                <a href="cek_bebas_labkes.php">Laboratorium</a>
                            </li>
                            <li role="separator" class="divider"></li>
                            <li>
                                <a href="cek_bebas_uang.php">Keuangan</a>
                            </li>
                            <li role="separator" class="divider"></li>
                            <li>
                                <a href="cek_bebas_lp3m.php">LPPM</a>
                            </li>    
                            <li role="separator" class="divider"></li>
                            <li>
                                <a href="cek_bebas_cdc.php">CDC</a>
                            </li>
                        </ul>
                    </li>                                   
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Data Wisuda<b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="pendaftaran_wisuda.php">Pendaftaran WISUDA</a>                              
                            </li>
                            <li role="separator" class="divider"></li>
                            <li>
                                <a href="view_pendaftar.php">LIHAT DATA</a>
                            </li>                          
                        </ul>
                    </li>
                      
                    <li> <a href="logout.php" title="Log out!" class="btn-small btn-primary" role="button"><span class="glyphicon glyphicon-list"></span> Logout!</a></li>                      
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    
