<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="resources/css/productoDiseño.css">
    <title>Detalle de Producto</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
   
    <?php
    session_start();
    if(!isset($_SESSION['usuario'])){
        echo '
            <script>
                alert("Por favor debes iniciar sesión 🤠");
                window.location = "log.php";
            </script>
        ';
        session_destroy();
        die();
    } 
        include ('includes/conexion.php'); 
        $correo = $_SESSION['usuario'];
        $prodCarrito = 0;
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
                    $qryTotal = "SELECT * FROM detalle_compra WHERE compras_idCompra = $idCom";
                    $resultado = mysqli_query($conn,$qryTotal);
                    $filas = mysqli_num_rows($resultado);
                    if($filas)
                    {
                        while($rsTotal = mysqli_fetch_assoc($resultado))
                        {  
                            $prodCarrito++;
                        }
                    }
                }
            }
        }
    ?>
    
    <header class="jumbotron-fluid">
    <nav>
      <ul>
        <li><a href="index.php">Inicio</a></li>
        <li>
            <a href="carritoCompras.php">
                <img src="resources/img/carrito.png" style="height:30px; width:30px;">
            </a>
            <span class="numProd"><?php echo $prodCarrito ?></span>
        </li>
      </ul>
    </nav>
    
   </header>
<body>
<div class="container-fluid">
    <?php 
        $qryProd = "SELECT * FROM productos";
        $resultado = mysqli_query($conn,$qryProd);
      $filas = mysqli_num_rows($resultado);
      if($filas)
      {
        while($rsProducto = mysqli_fetch_assoc($resultado))
        {
            $id = $rsProducto['id_producto'];
            ?>
        <div id="contenedorProducto">
        <div class="imagen">
          <img src="data:image/jpg;base64,<?php echo base64_encode($rsProducto['imagen'])?>" class="prodImg">
          </div>
          <div class="producto">
          <h4><?php echo $rsProducto['nombre'] ?></h4>
          </div>

          <div class="descripcion">
          <h4><?php echo $rsProducto['descripcion'] ?></h4>
          </div>

          <div class="stock">
          <h4>Stock: <?php echo $rsProducto['stock'] ?></h4>
          </div>

          <a href="agregar.php?id=<?php echo $id?>">
            <button class="btn btn-success"> Agregar </button>
            </a>
        </div>
        <?php
        }
      }
    ?>
</div>
</body>
</html>