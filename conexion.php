<?php

$db = conectarBD();
function conectarBD() : mysqli {
    $db = mysqli_connect('localhost','root','','tractores');
    if (!$db) {
        echo "Error no se pudo conectar";
        exit;
    }
    return $db;
    
}

?>

