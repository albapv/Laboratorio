<?php
// Datos de conexión a la base de datos
$servername = "localhost";
$username = "admin";
$password = "admin1234";
$dbname = "formulario_users";

// Crear conexión a la base de datos
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Error al conectar con la base de datos: " . $conn->connect_error);
}

// Consultar registros en la tabla de usuarios
$sql = "SELECT * FROM usuarios";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  echo "<h2>Lista de Usuarios</h2>";
  echo "<table>";
  echo "<tr><th>Nombre</th><th>Primer Apellido</th><th>Segundo Apellido</th><th>Email</th><th>Login</th></tr>";
  while($row = $result->fetch_assoc()) {
    echo "<tr>";
    echo "<td>" . $row["nombre"] . "</td>";
    echo "<td>" . $row["apellido1"] . "</td>";
    echo "<td>" . $row["apellido2"] . "</td>";
    echo "<td>" . $row["email"] . "</td>";
    echo "<td>" . $row["login"] . "</td>";
    echo "</tr>";
  }
  echo "</table>";
} else {
  echo "No se encontraron registros.";
}

$conn->close();
?>
