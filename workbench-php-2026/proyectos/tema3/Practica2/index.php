<?php
session_start();

// === FUNCIÓN PARA CREAR MAZO CON TUS IMÁGENES ===
function crearMazo() {
    // 4 palos x 10 cartas (A,2,3,4,5,6,7,J,Q,K)
    $valores = ['A','2','3','4','5','6','7','J','Q','K'];
    $mazo = [];
    $contador = 1;

    for ($palo = 1; $palo <= 4; $palo++) {
        foreach ($valores as $carta) {
            $valor = in_array($carta, ['A','J','Q','K']) ? 0.5 : intval($carta);
            $mazo[] = [
                'nombre' => $carta,
                'valor' => $valor,
                'imagen' => "c{$contador}.svg" // tus nombres de archivo
            ];
            $contador++;
        }
    }

    shuffle($mazo); // barajar
    return $mazo;
}

// === INICIALIZACIÓN DE SESIÓN ===
if (!isset($_SESSION['mazo'])) {
    $_SESSION['mazo'] = crearMazo();
    $_SESSION['mano'] = [];
    $_SESSION['total'] = 0;
    $_SESSION['estado'] = '';
    $_SESSION['stats'] = ['jugadas'=>0,'ganadas'=>0,'perdidas'=>0];
}

// === ACCIONES ===
if (isset($_GET['accion'])) {
    $accion = $_GET['accion'];

    if ($accion === 'sacar' && $_SESSION['estado'] === '') {
        $carta = array_pop($_SESSION['mazo']);
        $_SESSION['mano'][] = $carta;
        $_SESSION['total'] += $carta['valor'];

        if ($_SESSION['total'] == 7.5) {
            $_SESSION['estado'] = '¡Has ganado 🎉!';
            $_SESSION['stats']['jugadas']++;
            $_SESSION['stats']['ganadas']++;
        } elseif ($_SESSION['total'] > 7.5) {
            $_SESSION['estado'] = 'Has perdido 😞';
            $_SESSION['stats']['jugadas']++;
            $_SESSION['stats']['perdidas']++;
        }
    }

    if ($accion === 'reiniciar') {
        $_SESSION['mazo'] = crearMazo();
        $_SESSION['mano'] = [];
        $_SESSION['total'] = 0;
        $_SESSION['estado'] = '';
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Siete y media</title>
<style>
body {
    font-family: Arial, sans-serif;
    text-align: center;
    background: #f2f2f2;
}
h1 { color: #333; }
.cartas {
    margin-top: 20px;
}
img {
    width: 100px;
    margin: 5px;
    vertical-align: middle;
}
button {
    margin-top: 15px;
    padding: 10px 20px;
    cursor: pointer;
}
p, h3 {
    font-size: 18px;
}
</style>
</head>
<body>

<h1>Siete y media</h1>
<p>Haz clic en el dorso de la carta para pedir otra:</p>

<div class="cartas">
    <!-- Carta boca abajo -->
    <?php if ($_SESSION['estado'] === ''): ?>
        <a href="?accion=sacar">
            <img src="cartas/reverso.svg" alt="Carta oculta">
        </a>
    <?php else: ?>
        <img src="cartas/reverso.svg" alt="Carta oculta" style="opacity:0.3;">
    <?php endif; ?>

    <!-- Cartas descubiertas -->
    <?php
    foreach ($_SESSION['mano'] as $carta) {
        echo "<img src='cartas/{$carta['imagen']}' alt='{$carta['nombre']}'>";
    }
    ?>
</div>

<h3>Total: <?= $_SESSION['total'] ?></h3>

<?php if ($_SESSION['estado'] !== ''): ?>
    <h2><?= $_SESSION['estado'] ?></h2>
<?php endif; ?>

<!-- Botón reiniciar -->
<form method="get">
    <button type="submit" name="accion" value="reiniciar">Reiniciar</button>
</form>

<hr>

<!-- Estadísticas -->
<p>Partidas jugadas: <?= $_SESSION['stats']['jugadas'] ?></p>
<p>Ganadas: <?= $_SESSION['stats']['ganadas'] ?> | Perdidas: <?= $_SESSION['stats']['perdidas'] ?></p>

</body>
</html>
