<?php
session_start();

//Si NO hay nadie logueado redirigimos a login.php
if (! isset($_SESSION['usuario'])) {
    header("Location: login.php");
} else {
    //Si está logueado redirigimos a table.php
    header("Location: table.php");
}
