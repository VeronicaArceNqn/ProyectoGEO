<?php
$dir="../";
$titulo="Ver Linea";
include_once $dir.'../estructura/header.php';
include_once $dir . '../../configuracion.php';
use Location\Coordinate;
use Location\Distance\Vincenty;
use Location\Distance\Haversine;
use Location\Line;

$arredatos = data_submitted();
if (isset($arredatos["coordenadas"]))
 {
 
   print_r($arredatos["coordenadas"]);
  
  $line = new Line(new Coordinate($arredatos["coordenadas"][0]["latitud"], $arredatos["coordenadas"][0]["longitud"]), new Coordinate($arredatos["coordenadas"][1]["latitud"], $arredatos["coordenadas"][1]["longitud"]));

  $midpoint = $line->getMidPoint();
  ?>
  <div class="container border border-secondary principal mt-3 pt-3">
  <h3 class="text-center">Ver Linea</h3>
  <div id="mapa"></div>
    <script async src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCSSBXWB5v-BnIIplydnkuDkBHP3AVxBl4&callback=cargar"></script>
    <script>
        function cargar(){
           //Pasamos un array asociativo de php a javascript
            var datos = <?php  echo json_encode($arredatos["coordenadas"]); ?>;
            var latPuntoMedio=<?php echo  $midpoint->getLat();?>;
            var lonPuntoMedio=<?php echo  $midpoint->getLng();?>;
            inicio(datos,latPuntoMedio,lonPuntoMedio);
        }

        function inicio(datos,latPuntoMedio,lonPuntoMedio) {
          verticesLinea = [];
          for (i = 0; i < datos.length; i++) {
            //Agregamos cada coordenada 
            verticesLinea.push({
              lat: parseFloat(datos[i].latitud),
              lng: parseFloat(datos[i].longitud)
            });
          }
          var miMapa = new google.maps.Map(document.getElementById('mapa'), {
            center: {
              lat: parseFloat(verticesLinea[1].lat),
              lng: parseFloat(verticesLinea[1].lng)
            },
            zoom: 6
          });

          var polilinea = new google.maps.Polyline({
            path: verticesLinea,
            map: miMapa,
            strokeColor: 'rgb(255, 0, 0)',
            fillColor: 'rgb(255, 255, 0)',
            strokeWeight: 4,
          });
          var marcadorPuntoMedio = new google.maps.Marker({
          position: {lat: parseFloat(latPuntoMedio), lng: parseFloat(lonPuntoMedio)},
          map: miMapa,
	  title: 'Punto medio: lat'+parseFloat(latPuntoMedio)+' lng: '+ parseFloat(lonPuntoMedio)
        });
          var popup = new google.maps.InfoWindow();

          polilinea.addListener('click', function(e) {
            popup.setContent('Contenido');
            popup.setPosition(e.latLng);
            popup.open(miMapa);
          });

        }
    </script>

  <?php 

      //invocación del método para calcular la longitud de la línea usando 2 las dos clase disponible, Vincenty y Haversine.
  echo "<h6>Longitud de la Linea</h6> ".$line->getLength(new Vincenty())." metros usando la clase Vincenty.<br> ".$line->getLength(new Haversine())." metros usando la clase Haversine.<br> ";
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