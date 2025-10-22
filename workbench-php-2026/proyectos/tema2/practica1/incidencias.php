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
    <link rel="icon" href="./img/icono.png" sizes="32x32" type="image/png">
</head>

<body class="d-flex align-items-center py-4 bg-body-tertiary">

    <div class="container">
        <?php include_once("header.php"); ?>

        <main>

            <button type="button" class="btn btn-primary btn-sm mb-2" data-bs-toggle="modal" data-bs-target="#nuevaIncidencia">
                Nueva
            </button>

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>IDF</th>
                        <th>DNI</th>
                        <th>Descripción</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    $posicion = 0;
                    foreach ($_SESSION['incidencias'] as $incidencia) {
                        echo "<tr>";
                        echo "<td>" . $incidencia['id'] . "</td>";
                        echo "<td>" . $incidencia['dni'] . "</td>";
                        echo "<td>" . $incidencia['descr'] . "</td>";
                        echo "<td>";
                        echo "<a href='controlador.php?accion=delIncidencia&posicion=" . $posicion . "'>X</a>";
                        echo "</td>";
                        echo "</tr>";
                        $posicion++;
                    }

                    ?>

                </tbody>
            </table>

        </main>
    </div>


    <?php include_once("./footer.php"); ?>

</body>

</html>