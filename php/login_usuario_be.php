<?php
    //Iniciando la sesión
    session_start();
    //Mandando a llamar conexión
    include 'conexion_be.php';

    $error = "";

    //Definiendo variables e inicializar con valores vacio
    $correo = $pwd =  "";

    //Definiendo variables de error
    $correoErr = $pwdErr = "";


    if($_SERVER["REQUEST_METHOD"] == "POST"){
        // Validando correo 
        if (empty(trim($_POST["correo"]))) {
            $correoErr = "Por favor, ingrese su correo";
            $error = "si";
        } else {
            $correo = verificarEntrada($_POST["correo"]); 
            if(filter_var($correo, FILTER_VALIDATE_EMAIL) === false){
                $correoErr = "No es un email valido, verifique";
                $error = "si";
            }
        }

        // Validando password
        if (empty(trim($_POST["pwd"]))) {
            $pwdErr = "Por favor, ingrese un password";
            $error = "si";
        } elseif (strlen(trim($_POST["pwd"])) < 8) {
            $pwdErr = "La contraseña debe de tener al menos 8 caracteres";
            $error = "si";
        }else {
            $pwd = verificarEntrada($_POST["pwd"]); 
        }

        if($error == ""){
            //Desencriptando contraseña
            $pwdD = hash('sha512',$pwd);
    
            $validar_login = mysqli_query($conexion,"SELECT * FROM usuarios WHERE correo='$correo' and pass='$pwdD'");
            if(mysqli_num_rows($validar_login) > 0){
                $_SESSION['usuario'] = $correo;
                header("location:index.php");   
                exit;
            } else{
                echo '
                    <script>
                        alert("Usuario no existe, por favor verifique 🧐");
                        window.location = "log.php";
                    </script>
                ';
                exit;
            }
        }
    }

    function verificarEntrada($entrada){
        $entrada = trim($entrada);
        $entrada = stripslashes($entrada);
        $entrada = htmlspecialchars($entrada);
        return $entrada;
    }
    
?>