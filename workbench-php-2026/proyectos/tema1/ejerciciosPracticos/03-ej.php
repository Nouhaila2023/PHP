

<?php
/*Tenemos el radio de un circulo almacenado en la variable $radio obtenida de
forma aleatoria, calcular y mostrar por pantalla el volumen de una esfera de ese
radio*/


// La función rand() genera un número entero aleatorio entre los valores especificados (inclusive).
$radio = rand(1, 10);
// Volumen de la esfera = (4/3) * π * r^3
$volumen = (4/3) * pi() * pow($radio, 3);
$resultado_formateado = number_format($volumen, 2, ',', '.'); // Formatear el número con 2 decimales y coma como separador decimal
echo "El volumen de la esfera con radio $radio es: $resultado_formateado";
?>