<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabla de multiplicar - Version1</title>
</head>
<body>
    <?php
    //recuperamos el numero escrito en el formulario
    $n = $_REQUEST["numero"];
    //Mostramos la tabla de multiplicar en una tabla HTML
    echo "<table border='1'>";
    echo "<tr><td colspan='5'>Tabla de multiplicar del nùmero $n</td></tr>";
    echo "<tr>";
    for ($i = 1; $i <=25; $i++) {
        if (($i-1) % 5 == 0) echo "</tr>";
    }
    echo "</tr>";
    echo "</table>";
    ?>
    
</body>
</html>