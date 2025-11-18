<?php
session_start();
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Siete y media</title>
  <style>
    body { font-family: Arial; text-align: center; background: #f2f2f2; }
    img { width: 100px; margin: 5px; }
    button { padding: 10px 20px; margin-top: 10px; }
  </style>
</head>
<body>

  <h1>Juego de las Siete y Media</h1>

  <form action="juego.php" method="post">
    <button type="submit" name="accion" value="sacar">Sacar carta</button>
    <button type="submit" name="accion" value="reiniciar">Reiniciar</button>
  </form>

  <h3>Tus cartas:</h3>

  <?php
  if (!isset($_SESSION['mano'])) {
    echo "<p>No has sacado ninguna carta.</p>";
  } else {
    foreach ($_SESSION['mano'] as $carta) {
      echo "<img src='cartas/{$carta['imagen']}' alt='{$carta['nombre']}'>";
    }
    echo "<h3>Total: {$_SESSION['total']}</h3>";
  }

  if (isset($_SESSION['estado'])) {
    echo "<h2>{$_SESSION['estado']}</h2>";
  }

  if (!isset($_SESSION['stats'])) {
    $_SESSION['stats'] = ['jugadas' => 0, 'ganadas' => 0, 'perdidas' => 0];
  }

  echo "<p>Partidas jugadas: {$_SESSION['stats']['jugadas']}</p>";
  echo "<p>Ganadas: {$_SESSION['stats']['ganadas']} | Perdidas: {$_SESSION['stats']['perdidas']}</p>";
  ?>

</body>
</html>
