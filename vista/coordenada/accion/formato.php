<?php
$dir="../";
$titulo="Ver Coordenada";
include_once $dir.'../estructura/header.php';
require $dir."../../utiles/vendor/autoload.php";
use Location\Coordinate;
use Location\Formatter\Coordinate\DMS;
?>
  <div class="container border border-secondary principal mt-3 pt-3">
<?php

  if ($_POST){

      $Latitud = $_POST['latitud'] ;
      $Longitud = $_POST['longitud'] ;
      //echo "Datos enviados: <br> $Latitud <br> $Longitud <br>";
      $coordinate = new Coordinate($Latitud, $Longitud); 
      $formatter = new DMS();
      ?>
      <div class="container border border-secondary principal mt-3 pt-3">
      <h3 class="text-center">Punto en el mapa</h3>
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
    
    <div class="container-fluid">  
      <h6>Formato</h6> 
      - Grados, Minutos y Segundos : <input name="GMS" value="<?php echo $coordinate->format($formatter) . PHP_EOL; ?>"><br>

      - Grados, Minutos y Segundos con los puntos cardinales : <br>
    
    <?php
    $formatter->setSeparator('  (N: Norte / S: Sur),<br>')
        ->useCardinalLetters(true)
        ->setUnits(DMS::UNITS_ASCII);

    echo $coordinate->format($formatter) . PHP_EOL."  (E: Este / W: Oeste)<br>";
    ?>
    </div>
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.10.1.min.js"></script>
    <script type="text/javascript" src="https://maps.google.com/maps/api/js?sensor=true"></script>
    <link rel="stylesheet" type="text/css" href="<?php echo $dir?>../css/estilo.css">
    <script type="text/javascript" src="<?php echo $dir?>../js/mostrarMapa.js"></script>
    <script type="text/javascript">
      mostrarCoordenadas(<?php echo $Latitud;?>,<?php echo $Longitud;?>);
    </script>
    <div class="container-fluid center">
    <a href="../formCoordenada.php">Probar otra coordenada</a><br>
    </div>
    


    <div id="mapa">
      <input type="button" id="Ver" value="Ver en Mapa" onclick="mostrarCoordenadas(<?php echo $Latitud;?>,<?php echo $Longitud; ?> )"></input>
    </div>
    <?php }else{
      echo "No se recibieron datos<br />";
  }
?>
  </div>
    
<?php 
include_once $dir.'../estructura/footer.php';
?>