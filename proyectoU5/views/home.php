<!-- PHP code to establish connection with the localserver -->




<?php
$conn = new mysqli("localhost", "root", "", "tractores");

	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}

	$sql = "SELECT nombre,descripcion,precio,detalle_compra.cantidad,imagen
  FROM productos
  INNER JOIN detalle_compra ON id_producto=detalle_compra.productos_idProducto
  ORDER BY detalle_compra.cantidad LIMIT 9";
  $result = $conn->query($sql);
	$conn->close();
?>

  
  
    

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>
</head>

<body>
<div id="carousel1" class="carousel slide mt-5 container-fluid" data-ride="carousel">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carousel1" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carousel1" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carousel1" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner ">
    
    <div class="carousel-item active">
      <img src="/src/img/tractor.jpg" class="rounded d-block object-fit-cover mx-auto" height="200" alt="...">
    </div>
    <div class="carousel-item">
      <img src="/src/img/agricultura_campo.jpg" class="rounded d-block object-fit-fill mx-auto" height="200" alt="...">
    </div>
    <div class="carousel-item">
      <img src="/src/img/tractor.jpg" class="rounded d-block object-fit-cover mx-auto" height="200" alt="...">
    </div>
    </div>

 
</div>

<h1>Los más destacados</h1>

<div id="carousel2" class="carousel slide mt-5 h-50 mx-auto" data-ride="carousel">
<div class="carousel-indicators">
    <button type="button" data-bs-target="#carousel2" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carousel2" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carousel2" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <?php while($rows=$result->fetch_assoc())
                {
            ?>
  <div class="carousel-inner mx-auto">
    
  
    <div class="carousel-item active">
    <div class="container text-center">
    <div class="row align-items-center">    
  <div class="card" style="width: 18rem;">
  <img src="/src/img/2-fivewayschem.jpg" class="card-img-top" width="175" height="200" />

  <div class="card-body">
    <h5 class="card-title"><?php echo $rows['precio'] ?></h5>
    <p class="card-text"><?php echo $rows['nombre'] ?></p>
    <p class="card-text"><?php echo $rows['descripcion'] ?></p>
    <a href="#" class="btn btn-primary">Comprar</a>
  </div>
</div>
<div class="card" style="width: 18rem;">
<img src="/src/img/2-fivewayschem.jpg" class="card-img-top" width="175" height="200" />
  <div class="card-body">
    <h5 class="card-title"><?php echo $rows['precio'] ?></h5>
    <p class="card-text"><?php echo $rows['nombre'] ?></p>
    <p class="card-text"><?php echo $rows['descripcion'] ?></p>
    <a href="#" class="btn btn-primary">Comprar</a>
  </div>
</div>
<div class="card" style="width: 18rem;">
<img src="/src/img/2-fivewayschem.jpg" class="card-img-top" width="175" height="200" />
  <div class="card-body">
    <h5 class="card-title"><?php echo $rows['precio'] ?></h5>
    <p class="card-text"><?php echo $rows['nombre'] ?></p>
    <p class="card-text"><?php echo $rows['descripcion'] ?></p>
    <a href="#" class="btn btn-primary">Comprar</a>
  </div>
</div>
      </div>
    </div>

      </div>
      <div class="carousel-item">
    <div class="container text-center">
    <div class="row align-items-center">    
  <div class="card" style="width: 18rem;">
  <img src="/src/img/2-fivewayschem.jpg" class="card-img-top" width="175" height="200" />

  <div class="card-body">
    <h5 class="card-title"><?php echo $rows['precio'] ?></h5>
    <p class="card-text"><?php echo $rows['nombre'] ?></p>
    <p class="card-text"><?php echo $rows['descripcion'] ?></p>
    <a href="#" class="btn btn-primary">Comprar</a>
  </div>
</div>
<div class="card" style="width: 18rem;">
<img src="/src/img/2-fivewayschem.jpg" class="card-img-top" width="175" height="200" />

  <div class="card-body">
    <h5 class="card-title"><?php echo $rows['precio'] ?></h5>
    <p class="card-text"><?php echo $rows['nombre'] ?></p>
    <p class="card-text"><?php echo $rows['descripcion'] ?></p>
    <a href="#" class="btn btn-primary">Comprar</a>
  </div>
</div>
<div class="card" style="width: 18rem;">
<img src="/src/img/2-fivewayschem.jpg" class="card-img-top" width="175" height="200" />

  <div class="card-body">
    <h5 class="card-title"><?php echo $rows['precio'] ?></h5>
    <p class="card-text"><?php echo $rows['nombre'] ?></p>
    <p class="card-text"><?php echo $rows['descripcion'] ?></p>
    <a href="#" class="btn btn-primary">Comprar</a>
  </div>
</div>
      </div>
    </div>

      </div>
      <div class="carousel-item">
    <div class="container text-center">
    <div class="row align-items-center">    
  <div class="card" style="width: 18rem;">
  <img src="<?php echo $rows['imagen'] ?>" class="card-img-top" width="175" height="200" />
  <div class="card-body">
    <h5 class="card-title"><?php echo $rows['precio'] ?></h5>
    <p class="card-text"><?php echo $rows['nombre'] ?></p>
    <p class="card-text"><?php echo $rows['descripcion'] ?></p>
    <a href="#" class="btn btn-primary">Comprar</a>
  </div>
</div>
<div class="card" style="width: 18rem;">
<img src="/src/img/2-fivewayschem.jpg" class="card-img-top" width="175" height="200" />

  <div class="card-body">
    <h5 class="card-title"><?php echo $rows['precio'] ?></h5>
    <p class="card-text"><?php echo $rows['nombre'] ?></p>
    <p class="card-text"><?php echo $rows['descripcion'] ?></p>
    <a href="#" class="btn btn-primary">Comprar</a>
  </div>
</div>
<div class="card" style="width: 18rem;">
<img src="/src/img/2-fivewayschem.jpg" class="card-img-top" width="175" height="200" />

  <div class="card-body">
    <h5 class="card-title"><?php echo $rows['precio'] ?></h5>
    <p class="card-text"><?php echo $rows['nombre'] ?></p>
    <p class="card-text"><?php echo $rows['descripcion'] ?></p>
    <a href="#" class="btn btn-primary">Comprar</a>
  </div>
</div>
      </div>
    </div>

      </div>
  </div>
  <?php }?>
 
  <button class="carousel-control-prev" type="button" data-bs-target="#carousel2" data-bs-slide="prev">
    <span class="carousel-control-prev-icon " aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carousel2" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
<div class="mt-5"></div>
</body>


</html>