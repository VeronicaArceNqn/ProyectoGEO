<?php
include_once 'vista/estructura/header.php';
require "utiles/vendor/autoload.php";
use Location\Coordinate;
use Location\Polyline;
use Location\Distance\Vincenty;

$track = new Polyline();
$track->addPoint(new Coordinate(52.5, 13.5));
$track->addPoint(new Coordinate(54.5, 12.5));



?>
<div class="pt-5 text-center">
<?php
echo "LONGITUD DE UNA POLILINEA: <br>
phpgeo tiene una implementación de polilíneas que se puede usar para calcular la longitud de un track GPS o una ruta. Una polilínea consta de al menos dos puntos. <br/>";

echo $track->getLength(new Vincenty());
?>
</div>
<?php
include_once 'vista/estructura/footer.php';
?>