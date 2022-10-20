<?php
$dir="../";
$titulo="Ver Coordenada";
include_once $dir.'../estructura/header.php';
include_once $dir . '../../configuracion.php';
use Location\Coordinate;
use Location\Formatter\Coordinate\DMS;



 
?>
  <div class="container border border-secondary principal mt-3 pt-3">
<?php

$arredatos = data_submitted();
if (isset($arredatos["coordenadas"]))
 {

      $latitud = $arredatos["coordenadas"][0]["latitud"] ;
      $longitud =  $arredatos["coordenadas"][0]["longitud"] ;
      //echo "Datos enviados: <br> $Latitud <br> $Longitud <br>";
      $coordinate = new Coordinate($latitud, $longitud); 
      $formatter = new DMS();
      ?>
      
      <h3 class="text-center">Punto en el mapa</h3>
      <div id="mapa"></div>
        <script async src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCSSBXWB5v-BnIIplydnkuDkBHP3AVxBl4&callback=cargar"></script>
        <script>
          function cargar(){
           //Pasamos las coordenadas de php a javascript
            var latitud = <?php  echo $latitud; ?>;
            var longitud = <?php echo $longitud; ?>;
            inicio(latitud, longitud);
        }
          
        
          function inicio(latitud, longitud) {
            var miMapa = new google.maps.Map(document.getElementById('mapa'), {
              center: { lat: parseFloat(latitud), lng: parseFloat(longitud) },
              zoom: 6

            });
            var marker = new google.maps.Marker({position: {lat: parseFloat(latitud), lng: parseFloat(longitud)}, map: miMapa, title:"Mi punto"});
            var coordenada = new google.maps.Coordinate({
              path: verticeCoordenada,
              map: miMapa,
              strokeColor: 'rgb(255, 0, 0)',
              fillColor: 'rgb(255, 255, 0)',
              strokeWeight: 4,
            });
            var popup = new google.maps.InfoWindow();
        
         
        coordenada.addListener('click', function (e) {
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
   
    <script type="text/javascript" src="https://maps.google.com/maps/api/js?sensor=true"></script>
    <link rel="stylesheet" type="text/css" href="<?php echo $dir?>../css/estilo.css">
    <script type="text/javascript" src="<?php echo $dir?>../js/mostrarMapa.js"></script>
    <script type="text/javascript">
      mostrarCoordenadas(<?php echo $latitud;?>,<?php echo $longitud;?>);
    </script>
   
   <br>

<a href="../formCoordenada.php" class="btn btn-secondary mt-3 text-center">Cambiar valores de coordenadas</a>
   
      
    <?php }else{
      echo "No se recibieron datos<br />";
  }
?>
  </div>
    
<?php 
include_once $dir.'../estructura/footer.php';
?>