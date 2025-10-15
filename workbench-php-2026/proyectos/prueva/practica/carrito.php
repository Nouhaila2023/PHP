<?php
require("./cabecera.php");
?>

<h1>Carrito</h1>

<?php

$carrito = array(
    array("id" => 1234, "nombre" => "PS4", "precio" => 349.95, "cant" => 2, "iva_r" => 0),
    array("id" => 1235, "nombre" => "iPhone XS", "precio" => 1249.95, "cant" => 1, "iva_r" => 0),
    array("id" => 1236, "nombre" => "Chocolate", "precio" => 9.95, "cant" => 5, "iva_r" => 1)
);

echo "<table class='table'>";
echo "<tr>";
foreach ($carrito[0] as $clave => $valor) {
    echo "<th>" . $clave . "</th>";
}
echo "</tr>";

foreach ($carrito as $linea) {
    echo "<tr>";
    foreach ($linea as $valor) {
        echo "<td>";
        echo $valor . " ";
        echo "</td>";
    }
    echo "</tr>";
}

echo "</table>";

?>


<?php
require("./pie.php");
?>