<?php 
require "Administrador.php";
    $canal = $_POST["nombre"];
    $canales = $_POST["id"];
    $clase = new Canal($canal,$canales);
    $clase -> Modificar_Canal();
    echo "<script>location.href='Administrador.php';</script>";
?>