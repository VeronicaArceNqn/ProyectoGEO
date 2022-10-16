

<?php 
$dir="../";
$titulo="Ver Polilinea";
include_once $dir.'../estructura/header.php';
require $dir."../../utiles/vendor/autoload.php";
use Location\Distance\Vincenty;
  use Location\Coordinate;
  use Location\Polygon;

?>
<div class="container border border-secondary principal mt-3 pt-3">
  <?php 
if(isset($_POST))
{
  
  
$polygon = new Polygon();
$polygon->addPoint(new Coordinate($_POST["latitud1"], $_POST["longitud1"]));
$polygon->addPoint(new Coordinate($_POST["latitud2"], $_POST["longitud2"]));
$polygon->addPoint(new Coordinate($_POST["latitud3"], $_POST["longitud3"]));
$polygon->addPoint(new Coordinate($_POST["latitud4"], $_POST["longitud4"]));



  
  ?>
 <h3 class="text-center">Ver Poligono</h3>
  
 <div id="mapa"></div>

    <script async src="https://maps.googleapis.com/maps/api/js?
  key=AIzaSyCSSBXWB5v-BnIIplydnkuDkBHP3AVxBl4&callback=inicio"></script>
  <script>

    function inicio() {
      var miMapa = new google.maps.Map(document.getElementById('mapa'), {
        center: { lat:  <?php echo $_POST["latitud1"];?>, lng: <?php echo $_POST["longitud1"];?>  },
        zoom: 6
      });
      var verticesPoligono = [
        { lat: <?php echo $_POST["latitud1"];?>, lng: <?php echo $_POST["longitud1"];?> },
        { lat: <?php echo $_POST["latitud2"];?>, lng: <?php echo $_POST["longitud2"];?>  },
        { lat: <?php echo $_POST["latitud3"];?>, lng: <?php echo $_POST["longitud3"];?> },
        { lat: <?php echo $_POST["latitud4"];?>, lng: <?php echo $_POST["longitud4"];?>  }
      ];
      var poligono = new google.maps.Polygon({
        path: verticesPoligono,
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
echo "El perimetro del poligono es: ".$polygon->getPerimeter(new Vincenty())." metros";
}
else{
  echo "<h2>No se cargaron datos </h2>";
}
?>
</div>
<?php 
include_once $dir.'../estructura/footer.php';
?>