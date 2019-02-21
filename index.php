<?php
require "Personas.php";
$cat = new Personas("nombre","id","usuario","mensaje");
?> 
<!DOCTYPE html>
  <html lang="en">
  <head>
  <meta charset="utf-8">
  <title>Anthonny</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <!-- Favicons -->
  <link href="img/favicon.png" rel="icon">
  <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Roboto:100,300,400,500,700|Philosopher:400,400i,700,700i" rel="stylesheet">

  <!-- Bootstrap css -->
  <!-- <link rel="stylesheet" href="css/bootstrap.css"> -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  
  <!-- Main Stylesheet File -->
  <link href="css/style.css" rel="stylesheet">
  </head>

  <body>
  <header id="header" class="header header-hide">
  <div class="container">


  <nav id="nav-menu-container">
  <ul class="nav-menu">
  <li class="menu-active"><a href="#hero">Inicio</a></li>
  <li><a href="login.php">Salir</a></li>
  </ul>
  </div>
  </header>
  
  <section id="get-started" class="padd-section text-center wow fadeInUp">

  <div class="container">
  <div class="section-title text-center">
  <h2>Canales Disponibles</h2>
  <div class="table-responsive">
  <table class="table table-bordered table-striped">
  

  <?php echo $cat->Canal_Usuario();?>
  </table>
  </div>
  </div>
  </div>
  </div>
  </div>
  </section>
  </footer>
    <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
    <!-- JavaScript Libraries -->
    <script src="lib/jquery/jquery.min.js"></script>
    <script src="lib/jquery/jquery-migrate.min.js"></script>
    <script src="lib/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="lib/superfish/hoverIntent.js"></script>
    <script src="lib/superfish/superfish.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/modal-video/js/modal-video.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <!-- Contact Form JavaScript File -->
    <script src="contactform/contactform.js"></script>
    <!-- Template Main Javascript File -->
    <script src="js/main.js"></script>
  </body>
  </html>
