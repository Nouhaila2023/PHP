


<?php
/*1. Partiendo de 2 variables $primera y $segunda con valores aleatorios, hacer una
página PHP que calcule y muestre por pantalla:
- la diferencia de $primera menos $segunda
- la división de $primera entre $segunda
Añade un comentario que explique la función de generar números aleatorios.*/


// La función rand() genera un número entero aleatorio entre los valores especificados (inclusive).
$primera = rand(1, 10);
$segunda = rand(1, 10);

$diferencia = $primera - $segunda;
$division = $primera / $segunda;

echo "La deferencia entre $primera y $segunda es $diferencia  <br>";
echo "La division entre $primera y $segunda es $division";
?>

