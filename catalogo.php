<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="resources/css/styles.css">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <title>Catalogo de Productos</title>
</head>
<body>
   <header>
    <h1 class="title">Catalogo Tractores</h1> 
    <nav>
      <ul>
        <li><a href="#">Inicio</a></li>
        <li>
            <div class ="buscar">
                <form action="detalle.php" method="get">
                    <input type="text" name="nombre" placeholder="Buscar" required>
                    <div class="btn">
                        <i class="fas fa-search"></i> 
                    </div>
                </form> 
            </div>
        </li>
      </ul>
    </nav>
    
   </header>

        <div class = "cont">
            

            <?php 
            include ('includes/conexion.php'); 
                    $query = "SELECT * FROM productos";
                    $res = $conn->query($query);
                    while ($row =$res-> fetch_assoc()) {
                        ?>

                        <div class="card">
                            <img src="data:image/jpg;base64,<?php echo base64_encode($row['imagen'])?>">
                            <h4><?php echo $row['nombre'];?></h4>
                            <a href="detalle.php?id_producto=<?php echo $row['id_producto'];?>">Ver mas</a>
                        </div>

            <?php
            }
            ?>
        </div>
    
</body>
</html>