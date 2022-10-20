<?php
$dir = "../";
$titulo = "Ver Polilinea";
include_once $dir . '../estructura/header.php';
include_once $dir . '../../configuracion.php';

use Location\Coordinate;
use Location\Polyline;
use Location\Distance\Vincenty;
use Location\Distance\Haversine;

$arredatos = data_submitted();
if (isset($arredatos["coordenadas"])) {


  $objControl = new CtrlCoordenada();
  //Validamos las coordenadas
  if ($objControl->validarCoordenada($arredatos["coordenadas"])) {
    $polyline = new Polyline();
    for ($i = 0; $i < count($arredatos["coordenadas"]); $i++) {
      $polyline->addPoint(new Coordinate($arredatos["coordenadas"][$i]["latitud"], $arredatos["coordenadas"][$i]["longitud"]));
    }
?>
    <div class="container border border-secondary principal mt-3 pt-3">
      <h3 class="text-center">Ver Polil&iacute;nea</h3>
      <div id="mapa"></div>
      <script async src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCSSBXWB5v-BnIIplydnkuDkBHP3AVxBl4&callback=cargar"></script>
      <script>
         function cargar(){
           //Pasamos un array asociativo de php a javascript
            var datos = <?php  echo json_encode($arredatos["coordenadas"]); ?>;
            
            inicio(datos);
        }

        function inicio(datos) {
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
          var popup = new google.maps.InfoWindow();

          polilinea.addListener('click', function(e) {
            popup.setContent('Contenido');
            popup.setPosition(e.latLng);
            popup.open(miMapa);
          });

        }
      </script>

  <?php
    echo "<h6>Longitud de una polil&iacute;nea</h6>
PHPGeo tiene una implementación de polilíneas que se puede usar para calcular la longitud de un track GPS o una ruta. Una polilínea consta de al menos tres puntos. <br/>";

    echo "La longitud de la polil&iacute;nea es de " . $polyline->getLength(new Vincenty()) . " metros usando la clase Vincenty y de " . $polyline->getLength(new Haversine()) . " metros usando la clase Haversine.<br>";
  }
  ?> 
    <br/>
          <a href="../formPolilinea.php" class="btn btn-secondary mt-3 text-center">Cambiar valores de coordenadas</a>
  <?php
} else {
  echo "Error, no se cargaron los datos.";
}
  ?>
    </div>
    <?php
    include_once $dir . '../estructura/footer.php';
    ?>