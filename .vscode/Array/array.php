<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agenda Personal</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }
        h1 {
            text-align: center;
            color: #333;
        }
        table {
            width: 50%;
            margin: 20px auto;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid #ccc;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #f0f0f0;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
    </style>
</head>
<body>

<h1>Agenda Personal</h1>

<?php
$agenda = [
    "Lusia" => "723647985",
    "Carmen" => "7298776314",
    "Sophia" => "7294478951",
    "Edgar" => "723144568",
];

// Validar que el array no esté vacío
if (!empty($agenda)) {
    echo '<table>';
    echo '<tr><th>Nombre</th><th>Teléfono</th></tr>';

    // Mostrar los datos en una tabla
    foreach ($agenda as $contacto => $telefono) {
        echo '<tr>';
        // Escapar datos para evitar inyecciones de HTML
        echo '<td>' . htmlspecialchars($contacto) . '</td>';
        echo '<td>' . htmlspecialchars($telefono) . '</td>';
        echo '</tr>';
    }

    echo '</table>';
} else {
    echo "<p>No hay contactos en la agenda.</p>";
}
?>

</body>
</html>
