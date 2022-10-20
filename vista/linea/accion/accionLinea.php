<?php
$dir="../";
$titulo="Ver Linea";
include_once $dir.'../estructura/header.php';
require $dir."../../utiles/vendor/autoload.php";
use Location\Coordinate;
use Location\Polyline;
use Location\Distance\Vincenty;
use Location\Distance\Haversine;
use Location\Line;
if($_POST)
{
  $polyline = new Polyline();
  $polyline->addPoint(new Coordinate($_POST["latitud1"], $_POST["longitud1"]));
  $polyline->addPoint(new Coordinate($_POST["latitud2"], $_POST["longitud2"]));
  $line = new Line(new Coordinate($_POST["latitud1"], $_POST["longitud1"]), new Coordinate($_POST["latitud2"], $_POST["longitud2"]));
  ?>
  <div class="container border border-secondary principal mt-3 pt-3">
  <h3 class="text-center">Ver Linea</h3>
  <div id="mapa"></div>
    <script async src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCSSBXWB5v-BnIIplydnkuDkBHP3AVxBl4&callback=inicio"></script>
    <script>
      inicio();
        var verticesLinea = [
          { lat: <?php echo $_POST["latitud1"];?>, lng: <?php echo $_POST["longitud1"];?>  },
          { lat: <?php echo $_POST["latitud2"];?>, lng: <?php echo $_POST["longitud2"];?> }
        ];
    
      function inicio() {
        var miMapa = new google.maps.Map(document.getElementById('mapa'), {
          center: { lat: <?php echo $_POST["latitud2"];?>, lng: <?php echo $_POST["longitud2"];?> },
          zoom: 6
        });

        var poligono = new google.maps.Polyline({
          path: verticesLinea,
          map: miMapa,
          strokeColor: 'rgb(255, 0, 0)',
          fillColor: 'rgb(255, 255, 0)',
          strokeWeight: 4,
        });
        var popup = new google.maps.InfoWindow();

  poligono.addListener('click', function (e) {
    popup.setContent('Contenido');
    popup.setPosition(e.latLng);
    popup.open(miMapa);
  });

      }
    </script>

  <?php 

      //invocación del método para calcular la longitud de la línea usando 2 las dos clase disponible, Vincenty y Haversine.
  echo "<h6>Longitud de la Linea</h6> ".$polyline->getLength(new Vincenty())." metros usando la clase Vincenty.<br> ".$polyline->getLength(new Haversine())." metros usando la clase Haversine.<br> ";
  //método de la línea para cálcular el punto medio de la línea. Muestra las coordenadas y la distancia en metros.
  $midpoint = $line->getMidPoint();
  printf(
    '<h6>Punto medio de la linea</h6> Se encuentra a %.3f grados de latitud y a %.3f grados de longitud.%s<br>',
    $midpoint->getLat(),
    $midpoint->getLng(),
    PHP_EOL
  );

  printf(
    '<h6>Distancia desde cada punto</h6> 
    Desde el primer punto es %.1f metros y desde el segundo punto es %.1f metros.%s (Vincenty)<br>',
    $line->getPoint1()->getDistance($midpoint, new Vincenty()),
    $line->getPoint2()->getDistance($midpoint, new Vincenty()),
    PHP_EOL
  );
  printf(
    'Desde el primer punto es %.1f metros y desde el segundo punto es %.1f metros.%s (Haversine) <br>',
    $line->getPoint1()->getDistance($midpoint, new Haversine()),
    $line->getPoint2()->getDistance($midpoint, new Haversine()),
    PHP_EOL
);
    }
    else{
      echo "Error, no se cargaron los datos.";
}
?>
<script type="text/javascript" src="<?php echo $dir?>../js/mostrarMapa.js"></script>
<input type="button" id="Ver" value="Ver el punto medio en el Mapa" onclick="mostrarCoordenadas(<?php echo $midpoint->getLat();?>,<?php echo $midpoint->getLng(); ?> )"></input><br>
<a href="../formLinea.php">Probar con otra l&iacute;nea</a><br>
</div>
<?php
include_once $dir.'../estructura/footer.php';
?>