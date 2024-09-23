<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Edad</title>
    <!-- Incluir Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .login-container {
            max-width: 400px;
            margin: 50px auto;
            padding: 20px;
            border: 1px solid #dee2e6;
            border-radius: 8px;
            background-color: white;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .result-image {
            max-width: 100%;
            margin-top: 20px;
        }
    </style> 
</head>
<body>
    <div class="login-container">
        <h2 class="text-center">Ingrese su Información</h2>

        <!-- Botón de Cerrar Sesión -->
        <form method="POST" action="" class="mt-4">
            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" name="nombre" id="nombre" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="edad">Edad:</label>
                <input type="number" name="edad" id="edad" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="color">Color Favorito:</label>
                <input type="text" name="color" id="color" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="sexo">Sexo:</label><br>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="sexo" id="hombre" value="hombre" required>
                    <label class="form-check-label" for="hombre">Hombre</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="sexo" id="mujer" value="mujer" required>
                    <label class="form-check-label" for="mujer">Mujer</label>
                </div>
            </div>

            <button type="submit" class="btn btn-primary btn-block">Enviar</button>
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nombre = $_POST['nombre'];
            $edad = $_POST['edad'];
            $color = $_POST['color'];
            $sexo = $_POST['sexo'];

            // Selección de imágenes basada en el sexo y la edad
            $imagen = "";
            if ($sexo == "hombre") {
                if ($edad < 18) {
                    $mensaje = "¡Hola $nombre!<br>Eres un bebé.";
                    $imagen = "imagenes/bebe.jpg"; // Imagen específica para bebés hombres                         
                } elseif ($edad <= 25) { // Edad entre 18 y 25
                    $mensaje = "¡Hola $nombre! Eres un joven hombre.";
                    $imagen = "imagenes/joven.jpg"; // Imagen específica para hombres jóvenes
                } elseif ($edad <= 50) { // Edad entre 26 y 60
                    $mensaje = "¡Hola $nombre! Eres un hombre adulto.";
                    $imagen = "imagenes/adulto.jpg"; // Imagen específica para adultos hombres
                } else { // Edad mayor a 60
                    $mensaje = "¡Hola $nombre! Eres un hombre mayor.";
                    $imagen = "imagenes/viejo_hombre.jpg"; // Imagen específica para hombres mayores
                }
                
            } elseif ($sexo == "mujer") {
                if ($edad < 18) {
                    $mensaje = "¡Hola $nombre! Eres una bebé.";
                    $imagen = "imagenes/bebe_niña.jpg"; // Imagen específica para bebés mujeres
                } elseif ($edad <= 25) { // Edad entre 18 y 25
                    $mensaje = "¡Hola $nombre! Eres una joven mujer.";
                    $imagen = "imagenes/joven_mujer.jpg"; // Imagen específica para mujeres jóvenes
                } elseif ($edad <= 50) { // Edad entre 26 y 60
                    $mensaje = "¡Hola $nombre! Eres una mujer adulta.";
                    $imagen = "imagenes/adulto_mujer.jpg"; // Imagen específica para adultas mujeres
                } else { // Edad mayor a 60
                    $mensaje = "¡Hola $nombre! Eres una mujer mayor.";
                    $imagen = "imagenes/viejo_mujer.jpg"; // Imagen específica para mujeres mayores
                }
            }
            
            // Mostrar el mensaje final
            echo "<div class='alert alert-info mt-4'>$mensaje <br>Tu color favorito es $color.</div>";
            echo "<img src='$imagen' alt='Imagen correspondiente a la edad y sexo' class='result-image'>";
        }
        ?>
    </div>

    <style>
        
    .custom-logout-btn {
        width: 150px; /* Ajusta el tamaño del botón aquí */
    }

    .text-center {
        text-align: center;
    }
    
    </style>

<div class="text-center mb-5">
    <a href="logout.php" class="btn btn-danger btn-sm custom-logout-btn">Cerrar Sesión</a>
</div>

    <!-- Incluir Bootstrap JS (opcional) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
