<?php
session_start();

require_once("modelo.php");

/*
LOGIN
*/
if (isset($_REQUEST["login"])) {
    $email = $_REQUEST['email'];
    $password = $_REQUEST['contrasena'];

    $tecnico = validarTecnico($email, $password); // pasar también $password

    if ($tecnico != null) {
        $_SESSION['usuario'] = $tecnico['id_tecnico'];
        $_SESSION['nombre'] = $tecnico['nombre'];
        header("Location: tables.php");
        exit();
    } else {
        header("Location: login.php?error=Credenciales incorrectas");
        exit();
    }
}

/*
NUEVA INCIDENCIA
 */
if (isset($_REQUEST["nuevaIncidencia"])) {

    $titulo = $_REQUEST['titulo'];
    $descripcion = $_REQUEST['descripcion'];
    $tipo = $_REQUEST['tipo'];
    $prioridad = $_REQUEST['prioridad'];
    $id_tecnico = $_SESSION['usuario'];
    $fecha_creacion = date("Y-m-d H:i:s");
    $estado = "Pendiente";

    crearIncidencia($titulo, $descripcion, $tipo, $prioridad, $estado, $fecha_creacion, $id_tecnico);

    header("Location: dashboard.php?msg=creada");
}


/* 
MODIFICAR INCIDENCIA
 */
if (isset($_REQUEST["modificarIncidencia"])) {

    $id = $_REQUEST['id_incidencia'];
    $titulo = $_REQUEST['titulo'];
    $descripcion = $_REQUEST['descripcion'];
    $tipo = $_REQUEST['tipo'];
    $prioridad = $_REQUEST['prioridad'];
    $estado = $_REQUEST['estado'];
    $fecha_actualizacion = date("Y-m-d H:i:s");

    actualizarIncidencia($id, $titulo, $descripcion, $tipo, $prioridad, $estado, $fecha_actualizacion);

    header("Location: dashboard.php?msg=modificada");
}


/*
   ACCIONES POR URL (GET)
*/
$accion = $_REQUEST['accion'] ?? '';

switch($accion) {
    case 'login':
        // validar credenciales
        break;
    case 'logout':
        session_destroy();
        header("Location: login.php");
        break;
    case 'listar':
        if (!isset($_SESSION['usuario'])) {
            header("Location: login.php");
            exit();
        }

        $filtros = [
            'estado' => $_GET['estado'] ?? '',
            'tipo' => $_GET['tipo'] ?? '',
            'prioridad' => $_GET['prioridad'] ?? ''
        ];
        $incidencias = obtenerIncidenciasPorTecnico($_SESSION['usuario'], $filtros);
        // pasamos $incidencias a la vista
        include("tables.php");
        break;
    case 'crear':
        crearIncidencia($_POST); // pasar datos del formulario
        header("Location: tables.php?msg=creada");
        break;
    case 'obtener':
        $incidencia = obtenerIncidencia($_GET['id_incidencia']);
        include("verTables.php");
        break;
    case 'actualizar':
        actualizarIncidencia($_POST['id_incidencia'], $_POST);
        header("Location: tables.php?msg=modificada");
        break;
    case 'eliminar':
        eliminarIncidencia($_GET['id_incidencia']);
        header("Location: tables.php?msg=eliminada");
        break;
    case 'buscar':
        $incidencias = buscarIncidencias($_SESSION['usuario'], $_GET['termino']);
        include("tables.php");
        break;
}

?>
