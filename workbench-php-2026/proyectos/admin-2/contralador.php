<?php
session_start();

if (isset($_REQUEST["login"])) {
    // Guardar nombre del usuario logueado
    $_SESSION['usuario'] = $_REQUEST['email'];

    // Simular datos de usuarios
    $_SESSION['usuarios'] = array(
        array("id" => "001", "nombre" => "Juan", "fechaInicio" => "02/02/2020", "fechaFin" => "23/03/2020", "diasT" => "22", "porcentajeC" => "50%", "importancia" => "2"),
        array("id" => "002", "nombre" => "Pedro", "fechaInicio" => "03/03/2020", "fechaFin" => "24/04/2020", "diasT" => "22", "porcentajeC" => "55%", "importancia" => "1"),
        array("id" => "003", "nombre" => "Ana", "fechaInicio" => "04/04/2020", "fechaFin" => "25/05/2020", "diasT" => "22", "porcentajeC" => "40%", "importancia" => "4"),
        array("id" => "004", "nombre" => "Pepe", "fechaInicio" => "25/05/2020", "fechaFin" => "26/06/2020", "diasT" => "22", "porcentajeC" => "45%", "importancia" => "3"),
        array("id" => "005", "nombre" => "Pepa", "fechaInicio" => "26/06/2020", "fechaFin" => "27/07/2020", "diasT" => "22", "porcentajeC" => "75%", "importancia" => "5")
    );

    header("Location: tables.php");
   
}
?>
