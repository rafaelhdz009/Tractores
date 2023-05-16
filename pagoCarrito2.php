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
    <link rel="stylesheet" href="/css/tablas.css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="funciones.js"></script>

</head>

<body>
    <div class="container">
        <div class="contact-box">
            <div class="left"> <h3>Tus productos :</h3>
                <p>Serie 6000</p>
                <p>Precio: $145,000<?php $dato1 = '145000' ?></p>
                <hr>
                <p>Serie 3000</p>
                <p>Precio: $15000<?php $dato2 = '15000' ?></p>

            </div>
            <div class="right">
                <h3>Tu tarjeta ya ha sido registrada</h3> 
                    <div class="contenedor-total">
                        <h5>Precio total :</h5>
                        <h6>$<?php $res = $dato1 + $dato2;  
                         echo $res;?></h6>
                    </div>
                    
                    <div class="contenedor-botones">
                        <a href="historial.php">
                        <button type="submit" value="Enviar" class="btn" onclick="">Realizar compra</button>
                        </a>
                        
                    </div>
                    

                </form>

            </div>
        </div>
    </div>

</body>

</html>