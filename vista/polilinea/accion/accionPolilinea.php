<?php
$dir="../";
$titulo="Ver Polilinea";
include_once $dir.'../estructura/header.php';
require $dir."../../utiles/vendor/autoload.php";
use Location\Coordinate;
use Location\Polyline;
use Location\Distance\Vincenty;
if($_POST)
{
$polyline = new Polyline();
$polyline->addPoint(new Coordinate($_POST["latitud1"], $_POST["longitud1"]));
$polyline->addPoint(new Coordinate($_POST["latitud2"], $_POST["longitud2"]));
$polyline->addPoint(new Coordinate($_POST["latitud3"], $_POST["longitud3"]));
?>
<div class="container border border-secondary principal mt-3 pt-3">
<h3 class="text-center">Ver Polilinea</h3>
<div id="mapa"></div>
  <script async src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCSSBXWB5v-BnIIplydnkuDkBHP3AVxBl4&callback=inicio"></script>
  <script>
    inicio();
       var verticesLinea = [
        { lat: <?php echo $_POST["latitud1"];?>, lng: <?php echo $_POST["longitud1"];?>  },
        { lat: <?php echo $_POST["latitud2"];?>, lng: <?php echo $_POST["longitud2"];?> },
        { lat: <?php echo $_POST["latitud3"];?>, lng: <?php echo $_POST["longitud3"];?>  }
      ];
   
    function inicio() {
      var miMapa = new google.maps.Map(document.getElementById('mapa'), {
        center: { lat: <?php echo $_POST["latitud2"];?>, lng: <?php echo $_POST["longitud2"];?> },
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

polilinea.addListener('click', function (e) {
  popup.setContent('Contenido');
  popup.setPosition(e.latLng);
  popup.open(miMapa);
});

    }
  </script>

<?php 
echo "LONGITUD DE UNA POLILINEA: <br>
phpgeo tiene una implementación de polilíneas que se puede usar para calcular la longitud de un track GPS o una ruta. Una polilínea consta de al menos dos puntos. <br/>";

echo "La longitud de la polilinea es: ".$polyline->getLength(new Vincenty())." ";

}
else{
  echo "Error, no se cargaron los datos.";
}
?>
</div>
<?php
include_once $dir.'../estructura/footer.php';
?>