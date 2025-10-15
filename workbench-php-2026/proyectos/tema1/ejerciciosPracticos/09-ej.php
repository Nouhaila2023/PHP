<?php

/*9. Realiza un programa que pinte 5 círculos en horizontal cada uno de un color
diferente aleatorio.
Puedes usar la función SVG circle para dibujar los círculos. */

function colorAleatorio(){
    $circolo1 = rand(0,255);
    $circolo2 = rand(0,255);
    $circolo3 = rand(0,255);
    
    return "rgb(" . $circolo1 . "," . $circolo2 . "," . $circolo3 . ")";


}

for($i = 0; $i < 5; $i++){
    echo '<svg height="100" width="100" xmlns="http://www.w3.org/2000/svg">
                <circle r="45" cx="50" cy="50" fill="' . colorAleatorio() . '" /></svg> ';
}


?>