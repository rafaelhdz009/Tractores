<?php
    include 'includes/conexion.php';
    if(isset($_GET["id"]))
    {      
       $id = $_GET["id"];
       $idCom = $_GET["idcom"];
       $qryEliminar = "DELETE FROM detalle_compra WHERE productos_idProducto = $id AND compras_idCompra = $idCom";
        if(mysqli_query($conn,$qryEliminar))
        {
            header("location:carritoCompras.php");
        }
    }   
?>