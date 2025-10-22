<?php


//Leer el formulario
if ($_GET) {
    if (isset($_REQUEST['cok'])) {
        $valorCookie = $_REQUEST['cok'];
    }
}


//Creación de la cookie
setcookie("TestCookie", $valorCookie, (time() + (3600 * 3)), "/", "localhost", 0, 0);

header("Location: recibirCookie.php");