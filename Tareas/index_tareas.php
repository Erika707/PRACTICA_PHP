<?php
include('conexion.php');

// Obtener todas las tareas
$sql = "SELECT * FROM tareas";
$resultado = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Tareas</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1 class="my-4 text-center">Gestión de Tareas</h1>

        <a href="nueva_tarea.php" class="btn btn-primary mb-3">Agregar Nueva Tarea</a>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Título</th>
                    <th>Descripción</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($fila = $resultado->fetch_assoc()): ?>
                    <tr>
                        <td><?= $fila['id']; ?></td>
                        <td><?= $fila['titulo']; ?></td>
                        <td><?= $fila['descripcion']; ?></td>
                        <td><?= $fila['estado']; ?></td>
                        <td>
                            <a href="editar_tarea.php?id=<?= $fila['id']; ?>" class="btn btn-warning">Editar</a>
                            <a href="eliminar_tarea.php?id=<?= $fila['id']; ?>" class="btn btn-danger" onclick="return confirm('¿Estás seguro?')">Eliminar</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
