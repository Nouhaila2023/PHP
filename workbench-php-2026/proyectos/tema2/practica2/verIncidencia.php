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
        <?php include_once("header.php"); ?>

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
                <div class="card-body">
                    <h5 class="card-title"><?= $_REQUEST['id']; ?> - <?= $_REQUEST['dni']; ?></h5>
                    <p class="card-text"><?= $_REQUEST['descr']; ?></p>
                    <a href="./incidencias.php" class="btn btn-primary">Volver</a>
                </div>
            </div>


        </main>
    </div>


    <?php include_once("./footer.php"); ?>

</body>

</html>