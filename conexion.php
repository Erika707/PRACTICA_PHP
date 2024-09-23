<?php
$host = "localhost";
$usuario = "root";
$password = "";
$base_datos = "gestion_tareas";

// Conexión con la base de datos
$conn = new mysqli($host, $usuario, $password, $base_datos);

// Verificación de la conexión
if($conn->connect_error){
    die("Error en la conexión: " . $conn->connect_error);
}
?>
