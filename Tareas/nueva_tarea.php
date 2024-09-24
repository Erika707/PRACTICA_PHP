<?php
include('conexion.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $titulo = $_POST['titulo'];
    $descripcion = $_POST['descripcion'];

    // Insertar la tarea en la base de datos
    $sql = "INSERT INTO tareas (titulo, descripcion) VALUES ('$titulo', '$descripcion')";
    
    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nueva Tarea</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1 class="my-4 text-center">Agregar una Nueva Tarea</h1>
        <form method="POST" action="">
            <div class="form-group">
                <label for="titulo">Título de la Tarea</label>
                <input type="text" name="titulo" id="titulo" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="descripcion">Descripción</label>
                <textarea name="descripcion" id="descripcion" class="form-control" required></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Guardar Tarea</button>
            <a href="index.php" class="btn btn-secondary">Volver</a>
        </form>
    </div>
</body>
</html>
<?='hola';?>   