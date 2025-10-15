<?php
require("./cabecera.php");
?>


<?php

    $libros = array(
    // NOVELA HISTÓRICA
    "libro1" => array(
        "url" => "./img/img01.jpg",
        "título" => "La Perla del Duque",
        "autor" => "Petri Tamminen",
        "isbn" => "9798852191663",
        "categoria" => "Romántica histórica",
        "editorial" => "Autoedición",
        "descripcion" => "Romance y misterio en la España del siglo XVIII.",
        "precio" => "15,55€"
    ),
    "libro2" => array(
        "url" => "./img/img02.jpg",
        "título" => "Sonrisa en Florencia",
        "autor" => "Carlos Sabarich",
        "isbn" => "9781523741823",
        "categoria" => "Romántica histórica",
        "editorial" => "Autoedición",
        "descripcion" => "Una historia de amor y secretos en Florencia.",
        "precio" => "15,00€"
    ),
    "libro3" => array(
        "url" => "./img/img03.jpg",
        "título" => "Corazón de Oro",
        "autor" => "Luz Gabás",
        "isbn" => "9788408200873",
        "categoria" => "Romántica histórica",
        "editorial" => "Planeta",
        "descripcion" => "Amor y sacrificio en tiempos de guerra.",
        "precio" => "18,00€"
    ),
    "libro4" => array(
        "url" => "./img/img04.jpg",
        "título" => "El Duque y Yo",
        "autor" => "Julia Quinn",
        "isbn" => "9788401016943",
        "categoria" => "Romántica histórica",
        "editorial" => "Espasa",
        "descripcion" => "Humor y romance en la alta sociedad londinense.",
        "precio" => "10,00€"
    ),
    // NOVELA NEGRA
    "libro5" => array(
        "url" => "./img/img05.jpg",
        "título" => "La Asistenta",
        "autor" => "Ruth Ware",
        "isbn" => "9788435063654",
        "categoria" => "Novela negra romántica",
        "editorial" => "Salamandra",
        "descripcion" => "Thriller psicológico con misterio y romance.",
        "precio" => "20,00€"
    ),
    "libro6" => array(
        "url" => "./img/img06.jpg",
        "título" => "El Club del Crimen de los Jueves",
        "autor" => "Richard Osman",
        "isbn" => "9788435067751",
        "categoria" => "Novela negra romántica",
        "editorial" => "Salamandra",
        "descripcion" => "Misterio y amistad con un toque romántico.",
        "precio" => "18,00€"
    ),
    "libro7" => array(
        "url" => "./img/img07.jpg",
        "título" => "La Chica del Tren",
        "autor" => "Paula Hawkins",
        "isbn" => "9788408133422",
        "categoria" => "Novela negra romántica",
        "editorial" => "Planeta",
        "descripcion" => "Suspense y obsesión en un thriller atrapante.",
        "precio" => "15,00€"
    ),
    "libro8" => array(
        "url" => "./img/img08.jpg",
        "título" => "La Novela Negra",
        "autor" => "Juan Montero Aroca",
        "isbn" => "9788418155079",
        "categoria" => "Ensayo sobre novela negra",
        "editorial" => "Plural",
        "descripcion" => "Análisis del género negro con toques románticos.",
        "precio" => "25,00€"
    )
);
    
echo "<table border='1' align='center' cellspacing='30' cellpadding='30'>";

echo "<tr>";
//echo "<td colspan='4'; border='0' >Novela Histórica</td>";
echo "<td colspan='4' style='border:none; color:purple;font-size:24px;'><h3>Novela Negra</h3></td>";

echo "</tr>";

echo "<tr>";
for($i=1;$i<=4;$i++){
    $lib = $libros["libro$i"];
    echo "<td align='center'>";
    echo "<img src='" . $lib["url"] . "' width='200'>";
    echo "<h4>" . $lib["título"] . "</h4>";
    echo "<p>" . $lib["autor"] . "</p>";
    echo "<p>" . $lib["descripcion"] . "</p>";
    echo "<strong style='color: #ff0000'>" . $lib["precio"] . "</strong>";
    echo '</td>';
}
echo "</tr>";

echo "<tr>";
echo "<td colspan='4' style='border:none; color:purple;font-size:24px;'><h3>Novela Negra</h3></td>";

echo "</tr>";

echo "<tr>";
for($i=5;$i<=8;$i++){
    $lib = $libros["libro$i"];
    echo "<td align='center'>";
    echo "<img src='" . $lib["url"] . "' width='200'>";
    echo "<h4>" . $lib["título"] . "</h4>";
    echo "<p>" . $lib["autor"] . "</p>";
    echo "<p>" . $lib["descripcion"] . "</p>";
    echo "<strong style='color: #ff0000'>" . $lib["precio"] . "</strong>";
    echo '</td>';
}
echo "</tr>";

echo "</table>";


?>
    

<?php
require("./pie.php");
?>