<?php
    $servidor = "localhost";
    $usuarioBD = "root";
    $pwdBD = "";
    $nomBD = "tractores";

    $conexion = mysqli_connect($servidor,$usuarioBD,$pwdBD,$nomBD);
    if(!$conexion){
        die("La conexión fallo: ".mysqli_connect_error());
    } 
?>

