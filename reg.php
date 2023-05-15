<?php
  include 'php/registro_usuario_be.php';

  session_start();
  if(isset($_SESSION['usuario'])){
        header("location:index.php");
  }
?>

<!doctype html>
<html lang="es">

<head>
  <title>Registro</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <!-- Estilos -->
  <link rel="stylesheet" href="css/reg.css">

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

</head>

<body>
  
  <main>
    <div class="contenedor_todo">
      <div class="caja_trasera">
        <div class="caja_trasera_login">
          <h3>¿Ya tienes una cuenta?</h3>
          <p>Inicia sesión para entrar en la página</p>
          <a href="log.php">
            <button id="btn_iniciar_sesion">Iniciar Sesión</button>
          </a>
        </div>
        <div class="caja_trasera_register">
          <h3>¿Aún no tienes cuenta?</h3>
          <p>Regístrate para que puedas iniciar sesión</p>
          <button id="btn_registrarse">Regístrate</button>
        </div>
      </div>

      <!-- Fomulario de login y registrto -->
      <div class="contenedor_login_register">
        <!-- Registro -->
        <form 
        action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>"
        method = "POST"
        class="formulario_register">
          <h2>Registrarse</h2>
          <input type="text" placeholder="Nombre" name="nombre" maxlength="44">
          <span class="msg-error"><?php echo $nombreErr; ?></span>

          <input type="text" placeholder="Apellidos" name="apellidos" maxlength="59">
          <span class="msg-error"><?php echo $apellidosErr; ?></span>

          <input type="number" placeholder="Edad" name="edad">
          <span class="msg-error"><?php echo $edadErr; ?></span>

          <input type="text" placeholder="Correo" name="correo" maxlength="49">
          <span class="msg-error"><?php echo $correoErr; ?></span>

          <input type="password" placeholder="Password" name="pwd" maxlength="254">
          <span class="msg-error"><?php echo $pwdErr; ?></span>

          <input type="text" placeholder="Dirección" name="direccion" maxlength="254">
          <span class="msg-error"><?php echo $direccionErr; ?></span>

          <input type="number" placeholder="Teléfono" name="telefono">
          <span class="msg-error"><?php echo $telErr; ?></span>


          <input type="number" placeholder="No. de Tarjeta" name="tarjeta">
          <span class="msg-error"><?php echo $tarjetaErr; ?></span>

          <input type="password" placeholder="CVV" name="cvv" pattern="^[1-9]\d*$">
          <span class="msg-error"><?php echo $cvvErr; ?></span>

        <input class="boton" type="submit" value="Regístrate">
        </form>
      </div>
    </div>
  </main>

  

  <script src="js/script.js"></script>
  <!-- Bootstrap JavaScript Libraries -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
    integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
  </script>
</body>

</html>