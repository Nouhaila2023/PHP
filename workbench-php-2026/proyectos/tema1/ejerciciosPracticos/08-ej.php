
<?php

/*
8. Crea un generador aleatorio de apuesta de la Lotería Primitiva. Cada vez que
recargues la página aparecerá una combinación diferente.*/


$numero_al = array();

for($i = 0; $i < 7 ; $i++){
    $num = rand(1,49);
    if(in_array($num, $numero_al)){
        $i--;
    }else{
        $numero_al[] = $num;
    }
}

sort($numero_al);

//echo implode(" ", $numero_al);

echo "<h2>Tu apuesta de la Lotería Primitiva</h2>";
echo "<p>";
foreach ($numero_al as $n) {
    echo "<span style='display:inline-block;
                       background-color:#4CAF50;
                       color:white;
                       border-radius:50%;
                       width:40px;
                       height:40px;
                       line-height:40px;
                       text-align:center;
                       margin:5px;
                       font-weight:bold;'>$n</span>";}

?>