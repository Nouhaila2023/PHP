<?php
session_start();

// Verificar si hay sesión activa
if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit();
}

// Tiempo máximo de sesión (en segundos)
$tiempo_max = 300; // 5 minutos

if (time() - $_SESSION['inicio'] > $tiempo_max) {
    // Si ha pasado el tiempo, destruir sesión
    session_unset();
    session_destroy();
    header("Location: login.php?expirada=1");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Perfil de usuario</title>
</head>
<body>
    <h2>Bienvenido, <?php echo $_SESSION['usuario']; ?> 👋</h2>
    <p>Tu rol: <?php echo $_SESSION['rol']; ?></p>
    <p>Hora de inicio de sesión: <?php echo date("H:i:s", $_SESSION['inicio']); ?></p>

    <a href="protegido.php">Ir a sección protegida</a><br><br>
    <a href="logout.php">Cerrar sesión</a>
</body>
</html>
