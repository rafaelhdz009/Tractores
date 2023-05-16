<?php
    include 'includes/conexion.php';
    
    $correo = "rafa@mail.com";//$_SESSION['usuario'];

    if(isset($_GET["nombre"])){          
       $nombre = $_GET["nombre"];

        $qryUs = "SELECT * FROM usuarios WHERE correo = '$correo'";
        $resultado = mysqli_query($conn,$qryUs);
        $filas = mysqli_num_rows($resultado);
        if($filas)
        {
            while($rsUs = mysqli_fetch_assoc($resultado))
            {
                $idUs = $rsUs['id_usuario'];
            }
        }

       $qrySel = "SELECT * FROM productos WHERE nombre = '$nombre'";
    $resultado = mysqli_query($conn,$qrySel);
    $filas = mysqli_num_rows($resultado);
        if($filas)
        {
            while($rsProducto = mysqli_fetch_assoc($resultado))
            {
                $idProd = $rsProducto['id_producto'];
                $nombre1 = $rsProducto['nombre'];

                $qryCom = "SELECT * FROM compras WHERE usuarios_idUsuario = $idUs";
                $resultado = mysqli_query($conn,$qryCom);
                $filas = mysqli_num_rows($resultado);
                if($filas)
                {
                    while($rsCompra = mysqli_fetch_assoc($resultado))
                    {
                        $idCom = $rsCompra['id_compra'];
                        $fecha = $rsCompra['fecha'];
                        if($fecha = "0000/00/00")
                        {
                            $qrySel = "SELECT * FROM detalle_compra WHERE productos_idProducto = $idProd AND compras_idCompra = $idCom";
                            $resultado = mysqli_query($conn,$qrySel);
                            $filas = mysqli_num_rows($resultado);
                            if($filas)
                            {
                                while($rsDC = mysqli_fetch_assoc($resultado))
                                {
                                    $cantidad = $rsDC['cantidad'];
                                    $stock = $rsProducto['stock'];
                                    if($cantidad == $stock)
                                    {
                                        echo'<script type="text/javascript">
                                            alert("No se puede agregar, stock insuficiente");
                                            window.location.href="producto.php" </script>';
                                    }
                                    else
                                    {
                                        $cantidad++;
                                        $qryUpd = "UPDATE detalle_compra SET cantidad = '$cantidad' WHERE productos_idProducto = $idProd AND compras_idCompra = $idCom";
                                        if(mysqli_query($conn,$qryUpd))
                                        {
                                            header("location:producto.php");
                                        }
                                    }
                                }
                            }
                            else
                            {
                                $cantidad = 1;
                                $qryIns = "INSERT INTO detalle_compra VALUES($idProd,$idCom,$cantidad)";
                                if(mysqli_query($conn,$qryIns))
                                {
                                    header("location:producto.php");
                                }
                            }
                        } 
                    }
                }
                else
                {
                    $qryInsert = "INSERT INTO compras (fecha,total,usuarios_idUsuario) VALUES('0000/00/00',0,$idUs)";
                    if(mysqli_query($conn,$qryInsert))
                    {
                        $qryCom = "SELECT * FROM compras WHERE usuarios_idUsuario = $idUs";
                        $resultado = mysqli_query($conn,$qryCom);
                        $filas = mysqli_num_rows($resultado);
                        if($filas)
                        {
                            while($rsCompra = mysqli_fetch_assoc($resultado))
                            {
                                $idCom = $rsCompra['id_compra'];
                                $fecha = $rsCompra['fecha'];
                                if($fecha = "0000/00/00")
                                {
                                    $cantidad = 1;
                                    $qryIns = "INSERT INTO detalle_compra VALUES($idProd,$idCom,$cantidad)";
                                    if(mysqli_query($conn,$qryIns))
                                    {
                                        header("location:producto.php");
                                    }
                                }
                            }
                        }
                    }
                    
                }
            }
        }
    }
    
    else{
        $id = $_GET["id"];
       $qrySel = "SELECT * FROM productos WHERE id_producto = $id";
    $resultado = mysqli_query($conn,$qrySel);
    $filas = mysqli_num_rows($resultado);
        if($filas)
        {
            while($rsProducto = mysqli_fetch_assoc($resultado))
            {
                $nombre1 = $rsProducto['nombre'];
                $idUs = 1;
                $qryCom = "SELECT * FROM compras WHERE usuarios_idUsuario = $idUs";
                $resultado = mysqli_query($conn,$qryCom);
                $filas = mysqli_num_rows($resultado);
                if($filas)
                {
                    while($rsCompra = mysqli_fetch_assoc($resultado))
                    {
                        $idCom = $rsCompra['id_compra'];
                        $fecha = $rsCompra['fecha'];
                        if($fecha = "0000/00/00")
                        {
                            $qrySel = "SELECT * FROM detalle_compra WHERE productos_idProducto = $id AND compras_idCompra = $idCom";
                            $resultado = mysqli_query($conn,$qrySel);
                            $filas = mysqli_num_rows($resultado);
                            if($filas)
                            {
                                while($rsDC = mysqli_fetch_assoc($resultado))
                                {
                                    $cantidad = $rsDC['cantidad'];
                                    $stock = $rsProducto['stock'];
                                    if($cantidad == $stock)
                                    {
                                        echo'<script type="text/javascript">
                                            alert("No se puede agregar, stock insuficiente");
                                            window.location.href="producto.php" </script>';
                                    }
                                    else
                                    {
                                        $cantidad++;
                                        $qryUpd = "UPDATE detalle_compra SET cantidad = '$cantidad' WHERE productos_idProducto = $id AND compras_idCompra = $idCom";
                                        if(mysqli_query($conn,$qryUpd))
                                        {
                                            header("location:producto.php");
                                        }
                                    }
                                }
                            }
                            else
                            {
                                $cantidad = 1;
                                $qryIns = "INSERT INTO detalle_compra VALUES($id,$idCom,$cantidad)";
                                if(mysqli_query($conn,$qryIns))
                                {
                                    header("location:producto.php");
                                }
                            }
                        } 
                    }
                }
                else
                {
                    $qryInsert = "INSERT INTO compras (fecha,total,usuarios_idUsuario) VALUES('0000/00/00',0,$idUs)";
                    if(mysqli_query($conn,$qryInsert))
                    {
                        $qryCom = "SELECT * FROM compras WHERE usuarios_idUsuario = $idUs";
                        $resultado = mysqli_query($conn,$qryCom);
                        $filas = mysqli_num_rows($resultado);
                        if($filas)
                        {
                            while($rsCompra = mysqli_fetch_assoc($resultado))
                            {
                                $idCom = $rsCompra['id_compra'];
                                $fecha = $rsCompra['fecha'];
                                if($fecha = "0000/00/00")
                                {
                                    $cantidad = 1;
                                    $qryIns = "INSERT INTO detalle_compra VALUES($idProd,$idCom,$cantidad)";
                                    if(mysqli_query($conn,$qryIns))
                                    {
                                        header("location:producto.php");
                                    }
                                }
                            }
                        }
                    }
                    
                }
            }
        }
    }
?>