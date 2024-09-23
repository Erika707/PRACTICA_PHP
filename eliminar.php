<?php
include('conexion.php');

$id = $_GET['id'];

// Eliminar la tarea de la base de datos
$sql = "DELETE FROM tareas WHERE id = $id";

if ($conn->query($sql) === TRUE) {
    header("Location: index.php");
} else {
    echo "Error: " . $conn->error;
}
?>
