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

echo $coordinate->format($formatter) . PHP_EOL."<br>";

$formatter->setSeparator(', ')
    ->useCardinalLetters(true)
    ->setUnits(DMS::UNITS_ASCII);
echo "Latitud Norte o Sur y Longitud Este u Oeste <br>";
echo $coordinate->format($formatter) . PHP_EOL."<br>";
?>

<script type="text/javascript" src="https://code.jquery.com/jquery-1.10.1.min.js"></script>
<script type="text/javascript" src="https://maps.google.com/maps/api/js?sensor=true"></script>
<link rel="stylesheet" type="text/css" href="<?php echo $dir?>../css/estilo.css">
<script type="text/javascript" src="<?php echo $dir?>../js/mostrarMapa.js"></script>
<script type="text/javascript">
  mostrarCoordenadas(<?php echo $Latitud;?>,<?php echo $Longitud;?>);
</script>

<a href="../ingCoord.php">Volver</a><br>
<input type="button" id="Ver" value="Ver en Mapa" onclick="mostrarCoordenadas(<?php echo $Latitud;?>,<?php echo $Longitud; ?> )"></input>
<div id="mapa">
</div>
<?php }else{
  echo "No se recibieron datos<br />";
  }
?>
  </div>
    
<?php 
include_once $dir.'../estructura/footer.php';
?>