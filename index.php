<?php
    session_start();
    if(!isset($_SESSION['usuario'])){
        echo '
            <script>
                alert("Por favor debes iniciar sesión 🤠");
                window.location = "log.php";
            </script>
        ';
        session_destroy();
        die();
    } 
?>
<h1 style="text-align:center;"> PAGINA PRINCIPAL </h1>
       
<?php
    echo 'Bienvenido '.$_SESSION['usuario'];
?>
<br>
<a href="php/cerrar_sesion.php">Cerrar sesión</a>


        

