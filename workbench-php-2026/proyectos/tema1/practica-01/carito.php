<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito</title>
</head>
<body>


<?php

$carrito = array(
array("id" => 1234, "nombre" => "PS4", "precio" => 349.95, "cant" => 2, "iva_r" => 0),
array("id" => 1235, "nombre" => "iPhone XS", "precio" => 1249.95, "cant" => 1, "iva_r" => 0),
array("id" => 1236, "nombre" => "Chocolate", "precio" => 9.95, "cant" => 5, "iva_r" => 1)
);

function subtotal($lina){
    //este funcion calcule el precio de cada linea de  pedido

    //sacar los valorespodman ps
    
    $precio = $lina["precio"];
    $cantidad = $lina["cant"];
    $iva = $lina["iva_r"];
    $subtotal = 0;

    //si iva_v = 0 sera 21% si iva_r = 1 sera 10%
    if($iva == 0){
        $iva = 0.21;
    }elseif($iva == 1){
        $iva = 0.10;
    }

    //multiplicando el precio por la cantidad y aplicar la iva
    //precio total con iva incluido
    $subtotal = ($precio*$cantidad) * (1+$iva);

    return $subtotal;

}

echo "<table>";

$encabezados = ["ID", "Producto", "Precio (€)", "Cantidad", "IVA (%)", "Subtotal (€)"];

echo "<thead><tr>";

foreach ($encabezados as $titulo) {
    echo "<th>$titulo</th>";
}

echo "</tr></thead>";


foreach ($carrito as $pro){
    echo "<tr>";
    echo "<td>" . $pro["id"] . "</td>";
    echo "<td>" . $pro["nombre"] . "</td>";
    echo "<td>" . number_format($pro["precio"], 2) . "</td>";
    echo "<td>" . $pro["cant"] . "</td>";

    // Mostrar IVA en porcentaje
    $iva_texto = ($pro["iva_r"] == 0) ? "21%" : "10%";
    echo "<td>" . $iva_texto . "</td>";

    // Calcular subtotal con la función
    echo "<td>" . number_format(subtotal($pro), 2) . "</td>";
    echo "</tr>";
}

"</table>";

?>
</body>
</html>