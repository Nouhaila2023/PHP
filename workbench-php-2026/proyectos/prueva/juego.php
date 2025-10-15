  <div class="flex-grow-1 p-4">
    <?php
    $barbaro=array(
        "url" => "./img/barbaro.png",

        "titulo" => "BARBARO",

        "discrepcion" => "El Bárbaro es un guerrero imponente y muy bien armado, 
                        un nómada de una tribu que alguna vez vigiló el sagrado Monte Arreat.",

        "puntos" => array("punto1" => "Lucha salvajemente con armas mele.",
                            "punto2" => "Emplea fuerza bruta para blandir enormes armas a dos manos, 
                            un arma en cada mano o un arma y un escudo.",
                            "punto3" => "Acumula Furia al causar o recibir daño y 
                            luego la descarga a través de ataques devastadores."),

        "video" => "./img/video.webm",

        "imagenes" => array(
            "img1" => "./img/foto1.png",    
            "img2" => "./img/foto2.png",
            "img3" => "./img/foto3.png",
            "img4" => "./img/foto4.png" 
        )       
    );

    // Generar La premera parte
    echo "<table>";

    foreach ($barbaro as $clave => $valor) {
     echo "<tr><td>";
    
    if ($clave == "url") {
        // Imagen principal
        echo "<img src='$valor' width='200'>";
    }
    echo "</td></tr>";

    echo"<tr>";

    if ($clave == "video") {
        // Video
        echo "<td>";
        echo "<video width='200' controls>
                <source src='$valor' type='video/webm'>
                Tu navegador no soporta video.
              </video>";
        echo "</td>";     
    } elseif ($clave == "puntos") {
        // Recorrer sub-array de puntos
        echo "<td>";
        echo "<ul>";
        foreach ($valor as $punto) {
            echo "<li>$punto</li>";
        }
        echo "</ul>";
    } elseif ($clave == "imagenes") {
        // Recorrer sub-array de imágenes adicionales
        foreach ($valor as $img) {
            echo "<img src='$img' width='100' style='margin-right:5px;'>";
        }
    } else {
        // Texto normal: titulo, descripción
        echo $valor;
    }

    echo "</tr>";
    
    }
    echo "</table>";
    ?>
    <p>Este es un ejemplo de un menú lateral con Bootstrap y PHP.</p>
  </div>