<?php
require("./cabecera.php");
?>

<h1>Jugadores</h1>

<div class="col-md-8 themed-grid-col">
    <div class="flex-shrink-0 p-3 bg-white">

        <div class="container text-center">
            <div class="row">

                <?php

                $jugadores = array(

                    "jugador1" => array(
                        "nombre" => "Barbaro",
                        "vida" => 100,
                        "url" => './img/barbaro.png',
                        "desc" => "Da ostias como panes",
                        "habilidades" => array("Golpe salto", "Terremoto", "Furia asesina")
                    ),

                    "jugador2" => array(
                        "nombre" => "Mago",
                        "vida" => 80,
                        "url" => './img/mago.png',
                        "desc" => "Echa rayos por el ...",
                        "habilidades" => array("Relámpago", "Bola de fuego", "Lluvia venenosa")
                    )
                );


                foreach ($jugadores as $clave => $valor) {
                    echo '<div class="col">';
                    echo "<h4>" . $valor["nombre"];
                    echo " - " . $valor["vida"] . " pv</h4>";
                    echo "<img src='" . $valor["url"] . "' width='200'>";
                    echo "<ul class='list-group'>";
                    foreach ($valor["habilidades"] as $habilidad) {
                        echo "<li class='list-group-item'>" . $habilidad . "</li>";
                    }
                    echo "</ul>";
                    echo '</div>';
                }


                /* //ESTILO MEJORADO CON BOOTSTRAP ---------------------------------------------
                foreach ($jugadores as $clave => $valor) {
                    echo '<div class="col">';

                    echo '<div class="card" style="width: 18rem;">
                            <img src="' . $valor["url"] . '" class="card-img-top">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                    <h5 class="card-title">' . $valor["nombre"] . '</h5>
                                    <p class="card-text">Vida: ' . $valor["vida"] . '</p>
                                    <a href="#" class="btn btn-primary">Detalle</a>
                                    </div>
                                    <div class="col">
                                      <ul class="list-group">
                                    ';

                    foreach ($valor["habilidades"] as $hab) {
                        echo "<li class='list-group-item'>$hab</li>";
                    }
                    echo '  
                                      </ul>
                                    </div>
                                </div>
                            </div>
                            </div>';
                    echo '</div>';
                }
                */

                ?>

            </div>
        </div>

    </div>
</div>
</div>


<?php
require("./pie.php");
?>