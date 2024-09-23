<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Usuario</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .register-box {
            max-width: 400px;
            margin: 50px auto;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            background-color: #f9f9f9;
        }
        .register-box h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        .button-group {
            display: flex;
            justify-content: space-between;
        }
        body {
            background-color: #f8f9fa;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="register-box">
            <h2>Registro de Usuario</h2>
            <form action="register.php" method="POST">
                <div class="form-group">
                    <label for="username">Usuario:</label>
                    <input type="text" id="username" name="username" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="email">Email (opcional):</label>
                    <input type="email" id="email" name="email" class="form-control">
                </div>

                <div class="form-group">
                    <label for="password">Contraseña:</label>
                    <input type="password" id="password" name="password" class="form-control" required>
                </div>

                <div class="button-group">
                    <input type="submit" value="Registrar" class="btn btn-primary">
                    <a href="login.php" class="btn btn-success">Iniciar Sesión</a>
                </div>
            </form>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>


<?php
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
    $email = htmlspecialchars($_POST['email']);
    $pass = htmlspecialchars($_POST['password']);

    // Validar que los campos obligatorios no estén vacíos
    if (!empty($user) && !empty($pass)) {
        // Verificar si el usuario ya existe
        $sql_check_user = "SELECT * FROM usuarios WHERE username = ?";
        $stmt_check_user = $conn->prepare($sql_check_user);
        $stmt_check_user->bind_param("s", $user);
        $stmt_check_user->execute();
        $result_check_user = $stmt_check_user->get_result();

        if ($result_check_user->num_rows > 0) {
            echo "El nombre de usuario ya está en uso.";
        } else {
            // Encriptar la contraseña
            $hashed_password = password_hash($pass, PASSWORD_DEFAULT);

            // Insertar usuario
            $sql_insert = "INSERT INTO usuarios (username, email, password) VALUES (?, ?, ?)";
            $stmt_insert = $conn->prepare($sql_insert);
            $stmt_insert->bind_param("sss", $user, $email, $hashed_password);

            if ($stmt_insert->execute()) {
                echo "¡Registro exitoso! Ahora puedes iniciar sesión.";
            } else {
                echo "Error al registrar el usuario.";
            }
            $stmt_insert->close();
        }
        $stmt_check_user->close();
    } else {
        echo "Completa todos los campos obligatorios.";
    }
}

$conn->close();
?>

