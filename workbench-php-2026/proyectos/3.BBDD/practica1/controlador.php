<?php
session_start();

require_once("modelo.php");

//Formulario de Login
if (isset($_REQUEST["login"])) {
    $email = $_REQUEST['email'];
    $password = $_REQUEST['password'];

    //Habría que validar en BBDD que el password sea correcto
    $password_hash = getPassword($email);
    if (isset($password_hash)) {
        //Chequear que sea válida
        if (password_verify($password, $password_hash)) {
            //Login ok
            //Grabamos en la sesión el email logueado
            $_SESSION['usuario'] = $email;
            header("Location: clientes.php");
        } else {
            //Contraseña incorrecta
            header("Location: login.php?error=passwordincorrecto");
        }
    } else {
        //No existe ese email
        header("Location: login.php?error=emailnoencontrado");
    }
}

//Formulario de registro
if (isset($_REQUEST["registro"])) {
    $email = $_REQUEST['email'];
    $password = password_hash($_REQUEST['password'], PASSWORD_BCRYPT);
    $nombre = $_REQUEST['nombre'];
    $apellidos = $_REQUEST['apellidos'];
    $telefono = $_REQUEST['telefono'];
    $exito = insertUsuario($email, $password, $nombre, $apellidos, $telefono);
    if ($exito) {
        $_SESSION['usuario'] = $email;
        header("Location: clientes.php");
    } else {
        header("Location: registro.php?error=emailyaexiste");
    }
}

//Formulario de nuevo cliente
if (isset($_REQUEST["nuevoCliente"])) {
    insertCliente(
        $_REQUEST['nombre'],
        $_REQUEST['dni'],
        $_REQUEST['email'],
        $_REQUEST['direccion'],
        $_REQUEST['telefono']
    );
    header("Location: clientes.php");
}

//Formulario de eliminar todos los clientes
if (isset($_REQUEST["eliminarClientes"])) {
    deleteAllClientes();
    header("Location: clientes.php");
}

//Formulario de nueva incidencia
if (isset($_REQUEST["nuevaIncidencia"])) {
    $dni = $_REQUEST["dni"];
    $descr = $_REQUEST["descr"];
    $fecha_creacion = date("Y-m-d");
    $codigo = uniqid("INC_", true);
    $estado = "creada";
    insertIncidencia($codigo, $dni, $descr, $fecha_creacion, $estado);
    //codigo, fecha_creacion, estado
    header("Location: incidencias.php");
}

//Formulario de eliminar todas las incidencias
if (isset($_REQUEST["eliminarIncidencias"])) {
    deleteAllIncidencias();
    header("Location: incidencias.php");
}

//Formulario para modificar el estado de una incidencia
if (isset($_REQUEST["modificarIncidencia"])) {
    updateIncidencia($_REQUEST['id'], $_REQUEST['estado']);
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
            //Eliminamos el cliente con ese id de bbdd
            $idCliente = $_REQUEST['id'];
            deleteClienteById($idCliente);

            header("Location: clientes.php");
            break;
        //Eliminar incidencia
        case 'delIncidencia':
            //Eliminamos la posición indicada del array
            $id = $_REQUEST['id'];
            deleteIncidenciaById($id);

            header("Location: incidencias.php");
            break;
        //Ver incidencia en detalle
        case 'verIncidencia':
            $id = $_REQUEST['id'];
            header("Location: verIncidencia.php?id=" . $id);
            break;

        //Ver cliente en detalle
        case 'verCliente':
            $idCliente = $_REQUEST['id'];
            //Buscamos el cliente por id en la bbdd
            $cliente = getClienteById($idCliente);

            if ($cliente != null) {
                header("Location: verCliente.php?dni=" . $cliente['dni'] . "&nombre=" . $cliente['nombre'] . "&email=" . $cliente['email'] . "&direccion=" . $cliente['direccion'] . "&telefono=" . $cliente['telefono']);
            } else {
                header("Location: verCliente.php");
            }

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
