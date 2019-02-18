<?php
session_start();
$_SESSION['Usuario'] ="Anthonny";     
$usuario = $_POST["Usuario"];
$contraseña = $_POST["Contraseña"];

if($usuario=="Admin" and $contraseña=="123"){
    header("Location:Administrador.php");       
}else{
    header("Location:index.php");       
}
  
                                        