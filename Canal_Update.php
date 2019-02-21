<?php 
require "Administrador.php";
    $variableM = $_POST["nombre"];
    $variable = $_POST["id"];
    $clase = new Canal($variable,$variableM);
    $clase -> Modificar_Canal();
    echo "<script>location.href='Administrador.php';</script>";
?>