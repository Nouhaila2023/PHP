<?php
session_start();

// Función: crear el mazo
function crearMazo() {
  $palos = ['hearts', 'spades', 'diamonds', 'clubs'];
  $numeros = ['A', '2', '3', '4', '5', '6', '7', 'J', 'Q', 'K'];
  $mazo = [];

  foreach ($palos as $palo) {
    foreach ($numeros as $n) {
      $valor = in_array($n, ['A', 'J', 'Q', 'K']) ? 0.5 : intval($n);
      $mazo[] = [
        'nombre' => $n,
        'palo' => $palo,
        'valor' => $valor,
        'imagen' => "{$palo}_{$n}.svg"
      ];
    }
  }

  shuffle($mazo);
  return $mazo;
}

// Si no hay mazo creado o se reinicia
if (!isset($_SESSION['mazo']) || $_POST['accion'] === 'reiniciar') {
  $_SESSION['mazo'] = crearMazo();
  $_SESSION['mano'] = [];
  $_SESSION['total'] = 0;
  $_SESSION['estado'] = '';
}

// Acción de sacar carta
if ($_POST['accion'] === 'sacar' && $_SESSION['estado'] === '') {
  $carta = array_pop($_SESSION['mazo']); // saca la última carta
  $_SESSION['mano'][] = $carta;
  $_SESSION['total'] += $carta['valor'];

  if ($_SESSION['total'] == 7.5) {
    $_SESSION['estado'] = '¡Has ganado!';
    $_SESSION['stats']['jugadas']++;
    $_SESSION['stats']['ganadas']++;
  } elseif ($_SESSION['total'] > 7.5) {
    $_SESSION['estado'] = 'Has perdido 😞';
    $_SESSION['stats']['jugadas']++;
    $_SESSION['stats']['perdidas']++;
  }
}

header('Location: index.php');
exit;
?>
