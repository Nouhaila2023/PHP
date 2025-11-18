<?php
session_start();
if (!isset($_SESSION['usuario']))
    header("Location: login.php");
?>

<!DOCTYPE html>
<html lang="en" data-bs-theme="auto">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Javier Profe">
    <title>Incidencias</title>

    <link rel="stylesheet" href="./css/bootstrap.min.css">

    <link rel="stylesheet" href="./css/fontawesome.css">
    <link href="./assets/css/solid.css" rel="stylesheet" />

    <link rel="icon" href="./img/icono.png" sizes="32x32" type="image/png">
</head>

<body class="d-flex align-items-center py-4 bg-body-tertiary">

    <div class="container">
        <?php
        include_once("header.php");
        include_once("modelo.php");
        $incidencia = getIncidencia($_REQUEST['id']);
        ?>

        <main>

            <button type="button" class="btn btn-primary btn-sm mb-2" data-bs-toggle="modal" data-bs-target="#nuevaIncidencia">
                Nueva
            </button>
            <button type="button" class="btn btn-warning btn-sm mb-2" data-bs-toggle="modal" data-bs-target="#eliminarIncidencias">
                Eliminar todas
            </button>


            <div class="card">
                <div class="card-header">
                    Detalle de incidencia
                </div>

                <?php if (isset($incidencia)) { ?>

                    <div class="card" style="width: 18rem;">
                        <div class="card-body">
                            <h5 class="card-title"><?= $incidencia['codigo']; ?></h5>
                            <p class="card-text">Descripcion: <?= $incidencia['descr']; ?></p>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">Dni: <?= $incidencia['dni']; ?></li>

                            <li class="list-group-item">
                                Estado: <?= $incidencia['estado']; ?>
                                <form action="controlador.php" method="POST" id="fui">
                                    <select name=" estado">
                                        <?php
                                        if (strcmp($incidencia['estado'], "enproceso") == 0) {
                                            echo '<option value="enproceso" selected>En proceso</option>';
                                        } else {
                                            echo '<option value="enproceso">En proceso</option>';
                                        }
                                        if (strcmp($incidencia['estado'], "terminada") == 0) {
                                            echo '<option value="terminada" selected>Terminada</option>';
                                        } else {
                                            echo '<option value="terminada">Terminada</option>';
                                        }
                                        if (strcmp($incidencia['estado'], "cancelada") == 0) {
                                            echo '<option value="cancelada" selected>Cancelada</option>';
                                        } else {
                                            echo '<option value="cancelada">Cancelada</option>';
                                        }
                                        ?>
                                    </select>
                                    <input type="hidden" name="id" value="<?= $incidencia['id']; ?>">
                                </form>
                            </li>

                            <li class="list-group-item">Fecha creación: <?= $incidencia['fecha_creacion']; ?></li>
                        </ul>
                        <div class="card-body">
                            <a href="./incidencias.php" class="btn btn-primary">Volver</a>
                            <button type="submit" class="btn btn-danger" name="modificarIncidencia" form="fui">Guardar</button>
                        </div>
                    </div>

                <?php
                } else {
                    echo "NO ENCONTRADO";
                }
                ?>
            </div>


        </main>
    </div>


    <?php include_once("./footer.php"); ?>

</body>

</html>