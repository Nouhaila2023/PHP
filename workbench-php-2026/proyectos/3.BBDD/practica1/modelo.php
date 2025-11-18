<?php


function conexionDB()
{
    // Con un el método PDO::setAttribute
    try {
        //mariadb -> nombre del contenedor donde está bbdd
        //3306 -> puerto interno del contenedor
        $dsn = "mysql:host=mariadb:3306;dbname=ejemplo";
        $conexion = new PDO($dsn, "usuario", "usuario");
        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }

    return $conexion;
}


/**
 * MÉTODOS PARA CLIENTES -----------------------------------------------------
 */
function getClientes()
{
    //Conectar a BD
    $conexion = conexionDB();

    $stmt = $conexion->prepare("SELECT * FROM clientes");
    $stmt->execute();
    $clientes = $stmt->fetchAll(PDO::FETCH_ASSOC); //Array asociativo
    return $clientes;
}

function getClienteById($id)
{
    //Conectar a BD
    $conexion = conexionDB();

    $stmt = $conexion->prepare("SELECT * FROM clientes WHERE id=?");
    $stmt->bindParam(1, $id);
    $stmt->execute();
    $clientes = $stmt->fetchAll(PDO::FETCH_ASSOC); //Array asociativo

    if (count($clientes) == 1) { //Encontrado
        return $clientes[0];
    } else { //No hay ningún cliente con ese id
        return null;
    }
}

function deleteClienteById($id)
{
    //Conectar a BD
    $conexion = conexionDB();

    $stmt = $conexion->prepare("DELETE FROM clientes WHERE id=?");
    $stmt->bindParam(1, $id);
    $stmt->execute();
}

function deleteAllClientes()
{
    //Conectar a BD
    $conexion = conexionDB();

    $stmt = $conexion->prepare("DELETE FROM clientes");
    $stmt->execute();
}

function insertCliente($nombre, $dni, $email, $direc, $telef)
{

    //Conectar a BD
    $conexion = conexionDB();

    $stmt = $conexion->prepare("INSERT INTO clientes (nombre,dni,email,direccion, telefono) VALUES (:nombre, :dni, :email, :direccion, :telefono)");
    $stmt->bindValue(':nombre', $nombre);
    $stmt->bindValue(':dni', $dni);
    $stmt->bindValue(':email', $email);
    $stmt->bindValue(':direccion', $direc);
    $stmt->bindValue(':telefono', $telef);
    $stmt->execute();
}


/**
 * MÉTODOS PARA INCIDENCIAS ---------------------------------------------------
 */
function getIncidencias()
{

    $conexion = conexionDB();

    $stmt = $conexion->prepare("SELECT * FROM incidencias");
    $stmt->execute();
    $incidencias = $stmt->fetchAll(PDO::FETCH_ASSOC); //Array asociativo
    return $incidencias;
}

function insertIncidencia($codigo, $dni, $descr, $fecha_creacion, $estado)
{
    $conexion = conexionDB();

    $stmt = $conexion->prepare("INSERT INTO incidencias (dni, descr, estado, fecha_creacion, codigo) VALUES(:dni, :descr, :estado, :fecha_creacion, :codigo)");
    $stmt->bindParam(":dni", $dni);
    $stmt->bindParam(":descr", $descr);
    $stmt->bindParam(":estado", $estado);
    $stmt->bindParam(":fecha_creacion", $fecha_creacion);
    $stmt->bindParam(":codigo", $codigo);
    $stmt->execute();
}

function getIncidencia($id)
{
    $conexion = conexionDB();

    $stmt = $conexion->prepare("SELECT * FROM incidencias WHERE id=:id");
    $stmt->bindParam(":id", $id);
    $stmt->execute();

    $incidencia = $stmt->fetch(); //La primera fila
    if ($incidencia == false) {   //Ese id no existe
        return null;
    } else {                      //El id lo ha encontrado
        return $incidencia;
    }
}

function deleteIncidenciaById($id)
{
    $conexion = conexionDB();
    $stmt = $conexion->prepare("DELETE FROM incidencias WHERE id=:id");
    $stmt->bindParam(":id", $id);
    $stmt->execute();
}

function deleteAllIncidencias()
{
    $conexion = conexionDB();
    $stmt = $conexion->prepare("DELETE FROM incidencias");
    $stmt->execute();
}

function updateIncidencia($id, $estado)
{
    $conexion = conexionDB();
    $stmt = $conexion->prepare("UPDATE incidencias SET estado=:estado WHERE id=:id");
    $stmt->bindParam(":id", $id);
    $stmt->bindParam(":estado", $estado);
    $stmt->execute();
}

/**
 * MÉTODOS PARA USUARIOS ---------------------------------------------------
 * 
 */

function insertUsuario($email, $password, $nombre, $apellidos, $telefono)
{
    $conexion = conexionDB();

    //Ver que el email no está ya en BBDD
    $existe = getPassword($email);
    if ($existe != null) {
        return false;
    }

    $stmt = $conexion->prepare("INSERT INTO usuarios (email, password, nombre, apellidos, telefono) VALUES (:email, :password, :nombre, :apellidos, :telefono)");
    //echo $stmt->queryString;
    $stmt->bindParam(":email", $email);
    $stmt->bindParam(":password", $password);
    $stmt->bindParam(":nombre", $nombre);
    $stmt->bindParam(":apellidos", $apellidos);
    $stmt->bindParam(":telefono", $telefono);
    $stmt->execute();

    return true;
}


function getPassword($email)
{
    $conexion = conexionDB();

    $stmt = $conexion->prepare("SELECT * FROM usuarios WHERE email=:email");
    $stmt->bindParam(":email", $email);
    $stmt->execute();

    $usuario = $stmt->fetch(); //La primera fila
    if ($usuario == false) {   //Ese email no registrado
        return null;
    } else {                      //Encontrado y devuelvo password hasheada
        return $usuario['password'];
    }
}
