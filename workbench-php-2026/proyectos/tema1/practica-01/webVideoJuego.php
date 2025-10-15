<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Juego</title>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    body {
      background-color: #1a1a1a;
      color: #fff;
    }
    .sidebar {
      width: 250px;
      height: 100vh;
      background-color: #111;
      padding: 20px;
    }
    .sidebar .nav-link {
      color: #ccc;
    }
    .sidebar .nav-link:hover {
      color: #fff;
      background-color: #222;
      border-left: 3px solid #a67c52;
    }
    .section-title {
      text-transform: uppercase;
      font-weight: bold;
      margin-top: 20px;
      font-size: 0.9rem;
      color: #a67c52;
    }
  </style>
</head>
<body>

<div class="d-flex">
  <div class="sidebar">
    <?php
    // Secciones y enlaces del menú
    $menu = [
      "Aspectos del Juego" => [
        "Fundamentos" => "#",
        "Combate y Habilidades" => "#",
        "El Mundo" => "#",
        "Seguidores" => "#",
        "Dificultad del Juego" => "#",
        "Juega con Amigos" => "#",
        "Jugador contra Jugador" => "#",
        "Temporadas" => "#",
        "Modos de partida" => "#"
      ],
      "Objetos" => [
        "Objetos y Armamento" => "#",
        "Inventario" => "#",
        "Oficios y Artesanos" => "#",
        "Cubo de Kanai" => "#"
      ]
    ];

    // Generar menú
    foreach ($menu as $section => $items) {
      echo "<div class='section-title'>$section</div>";
      echo "<ul class='nav flex-column mb-3'>";
      foreach ($items as $name => $link) {
        echo "<li class='nav-item'><a class='nav-link' href='$link'>$name</a></li>";
      }
      echo "</ul>";
    }

    ?>
  </div>
  <!-- Contenido principal -->
  <div class="cuerpo">
 
    <?php
    $personajes = array(

      "barbaro" => array(
                  "nombre" => "BÁRBARO",
                  "descripcion" => "El Bárbaro es un guerrero imponente y muy bien armado, 
                                  un nómada de una tribu que alguna vez vigiló el sagrado Monte Arreat.",
                  "url" => "./img/barbaro.png",
                  "puntos" => array(
                    "Lucha salvajemente con armas melé.",
                    "Emplea fuerza bruta para blandir enormes armas a dos manos, un arma en cada mano o un arma y un escudo.",
                    "Acumula Furia al causar o recibir daño y luego la descarga a través de ataques devastadores."
                  ),
                  "video" => "./img/video.webm",
                  "imagenes" => array(
                    "./img/foto1.png",
                    "./img/foto2.png",
                    "./img/foto3.png",
                    "./img/foto4.png"
                  )
      ),

        "guerrero" => array(
                    "nombre" => "GUERRERO DIVINO",
                    "descripcion" => "El Guerrero Divini es un campeón de la justicia, 
                                      ataviado en armadura metálica y poder fulgurante.
                                      Cuando el mal emerge de su cubli para corromper y 
                                      destruir a la humanidad, el Guerrero Divino carga.",
                    "url" => "./img/guerrero.png",
                    "puntos" => array(
                      "Emite su veredicto con brutales manguales e imponentes escudos.
                      Este ultimo tabto mrma como proteccion.",
                      "Obliga a las huestes del mal a luchar cuerpo a cuerpo o a 
                      distancia media con una miriada de habilidades. Asimismo, pronuncia leyes para incrementar 
                      la capacidad de combate de todos aquellos que se opongan a la oscuridad.",
                      "Hierve de Ira, un fervor que aumenta de manera constante, para descargar ataques aún más devastadores."
                    ),
                    "video" => "./img/video.webm",
                    "imagenes" => array(
                      "./img/foto5.png",
                      "./img/foto6.png",
                      "./img/foto7.png",
                      "./img/foto8.png"
                    )
      )
    );


foreach ($personajes as $pj) {

    // Contenedor principal: imagen + contenido
    echo "<div style=\"display:flex; align-items:flex-start; margin-bottom:50px;\">";

        // Imagen del personaje
        echo "<div style=\"width:450px; text-align:center;\">";
        echo "<img src=\"" . $pj['url'] . "\" width=\"400\">";
        echo "</div>";

        // Texto e información
        echo "<div style=\"flex:1; padding-left:20px;\">";

            // Nombre y descripción
            echo "<h2 style=\"color:#d3b37c; font-family:serif;\">" . $pj['nombre'] . "</h2>";
            echo "<p style=\"color:#cfc6b8;\">" . $pj['descripcion'] . "</p>";

            // Lista de puntos/habilidades
            echo "<ul style=\"color:#cfc6b8;\">";
            foreach ($pj['puntos'] as $punto) {
                echo "<li>" . $punto . "</li>";
            }
            echo "</ul>";

            // Video a la izquierda y fotos a la derecha (flexbox)
            echo "<div style=\"display:flex; margin-top:10px; align-items:flex-start; gap:20px;\">";

                // Video
                echo "<video width=\"350\" controls style=\"border:1px solid #d3b37c; border-radius:5px;\">";
                echo "<source src=\"" . $pj['video'] . "\" type=\"video/webm\">";
                echo "</video>";

                // Fotos de habilidades (opcional)
                if(!empty($pj['imagenes'])) {
                    echo "<div style=\"display:grid; grid-template-columns: repeat(2, 60px); gap:5px;\">";
                    foreach ($pj['imagenes'] as $img) {
                        echo "<img src=\"" . $img . "\" width=\"60\" style=\"border:1px solid #333;\">";
                    }
                    echo "</div>";
                }

            echo "</div>"; // fin de video + fotos

        echo "</div>"; // fin del texto e información

    echo "</div>"; // fin del contenedor principal

}


?>


<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
