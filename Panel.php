<?php 
include "Administrador.php";
    $variableM="a";
    $variable = $_POST["nombre"];  
    $clase = new Canal($variable,$variableM);
    $clase -> Crear_Canal();
    echo "<script>location.href='Administrador.php';</script>";
         
?>