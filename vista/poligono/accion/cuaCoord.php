<?php
$dir="../";
$titulo="";
include_once $dir.'../estructura/header.php';
require $dir."../../utiles/vendor/autoload.php";
use Location\Coordinate;
use Location\Polygon;
use Location\Formatter\Polygon\GeoJSON;

$polygon = new Polygon;
$polygon->addPoint(new Coordinate(10, 20));
$polygon->addPoint(new Coordinate(20, 40));
$polygon->addPoint(new Coordinate(30, 40));
$polygon->addPoint(new Coordinate(30, 20));

?>
<div class="pt-5 text-center">
<?php
$formatter = new GeoJSON;

echo $formatter->format($polygon);
?>
</div>
<?php
include_once $dir.'../estructura/footer.php';
?>
