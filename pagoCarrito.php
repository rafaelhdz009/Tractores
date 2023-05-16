<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PagoCarritos</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="/css/estilos.css">
    <link rel="stylesheet" href= "/css/tablas.css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="funciones.js"></script>

</head>

<body>
<div class="container">
    <div class="contact-box">
    <h3>Tus productos :</h3>
    <?php 
    include 'conexion.php';
        if(isset($_GET["idusu"]))
        {      
            $total = 0;
           $idUs = $_GET["idusu"];
           $idCom = $_GET["idcom"];
           $qrySelect = "SELECT id_compra, total FROM compras;";
                 $resultado = mysqli_query($conn,$qrySelect);
                 $filas = mysqli_num_rows($resultado);


                if($filas)
                {
                    while($rsCompra = mysqli_fetch_assoc($resultado))
                    {
                        $nombre = $rsCompra['nombre'];
                        $precio = $rsCompra['total'];
                        ?>
                        <div class="left">
                        <p><?php echo $nombre?></p>
                        <p>Precio: $<?php echo $precio?></p>
                        <hr>
                        </div>
                        <?php
                        $total = $total+$precio;
                    }
                }
                   
        }   
        var_dump($resultado);
        var_dump($filas);
    ?>
    
            <div class="right">
                <h3>Tu tarjeta ya ha sido registrada</h3>
                    <div class="contenedor-total">
                        <h5>Precio total :</h5>
                        <h6>$<?php echo $total ?></h6>
                    </div>
                     
                    <div class="contenedor-botones">
                        <a href="comprar.php?idcom=<?php echo $idCom ?>&total=<?php echo $total ?>">
                        <button type="submit" value="Enviar" class="btn" onclick="">Realizar compra</button>
                        </a>
                    </div>
                    

                </form>

            </div>
        </div>
    </div>

</body>

</html>