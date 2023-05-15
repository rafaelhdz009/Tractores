<?php
  include 'php/login_usuario_be.php';

  if(isset($_SESSION['usuario'])){
    header("location:index.php");
  }
?>

<!doctype html>
<html lang="es">

<head>
  <title>Login</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <!-- Estilos -->
  <link rel="stylesheet" href="css/log.css">

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
          <p>Inicia sesisión para entrar en la página</p>
          <button id="btn_iniciar_sesion">Iniciar Sesión</button>
        </div>
        <div class="caja_trasera_register">
          <h3>¿Aún no tienes cuenta?</h3>
          <p>Regístrate para que puedas iniciar sesión</p>
          <a href="reg.php">
            <button id="btn_registrarse">Regístrate</button>
          </a>
        </div>
      </div>

      <!-- Fomulario de login y registrto -->
      <div class="contenedor_login_register">
        <!-- Login -->
        <form 
        action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>"
        method = "POST"
        class="formulario_login">
          <h2>Iniciar Sesión</h2>

          <input type="text" placeholder="Correo Electrónico" name="correo" maxlength="49">
          <span class="msg-error"><?php echo $correoErr; ?></span>

          <input type="password" placeholder="Password" name="pwd" maxlength="254">
          <span class="msg-error"><?php echo $pwdErr; ?></span>

          <input class="boton" type="submit" value="Entrar">
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