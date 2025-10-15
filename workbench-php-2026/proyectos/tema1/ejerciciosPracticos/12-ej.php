<?php
$palabras = array(
    "hola" => "hello",
    "adiós" => "goodbye",
    "gracias" => "thank you",
    "por favor" => "please",
    "mañana" => "tomorrow",
    "ayer" => "yesterday",
    "comida" => "food",
    "agua" => "water",
    "cielo" => "sky",
    "perro" => "dog",
    "gato" => "cat",
    "libro" => "book",
    "escuela" => "school",
    "familia" => "family",
    "coche" => "car",
    "casa" => "house",
    "trabajo" => "work",
    "amigo" => "friend",
    "feliz" => "happy",
    "amor" => "love"
);



foreach($palabras as $espanol => $ingles){
    // Puedes agregar aquí el código que desees para cada palabra
    // Por ejemplo, mostrar la traducción:
    echo "$espanol => $ingles<br>";
}


echo "</table>";

echo "----------------------------------------------";

$pla = "trabajo";

if(array_key_exists($pla, $palabras)){
    echo "la traduccion de " . $pla . " es " . $palabras[$pla];
}else{
    echo "Palabra no existe";
}
    











?>