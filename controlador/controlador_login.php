<?php
session_start();
if (!empty($_POST["btningresar"])) {
  
    if (!empty($_POST["usuario"]) and !empty($_POST["password"])) {
        $usuario=$_POST["usuario"];
        $password=$_POST["password"];
        $sql=$conexion->query(" select * from usuario where Usuario = '$usuario' and Contraseña='$password'");
        $usuario=[" "];
        $password=[" "];

        if ($datos=$sql->fetch_object()) {
            $_SESSION["ID"]=$datos->ID;

            $_SESSION["Nombre"]=$datos->Nombre;
            $_SESSION["Apellidos"]=$datos->Apellidos;
            header('location: inicio.php');
        } else {
           echo "<div class='alert alert-danger'> Acceso Denegado </div>";
        }
        
    } 
    else {
        echo "Datos Incompletos!";
    }
}

