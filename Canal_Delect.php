<?php 
require "Administrador.php";
    $canal-"o";
    $canales = $_POST["eliminar"];
    $a = new Canal($canal,$canales);
    $a -> Eliminar_Canal();
    echo "<script>location.href='Admnistrador.php';</script>";
?>