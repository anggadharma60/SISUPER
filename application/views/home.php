<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SISUPER</title>

    <link rel="stylesheet" href="<?php echo base_url('assets_home/') . 'bootstrap-4.1.3-dist/css/bootstrap.min.css' ?>">

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="<?php echo base_url('assets_home/') . 'style.css' ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets_home/') . 'css/fixed.css' ?>">
    <script src="<?php echo base_url('assets_home/') . 'js/jquery-3.3.1.js' ?>"></script>

</head>
<style>
    html {
        scroll-behavior: smooth;
    }
</style>

<body data-spy="scroll" data-target="#navbarResponsive">

    <!--- start home section -->
    <div id="home">
        <!--- navigation -->
        <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
            <a class="navbar-brand" href="#home"><img src="<?php echo base_url('assets_home/') . 'img/pemkot.png' ?>">SISUPER</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#home">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#menu">Menu</a>
                    </li>
                    <!-- <li class="nav-item">
                        <a class="nav-link" href="#menu">Contact</a>
                    </li> -->
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo site_url('Autentikasi')?>">Login</a>
                    </li>
                </ul>
            </div>
        </nav>
        <!--- end navigation -->

        <!--- start image slider -->
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" data-interval="7000">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide="0" class="active"></li>
                <!-- <li data-target="#carouselExampleIndicators" data-slide="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide="2"></li> -->
            </ol>

            <div class="carousel-inner" role="listbox">
                <!--- slide 1 -->
                <div class="carousel-item active" style="background-image: url(<?php echo base_url('assets_home/') . 'img/1.jpg' ?>)">
                    <div class="carousel-caption text-center">
                        <h1>Welcome to SISUPER</h1>
                        <h3>Sistem Informasi Surat Pengantar</h3>
                        <a class="btn btn-outline-light btn-lg" href="#menu"> Try It</a>
                    </div>
                </div>
                <!--- slide 2 -->
                <!-- <div class="carousel-item" style="background-image: url(<?php echo base_url('assets_home/') . 'img/computers-2.png' ?>)">
                </div> -->
                <!--- slide 3 -->
                <!-- <div class="carousel-item" style="background-image: url(<?php echo base_url('assets_home/') . 'img/download.jpg' ?>)">
                </div> -->
            </div>
            <!--- end carousel inner -->
            <!--- prev & next buttons -->
            <!-- <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
            </a> -->
        </div>
        <!--- end image slider -->
    </div>
    <!--- end home section -->

    <!--- end portfolio section -->
    <div id="menu" class="offset">
        <div class="jumbotron container-fluid">
            <div class="col-12 text-center">
                <h3 class="heading">Menu</h3>
                <div class="heading-underline"></div>
            </div>
            <div class="row">
                <!-- <div class="col-sm-4">
                    <div class="portfolio">
                        <a href="#">
                            <img src="<?php echo base_url('assets_home/') . 'img/portfolio/1.png' ?>">
                        </a>
                    </div>
                </div> -->
                <!-- <div class="col-sm-4">
                    <div class="portfolio">
                        <a href="#">
                            <img src="<?php echo base_url('assets_home/') . 'img/portfolio/2.png' ?>">
                        </a>
                    </div>
                </div> -->
                <!-- <div class="col-sm-4">
                    <div class="portfolio">
                        <a href="#">
                            <img src="<?php echo base_url('assets_home/') . 'img/portfolio/3.png' ?>">
                        </a>
                    </div>
                </div> -->
                <div class="col-sm-4">
                    <div class="portfolio text-center">
                        <a class="btn btn-secondary btn-md" href="<?= site_url('Home/sudahPernah')?>">
                            Sudah Pernah
                        </a>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="portfolio text-center">
                        <a class="btn btn-secondary btn-md" href="<?= site_url('Home/cekSurat')?>">
                            Cek Surat
                        </a>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="portfolio text-center">
                        <a class="btn btn-secondary btn-md" href="<?= site_url('Home/belumPernah')?>">
                            Belum Pernah
                        </a>
                    </div>
                </div>
            </div>
            <!--- end row -->
        </div>
        <!--- end jumbotron -->
    </div>

    <div id="contact" >
        <footer>
            <div class="row justify-content-center">
                <div class="col-md-10 text-center">

                <hr class="socket">
                &copy; SISUPER SEKARAN
            </div>
            <!--- end of row -->
        </footer>
    </div>

    <!--- Script Source Files -->
    <script src="<?php echo base_url('assets_home/') . 'js/jquery-3.3.1.min.js' ?>"></script>
    <script src="<?php echo base_url('assets_home/') . 'bootstrap-4.1.3-dist/js/bootstrap.min.js' ?>"></script>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>

    <script src="https://use.fontawesome.com/releases/v5.6.1/js/all.js"></script>
    <!--- End of Script Source Files -->
</body>

</html>