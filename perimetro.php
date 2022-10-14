<?php
include_once 'vista/estructura/header.php';
require "utiles/vendor/autoload.php";
use Location\Distance\Vincenty;
use Location\Coordinate;
use Location\Polygon;

$polygon = new Polygon();
$polygon->addPoint(new Coordinate(10, 10));
$polygon->addPoint(new Coordinate(10, 20));
$polygon->addPoint(new Coordinate(20, 20));
$polygon->addPoint(new Coordinate(20, 10));


?>
<div class="pt-5 text-center">
<?php
echo "PERIMETRO DE UN POLIGONO se calcula como la suma de la longitud de todos los segmentos: <br/> ";


echo $polygon->getPerimeter(new Vincenty())." metros";
?>
</div>
<?php
include_once 'vista/estructura/footer.php';
?>