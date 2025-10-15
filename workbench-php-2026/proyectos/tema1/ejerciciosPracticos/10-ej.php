<?php
/* 10. Rellena un array de 10 números enteros, con los 10 primeros números naturales.
Calcula la media de los que están en posiciones pares y muestra los impares por
pantalla.
 */


$arrays = array();
$suma = 0;
$contador = 0;

for($i = 0; $i < 10; $i++){
    $arrays[] = $i;
}

for($i=0; $i<count($arrays); $i++){
    if($i % 2 == 0){
        $suma += $arrays[$i];
        $contador++;
    }else{
        echo "Numero en posicion impar: " . $arrays[$i] . "<br>";
    }
}

$media = $suma /$contador;

echo "$suma / $contador = $media";
echo "<br>La media de los numero en pisicion pares es: $media";






?>