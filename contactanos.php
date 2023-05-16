<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="resources/css/styles.css">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <title>Contáctanos</title>

</head>
<body>
   <header>
    <h1 class="title">Tractobros</h1> 
    <nav>
      <ul>
        <li><a href="home.php">Inicio</a></li>
      </ul>
    </nav>
    </header>

    <div class="contenedor-flex">
            <h1>¿Quiénes somos?</h1>
            <p>
                <img src="resources\img\Dinotractor.jpg" width="250" height="200"/>
            </p>
            <p><h2>Somos un grupo dedicado a la venta de tractores de todo tipo, así como refacciones y diferentes accesorios<br>
            Ofrecemos gran variedad de modelos y productos de la mejor calidad a un precio accesible para todo público</h2></p>
            
            <div class="contenedor-flex2">
                <h1>¡Contáctanos!</h1>
                <form action="https://formspree.io/f/mvonywnw" name="formulario" class="formulario" method="POST" id="formulario" required>
                    <input type="text" name="nombre"  class="field" placeholder="Tu nombre" id="nombre" required>
                    <input type="email" name="email" class="field" placeholder="Tu correo" id="email" required>
                    <textarea name="mensaje" class="field area" id="mensaje" placeholder="Mensaje" required></textarea>
                
                <div class="contenedor-flex3">
                    <button type="submit" value="Enviar" class="btn-enviar">Enviar</button>
                    <input type="reset" class="btn-impiar" value="Limpiar" onclick="$('.is-invalid').removeClass('is-invalid');">
                </div>
                </form>
            </div>
    </div>

    <footer>

        <div class="contenedor-flex4">
        <h1 class="pie">O visítanos en:</h1>
            <a href="https://www.facebook.com/JurassicDrawings">
                <button1 type = "button">
                    <img src="resources\img\Facebook.png" width="100px" height="100px" alt="">  
                </button1>
            </a>
            
            <a href="https://www.youtube.com/@EmmanuelAlmeyda/videos">
                <button1 type = "button">
                    <img src="resources\img\Youtube.png" width="100px" height="100px" alt="">  
                </button1>
            </a>
        </div>
    </div>
    </footer>

</body>