<?php
$numero = 123.4567;
$numero_formateado = number_format($numero, 2, ',', '.'); // El 2 es para dos decimales
echo $numero_formateado; // Salida: 123,46 (el número se redondea)

echo "<br>";

$otro_numero = 12345.678;
echo number_format($otro_numero, 2, ',', '.'); // Salida: 12.345,68

/*
foreach ($libros as $libro) {
  echo "<div class='libro'>";
  echo "<img src='" . $libro["url"] . "' alt='Portada del libro'>";
  echo "<div class='info'>";
  echo "<h3>" . $libro["título"] . "</h3>";
  echo "<p><strong>Autor:</strong> " . $libro["autor"] . "</p>";
  echo "<p><strong>Precio:</strong> " . $libro["precio"] . " €</p>";
  echo "</div>";
  echo "</div>";
}*/
?>