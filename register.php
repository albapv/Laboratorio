<?php
// Datos de conexión a la base de datos
$servername = "localhost";
$username = "admin";
$password = "admin1234";
$dbname = "formulario_users";

// Obtener datos del formulario
$nombre = $_POST['nombre'];
$apellido1 = $_POST['apellido1'];
$apellido2 = $_POST['apellido2'];
$email = $_POST['email'];
$login = $_POST['login'];
$password = $_POST['password'];

// Validar email
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  echo "El email ingresado no es válido.";
  exit;
}

// Validar contraseña
if (strlen($password) < 4 || strlen($password) > 8) {
  echo "La contraseña debe tener entre 4 y 8 caracteres.";
  exit;
}

// Crear conexión a la base de datos
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Error al conectar con la base de datos: " . $conn->connect_error);
}

// Verificar si el email ya existe en la base de datos
$sql = "SELECT * FROM usuarios WHERE email = '$email'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
  echo "El email ingresado ya está registrado.";
  exit;
}

// Insertar datos en la tabla de usuarios
$sql = "INSERT INTO usuarios (nombre, apellido1, apellido2, email, login, password)
        VALUES ('$nombre', '$apellido1', '$apellido2', '$email', '$login', '$password')";

if ($conn->query($sql) === TRUE) {
  echo "Registro completado con éxito.";
} else {
  echo "Error al registrar el usuario: " . $conn->error;
}

$conn->close();
?>
