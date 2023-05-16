<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="/resources/css/styles.css">
    <link rel="stylesheet" href="resources/css/styles.css">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <title>Catálogo de Productos</title>
</head>
<body>
   <header class="wrapper">
   <nav>
      <ul>
      <li>
            <a href="#inicio"><i class="fa fa-home" aria-hidden="true"></i> Inicio</a> 
        </li>
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
    <h1 class="title" style="text-shadow: 2px 2px 3px #000;">CATÁLOGO DE ...</h1> 
    <div id="content">
        <div class="logo">
           <img src="resources/img/Logo.png" alt="LogoTractores" style="height:130px; width:130px;" >
        </div>
        <div>
        <h2 style="color:white; text-shadow: 2px 2px 3px grey; text-align:bottom; padding:15px">MÁQUINAS AGRÍCOLAS</h2>
        </div>
    </div>
    
    <br>
    </header>
        <div class = "cont ">
            

            <?php 
            include ('includes/conexion.php'); 
                    $query = "SELECT * FROM productos";
                    $res = $conn->query($query);
                    while ($row =$res-> fetch_assoc()) {
                        ?>

                        <div class="card">
                            <img src="data:image/jpg;base64,<?php echo base64_encode($row['imagen'])?>">
                            <h4><?php echo $row['nombre'];?></h4>
                            <a href="detalle.php?id_producto=<?php echo $row['id_producto'];?>">Ver más</a>
                        </div>

            <?php
            }
            ?>
        </div>
    
</body>
<footer>
<div id="content2">
        <div >
            <h2>Contáctanos</h2>
            <p>Sobre nosotros <br>Innovación <br>Historia <br>Politica de calidad</p>
        </div>
        <div>
            <h2>Productos y soporte</h2>
            <p>Sobre nosotros <br>Innovación <br>Historia <br>Politica de calidad</p>
        </div>
        <div>
            <li><a href="#"><img src="resources/img/whatsapp.png" alt=""></a></li>
            <li><a href="#"><img src="resources/img/facebook.png" alt=""></a></li>
            <li><a href="#"><img src="resources/img/instagram.png" alt=""></a></li>
        </div>
    </div>
</footer>
</html>
<style>
    
.title{
    text-align:center;
    font-size: 40px;
    color:white;
    margin-top: 2px;
    font-family: 'Roboto', sans-serif;
    }
    #content{
        height:100px; 
        background-image:url(resources/img/carretera.png);
        display: -webkit-flex;
        -webkit-flex-direction: row;
        display:flex;
        flex-direction: row;
        justify-content:space-evenly;
    }
    #content2{
        display: -webkit-flex;
        -webkit-flex-direction: row;
        display:flex;
        flex-direction: row;
        justify-content:space-evenly;
    }
    a:hover{
        color: black; 
      }
    
      .wrapper{
        margin: auto;
        width: 100%;
        overflow: hidden;
    }
footer{
    background-color:#06820b ;
    padding-bottom: 20px ;
}

footer li img{
width: 50px;
height: 50px;
}
footer li{
padding-top: 10px ;
}
</style>