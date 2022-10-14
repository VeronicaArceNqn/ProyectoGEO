<?php
require "vendor/autoload.php";
use Location\Coordinate;
use Location\Formatter\Coordinate\DMS;


if ($_POST){
$Latitud = $_POST['Latitud'] ;
$Longitud = $_POST['Longitud'] ;

//echo "Datos enviados: <br> $Latitud <br> $Longitud <br>";

}else{
echo "No se recibieron datos<br />";
}


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
<link rel="stylesheet" type="text/css" href="vista/css/estilo.css">
<script type="text/javascript" src="vista/js/mostrarMapa.js"></script>
<a href="index.php">Volver</a><br>
<input type="button" id="Ver" value="Ver en Mapa" onclick="mostrarCoordenadas(<?php echo $Latitud;?>,<?php echo $Longitud; ?> )"></input>
<article id="mapa">
  </article>