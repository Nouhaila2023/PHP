<?php
session_start();
require_once "modelo.php";

$accion = $_REQUEST['accion'] ?? '';

switch ($accion) {

    /* -------------------------------------------------------------- LOGIN */
    case 'login':
        $email = $_REQUEST['email'] ?? '';
        $password = $_REQUEST['password'] ?? '';

        $tecnico = validarTecnico($email, $password);

        if ($tecnico) {
            $_SESSION['tecnico'] = $tecnico;
            header("Location: dashboard.php");
        } else {
            header("Location: login.php?error=credenciales");
        }
        break;

    /* -------------------------------------------------------------- LOGOUT */
    case 'logout':
        session_destroy();
        header("Location: login.php");
        break;

    /* -------------------------------------------------------------- LISTAR INCIDENCIAS */
    case 'listar':
        if (!isset($_SESSION['tecnico'])) header("Location: login.php");

        $id_tecnico = $_SESSION['tecnico']['id_tecnico'];
        $filtros = [
            "estado" => $_REQUEST['estado'] ?? '',
            "tipo" => $_REQUEST['tipo'] ?? '',
            "prioridad" => $_REQUEST['prioridad'] ?? ''
        ];
        $incidencias = obtenerIncidenciasPorTecnico($id_tecnico, $filtros);

        // Guardar en sesión para leer en dashboard.php
        $_SESSION['incidencias'] = $incidencias;
        header("Location: dashboard.php");
        break;

    /* -------------------------------------------------------------- CREAR INCIDENCIA */
    case 'crear':
        if (!isset($_SESSION['tecnico'])) header("Location: login.php");

        $datos = [
            "titulo" => $_REQUEST['titulo'],
            "descripcion" => $_REQUEST['descripcion'],
            "tipo" => $_REQUEST['tipo'],
            "prioridad" => $_REQUEST['prioridad'],
            "id_tecnico" => $_SESSION['tecnico']['id_tecnico']
        ];

        crearIncidencia($datos);
        header("Location: dashboard.php?msg=incidencia_creada");
        break;

    /* -------------------------------------------------------------- OBTENER UNA INCIDENCIA */
    case 'obtener':
        if (!isset($_SESSION['tecnico'])) header("Location: login.php");

        $id = $_REQUEST['id_incidencia'];
        $incidencia = obtenerIncidencia($id);

        $_SESSION['incidencia'] = $incidencia;
        header("Location: verIncidencia.php?id=$id");
        break;

    /* -------------------------------------------------------------- ACTUALIZAR INCIDENCIA */
    case 'actualizar':
        if (!isset($_SESSION['tecnico'])) header("Location: login.php");

        $id = $_REQUEST['id_incidencia'];
        $datos = [
            "titulo" => $_REQUEST['titulo'],
            "descripcion" => $_REQUEST['descripcion'],
            "tipo" => $_REQUEST['tipo'],
            "estado" => $_REQUEST['estado'],
            "prioridad" => $_REQUEST['prioridad']
        ];

        actualizarIncidencia($id, $datos);
        header("Location: verIncidencia.php?id=$id&msg=actualizada");
        break;

    /* -------------------------------------------------------------- ELIMINAR INCIDENCIA */
    case 'eliminar':
        if (!isset($_SESSION['tecnico'])) header("Location: login.php");

        $id = $_REQUEST['id_incidencia'];
        eliminarIncidencia($id);
        header("Location: dashboard.php?msg=eliminada");
        break;

    /* -------------------------------------------------------------- BUSCAR INCIDENCIAS */
    case 'buscar':
        if (!isset($_SESSION['tecnico'])) header("Location: login.php");

        $termino = $_REQUEST['termino'];
        $id_tecnico = $_SESSION['tecnico']['id_tecnico'];

        $resultados = buscarIncidencias($id_tecnico, $termino);
        $_SESSION['busqueda'] = $resultados;

        header("Location: dashboard.php?busqueda=" . urlencode($termino));
        break;

    /* -------------------------------------------------------------- ACCIÓN DESCONOCIDA */
    default:
        header("Location: login.php");
        break;
}
