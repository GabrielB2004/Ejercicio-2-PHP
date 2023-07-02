
<!DOCTYPE html>
<html>
    <head>
        <title>Lista de casas</title>
    </head>
    <body>
        <h1><center>Inmobiliaria Punta De Mata</center></h1>
        <hr>
        <br>
        <h2>Buscar una casa:</h2>
        <tr>
            <th>
                <form name="inmobiliaria" method="post" action="busqueda.php">
                    <label for="buscar">Casa a buscar</label>
                    <input type="text" name="buscar" id="buscar">
                    <button type="submit">buscar</button>
                </form>

                <h2>lista de casas disponibles:</h2>
    </body>            
</html>                
<?php
$conexion = mysqli_connect("localhost", "root", "", "inmobiliaria");


if (!$conexion) {
    die("Error de conexión: " . mysqli_connect_error());
}


if (isset($_GET["borrar"])) {
    $numero_casas = $_GET["borrar"];
    $consulta = "DELETE FROM casas WHERE numero_casas = $numero_casas";
    $resultado = mysqli_query($conexion, $consulta);

    
    if ($resultado) {
        echo "Registro borrado exitosamente.";
    } else {
        echo "Error al borrar el registro: " . mysqli_error($conexion);
    }
}


$consulta = "SELECT numero_casas, color ,precio,dimensiones, habitaciones, direccion FROM casas";
$resultado = mysqli_query($conexion, $consulta);


if (!$resultado) {
    die("Error de consulta: " . mysqli_error($conexion));
}


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
    echo "<td><a href=\"?borrar=" . $fila["numero_casas"] . "\">Borrar</a></td>";
    echo "</tr>";
}
echo "</table>";

echo"¿volver al menu principal?<br><a href='index.html'>Volver</a>";
mysqli_close($conexion);

?>

