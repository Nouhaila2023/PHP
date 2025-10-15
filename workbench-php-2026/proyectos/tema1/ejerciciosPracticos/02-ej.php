<?php
/*2. Tenemos dos cadenas $cadena1 con valor "hola a todo el mundo" y $cadena2 con
valor "mi nombre es <nombre y apellidos del alumno/a>". Se pide:
- $cadena3 contendrá el valor de la concatenación de $cadena1 y $cadena2,
mostrar por pantalla el contenido de $cadena3
- $cadena1 contendrá el resultado de la concatenación de sí misma con
$cadena2, mostrar por pantalla el contenido de $cadena1 */

$nmbre = "Nouhaila";
$appellido = "El Haloui";


$cadena1 = "hola a todo el  undo";
$cadena2 = "mi nombre es  $nmbre  $appellido"; 

$cadena3 = $cadena1 . " " . $cadena2;


echo $cadena3;

echo "<br>";

$cadena1 = $cadena1 . " " . $cadena2;
echo $cadena1;
?>