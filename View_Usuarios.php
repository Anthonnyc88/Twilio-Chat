<?php
include "Personas.php";
$nombre = $_POST["nombre"];  
$id = $_POST["id"];
$Usuario = $_POST["Usuario"]; 
$Mensaje = $_POST["Mensaje"];
$clase = new Personas($nombre,$id,$Usuario,$Mensaje); 
?>
<!DOCTYPE html>
<html class="no-js" lang="en">
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/main.css">

    <style>
        

    </style>
    </head>
    <body id="top">
        
        
            <nav class="header-nav">
            <div class="header-nav__content">
            <ul class="header-nav__list">
            <li><a href="index.php">Principal></li>
            <li><a href="View_Usuarios.php?Canal='<?php?>'">Miembros del Canal</a></li>
            <li><?php  $clase -> MostrarFN();?></li>
            <li>
            </ul>    
            </div> 
            </nav>  
            <a class="header-menu-toggle" href="#0">
            <span class="header-menu-text">Chat</span>
            <span class="header-menu-icon"></span>
            </a>
        
        <a class="header-menu-toggle" href="#0">
            <span class="header-menu-text">Chat</span>
            <span class="header-menu-icon"></span>
            </a>
            <center>
            <div class="row section-header" data-aos="fade-up">
            <div class="col-full">
            <h1 class="display-2 display-2--light"></h1> <?php echo $nombre;?></h1>
            </div>
            
            <h3 class="">Chatea en Directo: <?PHP echo $Usuario; ?></h3>
            <div>
            <form action="View_Usuarios.php"  method="post"  novalidate="novalidate">
            <center>
            <input name="Mensaje" type="text" id="Mensaje" placeholder="Escriba algo ok" value="">
            <input type='hidden' id='nombre' name='nombre' value='<?php echo $nombre ?>'></input>
            <input type='hidden' id='id' name='id' value='<?php echo $id ?>'></input>
            <input type='hidden' id='Usuario' name='Usuario' value='<?php echo $Usuario ?>'></input>
            
            
            <input action="<?php?>" type='submit' class='btn btn-primary'  value='Enviar'>
            </center>    
        </form>                
             </div>

        <textarea  readonly="readonly" cols="50" style="margin: 0px 0px 9px; width: 300px; height: 169px;" ><?php  $clase ->EnviarMns(); $clase ->ListarMns(); ?></textarea>



    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/plugins.js"></script>
    <script src="js/main2.js"></script>

    </body>
</html>