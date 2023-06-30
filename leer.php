<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
<body>
 <style>
      body {
        font-family: Arial, sans-serif;
        background-color: #f5f5f5;
      }
      
      h1 {
        color: #333333;
        text-align: center;
      }
      
      ul {
        list-style: none;
        padding: 0;
        margin: 0;
        display: flex;
        flex-direction: column;
        align-items: center;
      }
      
      li {
        margin: 10px;
      }
      
      a {
        display: block;
        padding: 10px;
        background-color: #3366cc;
        color: #ffffff;
        text-decoration: none;
        border-radius: 5px;
        transition: background-color 0.3s ease-in-out;
      }
      
      a:hover {
        background-color: #003366;
      }
    </style>

    <h1>Leer o borrar datos de los doctores registrados</h1>
</body>
</html>
<?php
// Conectarse a la base de datos
$conexion = mysqli_connect("localhost", "root", "", "inmobiliaria");

// Verificar si la conexión fue exitosa
if (!$conexion) {
    die("Error de conexión: " . mysqli_connect_error());
}

// Verificar si se ha enviado un ID de registro para borrar
if (isset($_GET["borrar"])) {
    $cedula = $_GET["borrar"];
    $consulta = "DELETE FROM casas WHERE numero_casas = $numero_casas";
    $resultado = mysqli_query($conexion, $consulta);

    // Verificar si el borrado fue exitoso
    if ($resultado) {
        echo "Registro borrado exitosamente.";
    } else {
        echo "Error al borrar el registro: " . mysqli_error($conexion);
    }
}

// Consultar los datos de la tabla "doc"
$consulta = "SELECT numero_casas, color ,precio,dimensiones, habitaciones, direccion FROM casas";
$resultado = mysqli_query($conexion, $consulta);

// Verificar si la consulta fue exitosa
if (!$resultado) {
    die("Error de consulta: " . mysqli_error($conexion));
}

// Mostrar los datos en una tabla HTML
echo "<table border=1>";
echo "<tr><th>numero_casas</th><th>color</th><th>precio</th><th>Dimensiones</th><th>habitaciones</th><th>direccion</th><th>Borrar</th></tr>";
while ($fila = mysqli_fetch_assoc($resultado)) {
    echo "<tr>";
    
    echo "<td>" . $fila["numero_casas"] . "</td>";
    echo "<td>" . $fila["color"] . "</td>";
    echo "<td>" . $fila["precio"] . "</td>";
    echo "<td>" . $fila["dimensiones"] . "</td>";
    echo "<td>" . $fila["habitaciones"] . "</td>";
    echo "<td>" . $fila["direccion"] . "</td>";
    echo "<td><a href=\"?borrar=" . $fila["numero-casas"] . "\">Borrar</a></td>";
    echo "</tr>";
}
echo "</table>";

// Cerrar la conexión a la base de datos
mysqli_close($conexion);
?>
<!DOCTYPE html>
<html>
<head>
  
</head>
<body>
  
<ul>
<li><a href="index.html">volver al menu principal</a></li>
</ul>

</body>
</html>