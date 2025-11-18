<?php
session_start();

//Formulario de Login
if (isset($_REQUEST["login"])) {
    //Habría que validar en BBDD que el password sea correcto

    //Grabamos en la sesión el email logueado
    $_SESSION['usuario'] = $_REQUEST['email'];

    //Meter en la sesión una tabla ficticia de clientes y otra de incidencias
    $_SESSION['clientes'] = array(
        array("nombre" => "Manuel Pérez", "dni" => "23492983-A", "email" => "manper@gmail.com"),
        array("nombre" => "Sonia Damaso", "dni" => "33444583-Z", "email" => "sondam@gmail.com"),
        array("nombre" => "Javier Saez", "dni" => "45457895-B", "email" => "javsae@gmail.com"),
    );
    $_SESSION['incidencias'] = array(
        array("id" => "B-00001", "dni" => "23492983-A", "descr" => "Muy lento Internet"),
        array("id" => "B-00002", "dni" => "33444583-Z", "descr" => "No enciende router"),
        array("id" => "B-00003", "dni" => "45457895-B", "descr" => "Internet no funciona"),
        array("id" => "B-00004", "dni" => "23492983-A", "descr" => "El porno no se ve"),
    );

    header("Location: clientes.php");
}

//Formulario de nuevo cliente
if (isset($_REQUEST["nuevoCliente"])) {
    $cliente = array("nombre" => $_REQUEST["nombre"], "dni" => $_REQUEST["dni"],  "email" =>  $_REQUEST["email"]);
    array_push($_SESSION['clientes'], $cliente);
    header("Location: clientes.php");
}

//Formulario de eliminar todos los clientes
if (isset($_REQUEST["eliminarClientes"])) {
    $_SESSION['clientes'] = array();
    header("Location: clientes.php");
}

//Formulario de nueva incidencia
if (isset($_REQUEST["nuevaIncidencia"])) {
    $incidencia = array("id" => $_REQUEST["id"], "dni" => $_REQUEST["dni"], "descr" => $_REQUEST["descr"]);
    array_push($_SESSION['incidencias'], $incidencia);
    header("Location: incidencias.php");
}

//Formulario de eliminar todas las incidencias
if (isset($_REQUEST["eliminarIncidencias"])) {
    $_SESSION['incidencias'] = array();
    header("Location: incidencias.php");
}


//Acciones por URL - GET
if (isset($_REQUEST['accion'])) {
    switch ($_REQUEST['accion']) {
        //Cerrar sesión y redirigir a login.php
        case 'cerrarsesion':
            session_destroy();
            header("Location: login.php");
            break;
        //Eliminar cliente
        case 'delCliente':
            //Eliminamos la posición indicada del array
            $posicion = $_REQUEST['posicion'];
            unset($_SESSION['clientes'][$posicion]);
            $_SESSION['clientes'] = array_values($_SESSION['clientes']); //Regenerar índices y no dejar huecos

            header("Location: clientes.php");
            break;
        //Eliminar incidencia
        case 'delIncidencia':
            //Eliminamos la posición indicada del array
            $posicion = $_REQUEST['posicion'];
            unset($_SESSION['incidencias'][$posicion]);
            $_SESSION['incidencias'] = array_values($_SESSION['incidencias']); //Regenerar índices y no dejar huecos

            header("Location: incidencias.php");
            break;
        //Ver incidencia en detalle
        case 'verIncidencia':
            $idIncidencia = $_REQUEST['id'];
            //Buscamos la incidencia por su ID en la sesión
            foreach ($_SESSION['incidencias'] as $incidencia) {
                if (strcmp($incidencia['id'], $idIncidencia) == 0) {
                    $dni = $incidencia['dni'];
                    $descr = $incidencia['descr'];
                }
            }

            header("Location: verIncidencia.php?id=" . $idIncidencia . "&dni=" . $dni . "&descr=" . $descr);

            break;

        //Ver cliente en detalle
        case 'verCliente':
            $dniCliente = $_REQUEST['dni'];
            //Buscamos el cliente por dni en la sesión
            foreach ($_SESSION['clientes'] as $cliente) {
                if (strcmp($cliente['dni'], $dniCliente) == 0) {
                    $nombre = $cliente['nombre'];
                    $email = $cliente['email'];
                }
            }

            header("Location: verCliente.php?dni=" . $dniCliente . "&nombre=" . $nombre . "&email=" . $email);

            break;

        //Generar informe de incidencias
        case 'generarInformeIncidencias':
            header("Location: informeIncidencias.php");
            break;

        default:
            # code...
            break;
    }
}
