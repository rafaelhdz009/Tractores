<?php
    //Mandando a llamar conexión
    include 'conexion_be.php';

    $error = "";

    //Definiendo variables e inicializar con valores vacio
    $nombre = $apellidos = $correo = $pwd = $direccion = "";
    $edad = $direccion = $tel = $tarjeta = $cvv = "";

    //Definiendo variables de error
    $nombreErr = $apellidosErr = $correoErr = $pwdErr = $direccionErr = "";
    $edadErr = $direccionErr = $telErr = $tarjetaErr = $cvvErr = "";

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        // Validando nombre
        if (empty(trim($_POST["nombre"]))) {
            $nombreErr = "Por favor, ingrese su nombre";
            $error = "si";
        } else {
            $nombre = verificarEntrada($_POST["nombre"]); 
        }

        // Validando apellidos
        if (empty(trim($_POST["apellidos"]))) {
            $apellidosErr = "Por favor, ingrese su apellido";
            $error = "si";
        } else {
            $apellidos = verificarEntrada($_POST["apellidos"]); 
        }

        // Validando edad
        if (empty(trim($_POST["edad"]))) {
            $edadErr = "Por favor, ingrese su edad";
            $error = "si";
        } elseif (trim($_POST["edad"]) >= 150) {
            $edadErr = "La edad no concuerda, verifique";
            $error = "si";
        } elseif(trim($_POST["edad"]) < 18) {
            $edadErr = "Debe ser mayor de edad";
            $error = "si";
        } else {
            $edad = verificarEntrada($_POST["edad"]); 
        }

        // Validando correo 
        if (empty(trim($_POST["correo"]))) {
            $correoErr = "Por favor, ingrese su correo";
            $error = "si";
        } else {
            $correo = verificarEntrada($_POST["correo"]); 
            if(filter_var($correo, FILTER_VALIDATE_EMAIL) === false){
                $correoErr = "No es un correo valido, verifique";
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

        // Validando direccion
        if (empty(trim($_POST["direccion"]))) {
            $direccionErr = "Por favor, ingrese su dirección";
            $error = "si";
        } else {
            $direccion = verificarEntrada($_POST["direccion"]); 
        }

        // Validando teléfono
        if (empty(trim($_POST["telefono"]))) {
            $telErr = "Por favor, ingrese su teléfono";
            $error = "si";
        } elseif (strlen(trim($_POST["telefono"])) != 10) {
            $telErr = "El número telefónico debe tener 10 dígitos";
            $error = "si";
        } else {
            $tel = verificarEntrada($_POST["telefono"]); 
        }

        // Validando no.tarjeta
        if (empty(trim($_POST["tarjeta"]))) {
            $tarjetaErr = "Por favor, ingrese su tarjeta";
            $error = "si";
        } elseif (strlen(trim($_POST["tarjeta"])) != 16) {
            $tarjetaErr = "El número de tarjeta debe tener 16 dígitos";
            $error = "si";
        } else {
            $tarjeta = verificarEntrada($_POST["tarjeta"]); 
        }

        // Validando cvv
        if (empty(trim($_POST["cvv"]))) {
            $cvvErr = "Por favor, ingrese su CVV";
            $error = "si";
        } elseif (strlen(trim($_POST["cvv"])) != 3) {
            $cvvErr = "El CVV debe tener 3 dígitos";
            $error = "si";
        } else {
            $cvv = verificarEntrada($_POST["cvv"]); 
        }


        // Comrobando errores de entrada antes de insertar en la BD
        if($error == ""){
            // Encriptar contraseña
            $pwd_encript = hash('sha512',$pwd);
            $cvv_encript = hash('sha512',$cvv);

            //Query de inserción de empleados
            $query = "INSERT INTO usuarios (nombre, apellidos, edad, correo, pass, direccion, tel, no_tarjeta, cvv) 
            VALUES ('$nombre','$apellidos','$edad','$correo','$pwd_encript','$direccion','$tel','$tarjeta','$cvv_encript')";


            //Verificar que el correo no se repita en la BD
            $verificarCorreo = mysqli_query($conexion, "SELECT * FROM usuarios WHERE correo='$correo'");
            if(mysqli_num_rows($verificarCorreo) > 0){
                echo '
                    <script>
                    alert("¡Ops! Este correo ya existe 😔, intenta con otro diferente");
                    window.location = "reg.php";
                    </script>
                ';
                exit();
            } 
            $ejecutar = mysqli_query($conexion, $query);


            if($ejecutar){
                echo '
                    <script>
                        alert("¡Felicidades! Usuario registrado exitosamente ☺");
                        window.location = "log.php";
                    </script>
                ';
            } else{
                echo '
                <script>
                    alert("Intentalo de nuevo, usuario no registrado 😔");
                    window.location = "reg.php";
                </script>
            '; 
            }
        }
    }

    function verificarEntrada($entrada){
        $entrada = trim($entrada);
        $entrada = stripslashes($entrada);
        $entrada = htmlspecialchars($entrada);
        return $entrada;
    }
    
    mysqli_close($conexion);
?>