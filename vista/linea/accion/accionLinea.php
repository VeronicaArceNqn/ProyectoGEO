<?php
$dir="../";
$titulo="Ver Linea";
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


echo "La longitud de la Linea es: ".$polyline->getLength(new Vincenty())." ";

}
else{
  echo "Error, no se cargaron los datos.";
}
?>
</div>
<?php
include_once $dir.'../estructura/footer.php';
?>