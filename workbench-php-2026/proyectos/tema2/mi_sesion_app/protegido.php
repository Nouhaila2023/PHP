<?php
session_start();

if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Zona protegida</title>
</head>
<body>
    <h2>Contenido protegido 🔒</h2>
    <p>Solo puedes ver esto si estás logueado.</p>
    <p>Usuario actual: <?php echo $_SESSION['usuario']; ?></p>
    <a href="perfil.php">Volver al perfil</a>
</body>
</html>
