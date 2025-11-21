<?php

function conexionDB()
{
    try {
        $dsn = "mysql:host=mariadb;port=3306;dbname=practica1";
        $conexion = new PDO($dsn, "usuario", "usuario");
        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }

    return $conexion;
}


function getIncidencia()
{
    //Conectar a BD
    $conexion = conexionDB();
    $stmt = $conexion->prepare("SELECT * FROM incidencia");
    $stmt->execute();
    $clientes = $stmt->fetchAll(PDO::FETCH_ASSOC); //Array asociativo
    return $clientes;
}

/**
 * MÉTODOS PARA TÉCNICOS / LOGIN -------------------------------------------
 */
function validarTecnico($email, $password)
{
    $conexion = conexionDB();
    $stmt = $conexion->prepare("SELECT * FROM tecnico WHERE email=:email");
    $stmt->bindParam(":email", $email);
    $stmt->execute();
    $tecnico = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($tecnico && password_verify($password, $tecnico['password'])) {
        return $tecnico;
    } else {
        return null;
    }
}

/**
 * MÉTODOS PARA INCIDENCIAS -----------------------------------------------
 */


function crearIncidencia($datos)
{
    $conexion = conexionDB();
    $stmt = $conexion->prepare(
        "INSERT INTO incidencia (titulo, descripcion, tipo, prioridad, id_tecnico, estado, fecha_creacion) 
         VALUES (:titulo, :descripcion, :tipo, :prioridad, :id_tecnico, :estado, :fecha_creacion)"
    );
    $fecha = date("Y-m-d H:i:s");
    $estado = $datos['estado'] ?? 'Pendiente';
    $stmt->bindParam(":titulo", $datos['titulo']);
    $stmt->bindParam(":descripcion", $datos['descripcion']);
    $stmt->bindParam(":tipo", $datos['tipo']);
    $stmt->bindParam(":prioridad", $datos['prioridad']);
    $stmt->bindParam(":id_tecnico", $datos['id_tecnico']);
    $stmt->bindParam(":estado", $estado);
    $stmt->bindParam(":fecha_creacion", $fecha);
    return $stmt->execute();
}


function obtenerIncidencia($id_incidencia)
{
    $conexion = conexionDB();
    $stmt = $conexion->prepare("SELECT * FROM incidencia WHERE id_incidencia=:id_incidencia");
    $stmt->bindParam(":id_incidencia", $id_incidencia);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function actualizarIncidencia($id_incidencia, $datos)
{
    $conexion = conexionDB();
    $stmt = $conexion->prepare("UPDATE incidencia SET titulo=:titulo, descripcion=:descripcion, tipo=:tipo, estado=:estado, prioridad=:prioridad WHERE id_incidencia=:id_incidencia");
    $stmt->bindParam(":titulo", $datos['titulo']);
    $stmt->bindParam(":descripcion", $datos['descripcion']);
    $stmt->bindParam(":tipo", $datos['tipo']);
    $stmt->bindParam(":estado", $datos['estado']);
    $stmt->bindParam(":prioridad", $datos['prioridad']);
    $stmt->bindParam(":id_incidencia", $id_incidencia);
    return $stmt->execute();
}

function eliminarIncidencia($id_incidencia)
{
    $conexion = conexionDB();
    $stmt = $conexion->prepare("DELETE FROM incidencia WHERE id_incidencia=:id_incidencia");
    $stmt->bindParam(":id_incidencia", $id_incidencia);
    return $stmt->execute();
}

function buscarIncidencias($id_tecnico, $termino)
{
    $conexion = conexionDB();
    $stmt = $conexion->prepare("SELECT * FROM incidencia WHERE id_tecnico=:id_tecnico AND (titulo LIKE :termino OR descripcion LIKE :termino)");
    $likeTermino = "%" . $termino . "%";
    $stmt->bindParam(":id_tecnico", $id_tecnico);
    $stmt->bindParam(":termino", $likeTermino);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}


function getPassword($email)
{
    $conexion = conexionDB();

    $stmt = $conexion->prepare("SELECT * FROM tecnico WHERE email=:email");
    $stmt->bindParam(":email", $email);
    $stmt->execute();

    $usuario = $stmt->fetch(); //La primera fila
    if ($usuario == false) {   //Ese email no registrado
        return null;
    } else {                      //Encontrado y devuelvo password hasheada
        return $usuario['password'];
    }
}


function obtenerIncidenciasPorTecnico($id_tecnico, $filtros = [])
{
    $conexion = conexionDB();
    $sql = "SELECT * FROM incidencia WHERE id_tecnico = :id_tecnico";
    $params = [":id_tecnico" => $id_tecnico];

    if (!empty($filtros['estado'])) {
        $sql .= " AND estado = :estado";
        $params[":estado"] = $filtros['estado'];
    }
    if (!empty($filtros['tipo'])) {
        $sql .= " AND tipo = :tipo";
        $params[":tipo"] = $filtros['tipo'];
    }
    if (!empty($filtros['prioridad'])) {
        $sql .= " AND prioridad = :prioridad";
        $params[":prioridad"] = $filtros['prioridad'];
    }

    $stmt = $conexion->prepare($sql);
    $stmt->execute($params);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}