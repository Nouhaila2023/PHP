

<?php
/*4. Tenemos los coeficientes de una ecuación de 2º grado (ax2 + bx + c = 0) en tres
variables $a, $b y $c, muestra la ecuación y sus soluciones. Si no existen, debe
indicarse por pantalla.*/



$a = rand(0, 9);
$b = rand(0, 9);
$c = rand(0, 9);

echo "Ecuación: " . $a . "x² + " . $b . "x + " . $c . " = 0  <br>";

//los coeficientes de una ecuación de 2º grado (ax2 + bx + c = 0)
//D=b2−4ac
$discriminante = ($b * $b) - (4 * $a * $c);

/*Analizar los casos según el discriminante

Si D > 0 → hay dos soluciones reales diferentes.

Si D = 0 → hay una solución real doble (las dos raíces son iguales).

Si D < 0 → no existen soluciones reales (solo serían complejas, y si no te piden considerarlas, simplemente indicas que no hay soluciones reales).*/


if ($discriminante > 0) {
    $x1 = (-$b + sqrt($discriminante)) / (2 * $a);
    $x2 = (-$b - sqrt($discriminante)) / (2 * $a);
    echo "Soluciones reales y diferentes: x1 = " . $x1 . ", x2 = " . $x2;
} elseif ($discriminante == 0) {
    $x = -$b / (2 * $a);
    echo "Solución real y única: x = " . $x;
} elseif ($a == 0) {
    echo "No es una ecuación de 2º grado.";
} else { //discriminante < 0
    echo "No existen soluciones reales.";
}

?>