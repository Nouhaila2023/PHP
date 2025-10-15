<?php
/*7. Hacer una página PHP que para un array de 5 elementos muestre por pantalla la
tabla de multiplicar de dichos elementos (del 1 al 10) (for o while)*/

$numero = array();

for($i = 0; $i < 5 ; $i++){
    $numero[] = rand(1,9);
}


foreach($numero as $num){
    echo "<h3>Tabla de multiplicar de $num</h3>";
    for($j = 1; $j <= 10; $j++){
        $numero[] = $num;
        $multiplicar = $num * $j;
        echo "$num x $j = $multiplicar<br>";
    }
    echo "<br>";
}



?>

