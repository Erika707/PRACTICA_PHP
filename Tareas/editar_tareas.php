<?php
include('conexion.php');

$id = $_GET['id'];

// Obtener los datos de la tarea
$sql = "SELECT * FROM tareas WHERE id = $id";
$resultado = $conn->query($sql);
$tarea = $resultado->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $titulo = $_POST['titulo'];
    $descripcion = $_POST['descripcion'];
    $estado = $_POST['estado'];

    // Actualizar la tarea en la base de datos
    $sql = "UPDATE tareas SET titulo = '$titulo', descripcion = '$descripcion', estado = '$estado' WHERE id = $id";
    
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
    <title>Editar Tarea</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1 class="my-4 text-center">Editar Tarea</h1>
        <form method="POST" action="">
            <div class="form-group">
                <label for="titulo">Título de la Tarea</label>
                <input type="text" name="titulo" id="titulo" class="form-control" value="<?= $tarea['titulo']; ?>" required>
            </div>

            <div class="form-group">
                <label for="descripcion">Descripción</label>
                <textarea name="descripcion" id="descripcion" class="form-control" required><?= $tarea['descripcion']; ?></textarea>
            </div>

            <div class="form-group">
                <label for="estado">Estado</label>
                <select name="estado" id="estado" class="form-control">
                    <option value="pendiente" <?= $tarea['estado'] == 'pendiente' ? 'selected' : ''; ?>>Pendiente</option>
                    <option value="completada" <?= $tarea['estado'] == 'completada' ? 'selected' : ''; ?>>Completada</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Actualizar Tarea</button>
            <a href="index.php" class="btn btn-secondary">Volver</a>
        </form>
    </div>
</body>
</html>
