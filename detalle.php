<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="resources/css/styles.css">
    <title>Detalle de Producto</title>
</head>
<body>
   
<script>
    function alerta() {
    alert("Producto no encontrado");
  
    }
</script>
    <?php
        include ('includes/conexion.php'); 
        $id_producto = isset($_GET['id_producto']) ? $_GET['id_producto'] : '';
        $nombre = isset($_GET['nombre']) ? $_GET['nombre'] : '';

        if ($id_producto != '') {
             $query = "SELECT * FROM productos WHERE id_producto = $id_producto";
        }else{
             $query = "SELECT * FROM productos WHERE nombre = '$nombre'";
        }
 
    ?>
    
    <header>
    <nav>
      <ul>
        <li><a href="catalogo.php">Catalogo</a></li>
      </ul>
    </nav>
    
   </header>

    <div class = "cont">
        <?php 
        $res = mysqli_query($conn, $query);
       
            if($row = $res-> fetch_assoc()) {
                    ?>
                    <div class = "card">
                            <h1 class="title2"><?php echo $row['nombre'];?></h1>
                            <img src="data:image/jpg;base64,<?php echo base64_encode($row['imagen'])?>">
                            <h4>Detalle</h4>
                            <ul class="list">
                                <li><?php echo $row['descripcion'];?></li>
                                <li>Precio: $<?php echo $row['precio'];?></li>
                                <li>Stock:<?php echo $row['stock'];?></li>
                            </ul>
                            <a href="#" class="btnA">Agregar</a>
                        </div>
            <?php
            }else{
                echo'<script type="text/javascript">
                alert("Producto no encontrado");
                window.location.href="catalogo.php";
                </script>';
        
            }
        ?>
    </div>
</body>
</html>