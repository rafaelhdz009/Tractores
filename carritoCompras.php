<!doctype html>
<html lang="en">
  <head>
    <title>Carrito de compras</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="resources/css/carritoDiseño.css">
  </head>

  <header>
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
    include 'includes/conexion.php';

    $correo = $_SESSION['usuario']; 
    $qryUs = "SELECT * FROM usuarios WHERE correo = '$correo'";
      $resultado = mysqli_query($conn,$qryUs);
      $filas = mysqli_num_rows($resultado);
      if($filas)
      {
          while($rsUs = mysqli_fetch_assoc($resultado))
          {
              $idUs = $rsUs['id_usuario'];
              $nombre = $rsUs['nombre'];
          }
      }
    ?>
    <div class="container-fluid" id="contenedorCabeza">
        <div class="jumbotron" id="titulo">
          <h1>Carrito de Compras</h1>
        </div>
        <nav class="navbar navbar-expand-sm navbar-light">
      <ul class="navbar-nav me-auto">
        <li><a href="index.html" class="nav-link text-white">Inicio</a></li>
        <li><a href="producto.php" class="nav-link text-white">Catalogo</a></li>
        <li class="d-flex"><span id="bienvenido" style="color: white; margin-right:15px; margin-top:7px;"><strong>Usuario: <?php echo $nombre ?></strong> </span></li>
      </ul>
    </nav>
    </div>
  </header>
  <body>
<div class="contenedor">
  <div class="contenedorCarrito">
<?php

      $prodCarrito = 0;

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
                $qrySelect = "SELECT p.id_producto id, p.nombre nombre, p.imagen imagen, p.stock stock, p.precio, dc.cantidad cant
                FROM productos p JOIN detalle_compra dc ON(p.id_producto = dc.productos_idProducto)
                JOIN compras c ON(dc.compras_idCompra = c.id_compra)
                WHERE id_compra = $idCom AND usuarios_idUsuario = $idUs";
              }
          }
      }

      
      $resultado = mysqli_query($conn,$qrySelect);
      $filas = mysqli_num_rows($resultado);
      if($filas)
      {
        $cantidadTotal = 0;
        while($rsProducto = mysqli_fetch_assoc($resultado))
        {
          $id=$rsProducto['id'];
          $cantidad = 0;
          $stock = $rsProducto['stock'];
          $cantidadSeleccionada = $rsProducto['cant'];
          ?>
            <div id="contenedorProducto">
              <div class="imagen">
                <img src="data:image/jpg;base64,<?php echo base64_encode($rsProducto['imagen'])?>" class="prodImg">
              </div>

              <div class="producto">
              <h4><?php echo $rsProducto['nombre'] ?></h4>
              </div>

              <div class="cantidad">
                <form action="modificar.php?id=<?php echo $id ?>&idcom=<?php echo $idCom ?>" method="post">
                  <label><strong>Cantidad: <?php echo $cantidadSeleccionada ?> </strong></label>
                  <select name="cant" id="cant" class="form-control">
                    <?php
                      while($cantidad < $stock)
                      {
                        ?> <option value = <?php echo $cantidad + 1 ?>> <?php echo $cantidad + 1 ?> </option> <?php
                        $cantidad++;
                      }			            
                    ?>
                  </select>
                  <input id="modificar" type="submit" value="Modificar">
                </form>
              </div>

              <div class="eliminar">
                <a href="eliminar.php?id=<?php echo $id ?>&idcom=<?php echo $idCom ?>">
                  <button type="button" class="btn btn-danger">Eliminar</button>
                </a>
              </div>

              <div class="total">
                <p><strong>Total:<strong></p>
                <?php
                  $totalProd = $rsProducto['precio']*$cantidadSeleccionada;
                  echo "$".$totalProd;
                  $cantidadTotal = $cantidadTotal+$totalProd;
                ?>
              </div>
            </div>
          <?php
        }
        ?>
          </div>
          <div class="container-fluid d-flex flex-row-reverse">
            <div class="cuadroTotal">
            <h4>TOTAL CARRITO:</h4>
            <p><strong><?php echo "$".$cantidadTotal ?> </strong></p>
            <a href="#"><button class="btn btn-success"> Realizar Compra </button></a>
            </div>
          </div>
      </div>
        <?php
      }
      else
      {
        echo "<h1> No tienes nada agregado en el carrito, ve a Tienda para agregar un producto </h1>";
      }
    ?>
  </body>
</html>