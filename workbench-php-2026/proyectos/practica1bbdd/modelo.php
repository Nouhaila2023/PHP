<?php


function conexionDB()
{
     $conexion = null;   // ← Declaramos la variable antes del try
    // Con un el método PDO::setAttribute
    try {
        //mariadb -> nombre del contenedor donde está bbdd
        //3306 -> puerto interno del contenedor
        $dsn = "mysql:host=mariadb;port=3306;dbname=practica1";
        $conexion = new PDO($dsn, "usuario", "usuario");
        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }

    return $conexion;
}


/**
 * Metodos para 
 */

function getIncidencia()
{
    //Conectar a BD
    $conexion = conexionDB();

    $stmt = $conexion->prepare("SELECT * FROM incidencia");
    $stmt->execute();
    $table = $stmt->fetchAll(PDO::FETCH_ASSOC); //Array asociativo
    return $table;
}



/*
getPassword*/

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


/*filtrar*/

function getIncidenciasPorTecnico($id_tecnico, $estado, $tipo, $prioridad) {
    $conexion = conexionDB();
    
    $sql = "SELECT * FROM incidencia WHERE id_tecnico = :id_tecnico";
    $params = [":id_tecnico" => $id_tecnico];

    if ($estado != "") {
        $sql .= " AND estado = :estado";
        $params[":estado"] = $estado;
    }
    if ($tipo != "") {
        $sql .= " AND tipo = :tipo";
        $params[":tipo"] = $tipo;
    }
    if ($prioridad != "") {
        $sql .= " AND prioridad = :prioridad";
        $params[":prioridad"] = $prioridad;
    }

    $stmt = $conexion->prepare($sql);
    $stmt->execute($params);

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}


