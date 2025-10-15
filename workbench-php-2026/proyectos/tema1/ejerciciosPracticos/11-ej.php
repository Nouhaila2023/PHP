<?php

/*11. Crea un array 7x7 con valores numéricos aleatorios excepto las diagonales que
deben ser 1. A continuación muestra el array y después genera un vector que
contenga la suma de cada fila y otro con la suma de cada columna.*/

function pintar($num){
    for($i=0;$i<7;$i++){
        for($j=0;$j<7;$j++){
            echo $num[$i][$j] . " ";
        }
        echo "<br>";
    }

}



$matriz = array();

  for($i=0;$i<7;$i++){
        for($j=0;$j<7;$j++){
            if(($i ==$j) || ($i==7-1-$j)){
                $matriz[$i][$j] = 1;
            }else{
                $matriz[$i][$j] = rand(10,99);
            }


        }
       
    }

pintar($matriz);    



?>