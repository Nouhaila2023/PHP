<?php
session_start();

if (isset($_POST['login'])) {
    $_SESSION['usuario'] = $_POST['email'];

    // Datos simulados de usuarios
    $_SESSION['proyectos'] = array(
    array("id" => "001", "nombre" => "Sistema de Inventario", "fechaInicio" => "02/02/2020", "fechaFin" => "23/03/2020", "diasT" => "22", "porcentajeC" => "50", "importancia" => "2"),
    array("id" => "002", "nombre" => "Página Web Corporativa", "fechaInicio" => "03/03/2020", "fechaFin" => "24/04/2020", "diasT" => "22", "porcentajeC" => "55", "importancia" => "1"),
    array("id" => "003", "nombre" => "Aplicación Móvil de Ventas", "fechaInicio" => "04/04/2020", "fechaFin" => "25/05/2020", "diasT" => "22", "porcentajeC" => "40", "importancia" => "4"),
    array("id" => "004", "nombre" => "Sistema de Recursos Humanos", "fechaInicio" => "25/05/2020", "fechaFin" => "26/06/2020", "diasT" => "22", "porcentajeC" => "45", "importancia" => "3"),
    array("id" => "005", "nombre" => "Plataforma de E-Learning", "fechaInicio" => "26/06/2020", "fechaFin" => "27/07/2020", "diasT" => "22", "porcentajeC" => "75", "importancia" => "5")
);


    header("Location: tables.php");
}

//Formulario de nuevo cliente
if (isset($_REQUEST["nuevo"])) {

   $proyecto = array(
    "id" => $_REQUEST["id"],
    "nombre" => $_REQUEST["nombre"],
    "fechaInicio" => $_REQUEST["fechaInicio"],
    "fechaFin" => $_REQUEST["fechaFin"],
    "diasT" => $_REQUEST["diasT"],
    "porcentajeC" => $_REQUEST["porcentajeC"],
    "importancia" => $_REQUEST["importancia"]);

    array_push($_SESSION['proyectos'], $proyecto);
    header("Location: tables.php");

}

if (isset($_REQUEST["eliminarTodo"])) {
    $_SESSION['proyectos'] = array();
    header("Location: tables.php");
}


if (isset($_REQUEST['accion'])) {
    switch ($_REQUEST['accion']) {
        //Cerrar sesión y redirigir a login.php
        case 'cerrarsesion':
            session_destroy();
            header("Location: login.php");
            break;

         case 'delProycto':
            $posicion = $_REQUEST['posicion'];
            unset($_SESSION['proyectos'][$posicion]);
            $_SESSION['proyectos'] = array_values($_SESSION['proyectos']); //Regenerar índices y no dejar huecos

            header("Location: tables.php");
            break;    

        case 'verInformacion':
            $idP = $_REQUEST['id'];
        
            foreach ($_SESSION['proyectos'] as $proyecto) {
                if (strcmp($proyecto['id'], $idP) == 0) {
                    $nombre = $proyecto['nombre'];
                    $fechaInicio = $proyecto['fechaInicio'];
                    $fechaFin = $proyecto['fechaFin'];
                    $diasT = $proyecto['diasT'];
                    $porcentajeC = $proyecto['porcentajeC'];
                    $importancia = $proyecto['importancia'];
                }
            }

            header("Location: verTables.php?id=" . $idP . "&nombre=" . $nombre . "&fechaInicio=" . $fechaInicio . "&fechaFin=" . $fechaFin . "&diasT=" . $diasT . "&porcentajeC=" . $porcentajeC . "&importancia=" . $importancia);

            break;
        
        default:
            # code...
            break;
    }
}

   