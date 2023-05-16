<?php session_start();
include('./conexion.php');
$query = "SELECT * FROM productos ";
$db = conectarBD();

$busqueda = mysqli_query($db,"SELECT id_producto,nombre,precio,descripcion,stock FROM productos");
      
      var_dump($busqueda); 


?>

<?php
  include('./nav_cart.php');
  include('./modal_cart.php')
?>





<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Carrito de compras</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>

  <div class="center mt-5">
    <div class="card pt-3">
      <p style="font-weight: bold; color:#0F6BB7; font-size: 22px;">Carrito Prueba</p>
      <div class="container-fluid p-2" style="background-color: ghostwhite;">


      <?php $busqueda = mysqli_query($db,"SELECT id_producto,nombre,precio,descripcion,stock FROM productos");
      $numero = mysqli_num_rows($busqueda);
      $precio = mysqli_query($db,"SELECT `precio` FROM `productos`; "); ?>


        <h5 class="card-tittle">Resultados (<?php echo $numero?>)</h5>
        <div class="container_card">

        <?php while ($resultado = mysqli_fetch_assoc($busqueda))
        var_dump($resultado)?>

          <form id="formulario" name="formulario" method="post" action="cart.php">
            <div class="blog-post">
              <img src="img/img1.jpg" alt="tract1">
              <a class="category">
                <?php echo $resultado["precio"] ?>$
              </a>
              <div class="text-content">
                <input name="id_producto" type="hidden" id="id_producto" value="">
                <input name="precio" type="hidden" id="precio" value="">
                <input name="nombre" type="hidden" id="nombre" value="">
                <input name="descripcion" type="hidden" id="descripcion" value="">
                <input name="stock" type="hidden" id="stock" value="1" class="pl-2" >

                <div class="card-body">
                  <h5 class="card-title"></h5>
                  <p></p>
                  <button class="btn btn-primary" type="submit"><i class="fas fa-shopping-cart"></i>Añadir al carrito </button>
                </div>
              </div>
            </div>
          </form>


        </div>
      </div>

    </div>

  </div>
</body>

</html>