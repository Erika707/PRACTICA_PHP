<?php
session_start();

// Destruir la sesión
session_unset();
session_destroy();

// Redirigir al formulario de login
header("Location: register.php");
exit();
?>
