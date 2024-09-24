<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Evaluación de Conducta</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
            text-align: center;
        }
        .icon-container {
            display: flex;
            justify-content: center;
            margin: 20px 0;
        }
        .icon {
            margin: 0 15px;
            cursor: pointer;
            transition: transform 0.2s;
        }
        .icon:hover {
            transform: scale(1.1);
        }
        .selected {
            border: 2px solid #007bff;
            border-radius: 10px;
            padding: 5px;
        }
        .result {
            background-color: #FFA500; /* Color naranja */
            color: white;
            padding: 15px;
            border-radius: 10px;
            margin-top: 20px;
            display: inline-block; /* Para centrar el cuadro */
        }
        .reset-button {
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #007bff; /* Color del botón */
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .reset-button:hover {
            background-color: #0056b3; /* Color al pasar el mouse */
        }
        .reset-button {
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #007bff; /* Color del botón */
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .reset-button:hover {
            background-color: #0056b3; /* Color al pasar el mouse */
        }
        /* Estilo para el botón de evaluación en verde */
        .submit-button {
            padding: 10px 20px;
            background-color: #28a745; /* Verde */
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .submit-button:hover {
            background-color: #218838; /* Verde más oscuro al pasar el mouse */
        }
    </style>
</head>
<body>

<h1>Evaluación del día <?php echo date('d \d\e F \d\e Y'); ?></h1>

<h2>Conducta</h2>
<!-- Formulario para ingresar el nombre y seleccionar la conducta -->
<form method="POST" id="conductaForm">
    <label for="nombre">Nombre del niño:</label>
    <input type="text" id="nombre" name="nombre" required>
    <br><br>

    <div class="icon-container">
        <div class="icon" onclick="selectConducta('bien')">
            <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-emoji-smile-fill" viewBox="0 0 16 16"> 
                <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16M7 6.5C7 7.328 6.552 8 6 8s-1-.672-1-1.5S5.448 5 6 5s1 .672 1 1.5M4.285 9.567a.5.5 0 0 1 .683.183A3.5 3.5 0 0 0 8 11.5a3.5 3.5 0 0 0 3.032-1.75.5.5 0 1 1 .866.5A4.5 4.5 0 0 1 8 12.5a4.5 4.5 0 0 1-3.898-2.25.5.5 0 0 1 .183-.683M10 8c-.552 0-1-.672-1-1.5S9.448 5 10 5s1 .672 1 1.5S10.552 8 10 8"/>
            </svg>
            <p>Bien</p>
        </div>
        <div class="icon" onclick="selectConducta('regular')">
            <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-emoji-neutral-fill" viewBox="0 0 16 16">
                <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16M7 6.5C7 7.328 6.552 8 6 8s-1-.672-1-1.5S5.448 5 6 5s1 .672 1 1.5m-3 4a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5M10 8c-.552 0-1-.672-1-1.5S9.448 5 10 5s1 .672 1 1.5S10.552 8 10 8"/>
            </svg>
            <p>Regular</p>
        </div>
        <div class="icon" onclick="selectConducta('mal')">
            <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-emoji-frown-fill" viewBox="0 0 16 16">
                <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16M7 6.5C7 7.328 6.552 8 6 8s-1-.672-1-1.5S5.448 5 6 5s1 .672 1 1.5m-2.715 5.933a.5.5 0 0 1-.183-.683A4.5 4.5 0 0 1 8 9.5a4.5 4.5 0 0 1 3.898 2.25.5.5 0 0 1-.866.5A3.5 3.5 0 0 0 8 10.5a3.5 3.5 0 0 0-3.032 1.75.5.5 0 0 1-.683.183M10 8c-.552 0-1-.672-1-1.5S9.448 5 10 5s1 .672 1 1.5S10.552 8 10 8"/>
            </svg>
            <p>Mal</p>
        </div>
    </div>

    <h2>Comidas</h2>
    
    <label for="desayuno" style="color: blue;">Desayuno:</label>
    <input type="radio" id="desayuno_si" name="desayuno" value="si" required>
    <label for="desayuno_si">Sí</label>
    <input type="radio" id="desayuno_no" name="desayuno" value="no" required>
    <label for="desayuno_no">No</label>
    <input type="radio" id="desayuno_regular" name="desayuno" value="regular" required>
    <label for="desayuno_regular">Regular</label>
    <div></div><br>

    <label for="comida" style="color: blue;">Comida:</label>
    <input type="radio" id="comida_si" name="comida" value="si" required>
    <label for="comida_si">Sí</label>
    <input type="radio" id="comida_no" name="comida" value="no" required>
    <label for="comida_no">No</label>
    <input type="radio" id="comida_regular" name="comida" value="regular" required>
    <label for="comida_regular">Regular</label>
    <div></div><br>

    <label for="cena" style="color: blue;">Cena:</label>
    <input type="radio" id="cena_si" name="cena" value="si" required>
    <label for="cena_si">Sí</label>
    <input type="radio" id="desayuno_no" name="cena" value="no" required>
    <label for="cena_no">No</label>
    <input type="radio" id="cena_regular" name="cena" value="regular" required>
    <label for="cena_regular">Regular</label>
    <div></div><br>

    <h2>Trabajo</h2>

    <label for="trabajo" style="color:purple;">Trabajo en el salòn:</label>
    <input type="radio" id="trabajo_si" name="trabajo" value="si" require>
    <label for="trabajo_si">Sì</label>
    <input type="radio" id="trabajo_no" name="trabajo" value="no" require>
    <label for="trabajo_no">No</label>

    <input type="hidden" id="conducta" name="conducta" required>
    <br><br>

    <input type="submit" value="Evaluar" class="submit-button">
</form>

<?php
// Validar si se han enviado datos por el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = strtoupper(htmlspecialchars($_POST["nombre"])); // Convertir a mayúsculas y escapar para evitar inyecciones
    $conducta = $_POST["conducta"];
    $comida = $_POST["comida"];
    $desayuno = $_POST["desayuno"];
    $cena = $_POST["cena"];
    $trabajo= $_POST["trabajo"];

    // Evaluar la conducta y generar el mensaje correspondiente
    if ($conducta == "bien") {
        echo "<div class='result'>$nombre se portó bien, $comida comio muy bien, $trabajo trabajo bien, por lo que merece un premio.</div>";
    } elseif ($conducta == "mal") {
        echo "<div class='result'>$nombre se portó mal, $comida comio muy bien, $trabajo trabajo, por lo que debe mejorar.</div>";
    } elseif ($conducta == "regular") {
        echo "<div class='result'>$nombre se portó regular, $comida comio muy poco, $trabajo trabajo regularmente, por lo que debe mejorar.</div>";
    }
}
?>

<!-- Botón para reiniciar -->
<br>
<button class="reset-button" onclick="resetForm()">Reiniciar y Evaluar Nuevamente</button>

<script>
    function selectConducta(conducta) {
        // Establecer el valor del campo oculto
        document.getElementById('conducta').value = conducta;

        // Eliminar la clase 'selected' de todos los íconos
        const icons = document.querySelectorAll('.icon');
        icons.forEach(icon => icon.classList.remove('selected'));

        // Añadir la clase 'selected' al ícono seleccionado
        const selectedIcon = event.currentTarget;
        selectedIcon.classList.add('selected');
    }

    function resetForm() {
        // Reiniciar el formulario
        document.getElementById('conductaForm').reset();
        
        // Limpiar el campo oculto
        document.getElementById('conducta').value = '';

        // Eliminar la clase 'selected' de todos los íconos
        const icons = document.querySelectorAll('.icon');
        icons.forEach(icon => icon.classList.remove('selected'));

        // Limpiar el resultado
        const resultDiv = document.querySelector('.result');
        if (resultDiv) {
            resultDiv.parentNode.removeChild(resultDiv);
        }
    }
</script>

</body>
</html>
