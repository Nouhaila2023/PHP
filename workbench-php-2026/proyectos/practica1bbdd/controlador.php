<?php
session_start();

require_once("modelo.php");

//Formulario de Login
if (isset($_REQUEST["login"])) {
    $email = $_REQUEST['email'];
    $password = $_REQUEST['contrasena'];

    //Habría que validar en BBDD que el password sea correcto
    $password_hash = getPassword($email);
    if (isset($password_hash)) {
        //Chequear que sea válida
        if (password_verify($password, $password_hash)) {
            //Login ok
            //Grabamos en la sesión el email logueado
            $_SESSION['usuario'] = $email;
            header("Location: tables.php");
        } else {
            //Contraseña incorrecta
            header("Location: login.php?error=passwordincorrecto");
        }
    } else {
        //No existe ese email
        header("Location: login.php?error=emailnoencontrado");
    }
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

   