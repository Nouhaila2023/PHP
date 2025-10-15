<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <?php
    echo "Hola, mundo. Estamos en proyectos/index.php";
    ?>

    <?= "<br>Hola, mundo. Estamos en proyectos/index.php" ?>
    
    <p><br> ------------------------------------------------</p>
    
    <?php

    $nomero1 = 5;
    if ($nomero1 > 3) {
        echo "<p>El número es mayor que 3</p>";
    } else {
        echo "<p>El número es menor o igual que 3</p>";
    }

    echo "<p><br> ------------------------------------------------</p>";

    echo "<br> El numero es $nomero1";
    echo "<br> El numero es " . ($nomero1+1);

    ?>

    <p><br> ------------------------------------------------</p>

    
    <?php

    $nomero2 = 6;
     if ($nomero2 > 3) : ?>
        <p>El número es mayor que 3</p>
    <?php else : ?>
        <p>El número es menor o igual que 3</p>
    <?php endif; ?>

    <p><br> FUERA DE PHP</p>

    <p><br> ------------------------------------------------</p>





</body>

</html>