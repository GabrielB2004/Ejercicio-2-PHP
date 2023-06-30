<?php
// Conexión a la base de datos MySQL
error_reporting(E_ALL);
$servidor = "localhost";
$usuario = "root";
$contraseña = "";
$base_de_datos = "inmobiliaria";
$conexion = mysqli_connect($servidor, $usuario, $contraseña, $base_de_datos);

// Procesamiento de la búsqueda
    if (isset($_POST["buscar"])) {
    $busqueda = $_POST["buscar"];
    $query = "SELECT * FROM casas WHERE numero_casas LIKE '%$busqueda%'";
    $resultado = mysqli_query($conexion, $query);
// Mostrar resultados de la búsqueda
echo"<table>";
echo"<tr>
<th>numero_casas</th>
<th>color</th>
<th>precio</th>
<th>dimensiones</th>
<th>habitaciones</th>
<th>direccion</th>
</tr>";
while ($fila = mysqli_fetch_assoc($resultado)) {
    echo "<tr>";
    echo "<td>" . $fila["numero_casas"] . "</td>";
    echo "<td>" . $fila["color"] . "</td>";
    echo "<td>" . $fila["precio"] . "</td>";
    echo "<td>" . $fila["dimensiones"] . "</td>";
    echo "<td>" . $fila["habitaciones"] . "</td>";
    echo "<td>" . $fila["direccion"] . "</td>";
    echo "</tr>";
    }
    echo "</table>";
}

mysqli_close($conexion);
?>