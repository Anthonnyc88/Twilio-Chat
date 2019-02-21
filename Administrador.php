<?php session_start();
require "Canal.php";
$canal = new Canal("canal","canales");
?> 
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
  <title>Administrador</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">
  <link rel="stylesheet" href="css/estiloCanal.css">

  <!-- Favicons -->
  <link href="img/favicon.png" rel="icon">
  <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Roboto:100,300,400,500,700|Philosopher:400,400i,700,700i" rel="stylesheet">

  <!-- Bootstrap css -->
  <!-- <link rel="stylesheet" href="css/bootstrap.css"> -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="lib/owlcarousel/assets/owl.theme.default.min.css" rel="stylesheet">
  <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="lib/animate/animate.min.css" rel="stylesheet">
  <link href="lib/modal-video/css/modal-video.min.css" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="css/style.css" rel="stylesheet">


</head>

<body>

  <header id="header" class="header header-hide">
    <div class="container">

      <div id="logo" class="pull-left">
         
       
      </div>

      <nav id="nav-menu-container">
        <ul class="nav-menu">
          <li class="menu-active"><a href="#hero">Inicio</a></li>
          <li><a href="Cerrar.php">Cerrar Sesion</a></li>
        </ul>
    </div>
  </header>
  <section id="get-started" class="padd-section text-center wow fadeInUp">
    <div class="container">
      <div class="section-title text-center">
      <h1>Administrador <?php echo $_SESSION['Usuario'];
      if( $_SESSION['Usuario']!='Anthonny'){
        header("Location:index.php");      
      } ?></h1>
        <h2>Panel del Administrador</h2>               
<form action="Panel.php" method="post">
<div class="container">  
   </div>
   <div class="table-responsive">
     <thead>
      <tr>
       <div align="right" style="margin-bottom:5px;">
       <li><a href="" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user"></span><button type="button" name="add_button" id="add_button" class="btn btn-success btn-xs">Ingresar Canal</button></a>
					<ul class="dropdown-menu">
						<div style="width: 200px;">
							<div class="panel panel-primary">
              <h5><a href="" class="scrollto">Nombre del Canal</h5>
                  <input type="text" class="form-control" id="nombre" name="nombre">
                  <a href="" style="color:white; list-style:none;"></a><input  href="" type="submit" onclick="" class="btn btn-success" style="float:right;" id="Btnadd" value="Agregar">
                </div>
							</div>
						</div>
					</ul>
        </li>
     </thead>
    
   </div>
   <tbody>
    </tr>
  </tbody>
   </form>
   <h2>Canales</h2>
   <?php echo $canal->Ver_Canal();?>
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
