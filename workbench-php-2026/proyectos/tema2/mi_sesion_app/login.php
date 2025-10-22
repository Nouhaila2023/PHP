<?php
session_start(); // Inicia la sesión o la reanuda

// Simulación de autenticación (en un caso real, validarías contra una BD)
$usuario = "admin";
$clave = "1234";

// Si se envió el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $user = $_POST['usuario'];
    $pass = $_POST['clave'];

    if ($user === $usuario && $pass === $clave) {
        // Guardamos datos en la sesión
        $_SESSION['usuario'] = $user;
        $_SESSION['rol'] = "administrador";
        $_SESSION['inicio'] = time(); // Hora de inicio
        header("Location: perfil.php");
        exit();
    } else {
        $error = "Usuario o contraseña incorrectos";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Iniciar sesión</title>
</head>
<body>
    <h2>Login</h2>
    <?php if (!empty($error)) echo "<p style='color:red;'>$error</p>"; ?>

    <form method="post">
        Usuario: <input type="text" name="usuario" required><br><br>
        Clave: <input type="password" name="clave" required><br><br>
        <button type="submit">Entrar</button>
    </form>
</body>
</html>