<?php  
    require "Personas.php";
    $cat = new Personas("nombre","id","usuario","mensaje");
    $nombre = $_POST["nombre"];  
    $id = $_POST["id"];
    $usuario = $_POST["Usuario"];  
    $mensaje="Asunto";
    $clase = new Personas($nombre,$id,$usuario,$mensaje);
    ?>
    <!DOCTYPE html>
    <html class="no-js" lang="en">
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/base.css">
    <link rel="stylesheet" href="css/vendor.css">
    <link rel="stylesheet" href="css/main.css">
    </head>
    <body id="top">
    <header class="s-header">
    <nav class="header-nav">
    <div class="header-nav__content">
    <ul class="header-nav__list">
    <li><a href="index.php">Inicio</a></li>
    <li><a>Integrantes del Canal</a></li>
    <li><?php  $clase -> MostrarFN();?></li>
    <li><?php  $clase->Unir_Usuario_Canal();?></li>
    <li>
    </ul>    
    </div> 
    </nav>  
    
    </header> 
    <a class="header-menu-toggle" href="#0">
    <span class="header-menu-text">Menu</span>
    <span class="header-menu-icon"></span>
    </a>
    
    <div class="row section-header" data-aos="fade-up">
    <div class="col-full">
    <h3 class="subhead">Deseas conocer a otras personas</h3>
    <h1 class="display-2 display-2--light"></h1> <?php echo $nombre;?></h1>
    </div>
    </div>
    <form action="View_Usuarios.php" method="post">
    <input type='hidden' id='Usuario' name='Usuario' value='<?php echo $usuario ?>'></input>
    <input type='hidden' id='nombre' name='nombre' value='<?php echo $nombre ?>'></input>
    <input type='hidden' id='id' name='id' value='<?php echo $id ?>'></input>
    <input type='hidden' id='Mensaje' name='Mensaje' value='<?php echo $mensaje ?>'></input>
    <div class="row contact-content" data-aos="fade-up">
    <div class="contact-primary">
    <input type='submit' value='Chatear'>                
    </form>
    
    <!-- Java Script ================================================== -->
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/plugins.js"></script>
    <script src="js/main2.js"></script>

</body>
</html>