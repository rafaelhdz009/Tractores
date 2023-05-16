<?php
    include 'includes/conexion.php';

    if(isset($_POST["cant"]))
    {      
        $cant = $_POST["cant"];
        $id = $_GET["id"];
        $idCom =$_GET["idcom"];
        $qryModificar = "UPDATE detalle_compra SET cantidad = $cant WHERE productos_idProducto = $id AND compras_idCompra = $idCom";
        if(mysqli_query($conn,$qryModificar))
        {
            header("location:carritoCompras.php");
        }
    }
    
?>