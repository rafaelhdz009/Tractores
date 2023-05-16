
<link rel="stylesheet" href="./css/tablas.css">
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Historial</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="/css/estilos.css">
    <link rel="stylesheet" href="/css/tablas.css">
</head>
<body>
<h1> >Historial de pedidos< </h1> 
<?php
include('conexion.php');


// Consulta para obtener los pedidos del usuario
$sql = "SELECT * FROM compras WHERE usuarios_idUsuario = 1";
$result = $db->query($sql);

// Verificar si hay resultados

if ($result->num_rows > 0) {
    echo '<table>';
    echo '<tr>
              <th>Usuario ID</th>
              <th>Producto</th>
              <th>Total</th>
              <th>Fecha del pedido</th>
          </tr>';
    // Mostrar los pedidos
    while ($row = $result->fetch_assoc()) {
        echo '<tr>';
        echo '<td>' . $row["usuarios_idUsuario"] . '</td>';
        echo '<td>' . $row["id_compra"] . '</td>';
        echo '<td>' . $row["total"] . '</td>';
        echo '<td>' . $row["fecha"] . '</td>';
        echo '</tr>';
    }
    echo '</table>';

} else {
    echo "No se encontraron pedidos para este usuario.";
}




// ...
?>
</body>
</html>

