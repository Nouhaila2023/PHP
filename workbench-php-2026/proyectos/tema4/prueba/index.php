<?php

include "Finca.php";
include "FincaEcologica.php";


$finca1 = new Finca("FI_0001", "Finca La Ermita", "Lechugas");
$finca1->setIdentificador("FI_0002");


echo "Identificador: " . $finca1->getIdentificador() . "<br>";
echo "Tipo Cultivo: " . $finca1->getTipoCultivo() . "<br>";


// $finca1->temperatura = 25; No permitido crear propiedades nuevas en tiempo ejecución

//EL var_dump te pinta el tipo (Strion, int..) +  el valor
var_dump($finca1); 
echo "<br>";

$finca2 = $finca1; //Dos variables apuntan a la misma zona de memoria

$finca2->setNombre("Finca2");

echo "Nombre finca1: " . $finca1->getNombre() . "<br>";

echo "<br>";

$finca3 = clone $finca1; //Genera un nuevo objeto copiando los valores

$finca3->setNombre("Finca 3");

echo "Nombre finca1: " . $finca1->getNombre() . "<br>";
echo "Nombre finca3: " . $finca3->getNombre() . "<br>"; 

Finca::$cooperativa = "OTRA COOPERATIVA";

echo "Propiedad static finca3: " . Finca::$cooperativa . "<br>";
echo "Propiedad static finca1: " . Finca::$cooperativa . "<br>";


$finca4 = new FincaEcologica("FI_0005", "Finca Montilla", "Coles", "ISO-9001");

var_dump($finca4);

$finca4->regar();





