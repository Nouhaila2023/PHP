<?php

function conexionDB()
{
    try {
        // Cambia los valores según tu entorno
        $dsn = "mysql:host=localhost;dbname=gestion_incidencias;charset=utf8";
        $conexion = new PDO($dsn, "root", "");
        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        die("Error de conexión: " . $e->getMessage());
    }
    return $conexion;
}

/**
 * -------------- MÉTODOS PARA TÉCNICOS (LOGIN) ----------------
 */

function validarTecnico($email, $password)
{
    $conexion = conexionDB();
    $stmt = $conexion->prepare("SELECT * FROM tecnico WHERE email = ?");
    $stmt->execute([$email]);
    $tecnico = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($tecnico && password_verify($password, $tecnico['password'])) {
        return $tecnico; //Login OK
    }
    return false; //Login incorrecto
}

/**
 * -------------- MÉTODOS PARA INCIDENCIAS ----------------
 */

// Listar incidencias con filtros
function obtenerIncidenciasPorTecnico($id_tecnico, $filtros = [])
{
    $conexion = conexionDB();

    $sql = "SELECT * FROM incidencia WHERE id_tecnico = ?";
    $params = [$id_tecnico];

    if (!empty($filtros['estado']) && $filtros['estado'] != "Todas") {
        $sql .= " AND estado = ?";
        $params[] = $filtros['estado'];
    }

    if (!empty($filtros['tipo']) && $filtros['tipo'] != "Todas") {
        $sql .= " AND tipo = ?";
        $params[] = $filtros['tipo'];
    }

    if (!empty($filtros['prioridad']) && $filtros['prioridad'] != "Todas") {
        $sql .= " AND prioridad = ?";
        $params[] = $filtros['prioridad'];
    }

    $sql .= " ORDER BY fecha_creacion DESC";
    $stmt = $conexion->prepare($sql);
    $stmt->execute($params);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Crear incidencia
function crearIncidencia($datos)
{
    $conexion = conexionDB();

    $stmt = $conexion->prepare(
        "INSERT INTO incidencia (titulo, descripcion, tipo, estado, prioridad, id_tecnico, fecha_creacion, fecha_actualizacion)
         VALUES (:titulo, :descripcion, :tipo, 'Pendiente', :prioridad, :id_tecnico, NOW(), NOW())"
    );

    $stmt->execute([
        ":titulo" => $datos['titulo'],
        ":descripcion" => $datos['descripcion'],
        ":tipo" => $datos['tipo'],
        ":prioridad" => $datos['prioridad'],
        ":id_tecnico" => $datos['id_tecnico']
    ]);
}

// Obtener una incidencia por ID
function obtenerIncidencia($id_incidencia)
{
    $conexion = conexionDB();

    $stmt = $conexion->prepare("SELECT * FROM incidencia WHERE id_incidencia = ?");
    $stmt->execute([$id_incidencia]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

// Actualizar incidencia
function actualizarIncidencia($id_incidencia, $datos)
{
    $conexion = conexionDB();

    $stmt = $conexion->prepare(
        "UPDATE incidencia SET 
            titulo = :titulo,
            descripcion = :descripcion,
            tipo = :tipo,
            estado = :estado,
            prioridad = :prioridad,
            fecha_actualizacion = NOW()
         WHERE id_incidencia = :id"
    );

    $stmt->execute([
        ":titulo" => $datos['titulo'],
        ":descripcion" => $datos['descripcion'],
        ":tipo" => $datos['tipo'],
        ":estado" => $datos['estado'],
        ":prioridad" => $datos['prioridad'],
        ":id" => $id_incidencia
    ]);
}

// Eliminar incidencia
function eliminarIncidencia($id_incidencia)
{
    $conexion = conexionDB();
    $stmt = $conexion->prepare("DELETE FROM incidencia WHERE id_incidencia = ?");
    $stmt->execute([$id_incidencia]);
}

// Buscar incidencias por término
function buscarIncidencias($id_tecnico, $termino)
{
    $conexion = conexionDB();
    $termino = "%$termino%";

    $stmt = $conexion->prepare("
        SELECT * FROM incidencia
        WHERE id_tecnico = ?
        AND (titulo LIKE ? OR descripcion LIKE ? OR tipo LIKE ?)
        ORDER BY fecha_creacion DESC
    ");

    $stmt->execute([$id_tecnico, $termino, $termino, $termino]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
