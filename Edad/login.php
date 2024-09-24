<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .login-box {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            background-color: #f9f9f9;
        }
        .login-box h2 {
            text-align: center;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="login-box">
            <h2>Iniciar Sesión</h2>
            <form action="login.php" method="POST">
                <div class="form-group">
                    <label for="username">Usuario:</label>
                    <input type="text" id="username" name="username" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="password">Contraseña:</label>
                    <input type="password" id="password" name="password" class="form-control" required>
                </div>

                <button type="submit" class="btn btn-primary btn-block">Iniciar Sesión</button>
            </form>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>


<?php
session_start(); // Iniciar la sesión

// Conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mi_base_de_datos";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Verificar si el formulario fue enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = htmlspecialchars($_POST['username']);
    $pass = htmlspecialchars($_POST['password']);

    // Validar que los campos obligatorios no estén vacíos
    if (!empty($user) && !empty($pass)) {
        // Buscar al usuario en la base de datos
        $sql_check_user = "SELECT * FROM usuarios WHERE username = ?";
        $stmt_check_user = $conn->prepare($sql_check_user);
        $stmt_check_user->bind_param("s", $user);
        $stmt_check_user->execute();
        $result_check_user = $stmt_check_user->get_result();

        if ($result_check_user->num_rows > 0) {
            // Usuario encontrado, verificar contraseña
            $row = $result_check_user->fetch_assoc();
            if (password_verify($pass, $row['password'])) {
                // Inicio de sesión exitoso, guardar en sesión y redirigir
                $_SESSION['username'] = $row['username'];
                header("Location: edad.php");
                exit();
            } else {
                echo "Contraseña incorrecta.";
            }
        } else {
            echo "Usuario no encontrado.";
        }

        $stmt_check_user->close();
    } else {
        echo "Por favor, ingresa tu nombre de usuario y contraseña.";
    }
}

$conn->close();
?>
