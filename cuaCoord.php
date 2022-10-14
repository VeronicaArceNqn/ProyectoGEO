<?php
require "vendor/autoload.php";
use Location\Coordinate;
use Location\Polygon;
use Location\Formatter\Polygon\GeoJSON;

$polygon = new Polygon;
$polygon->addPoint(new Coordinate(10, 20));
$polygon->addPoint(new Coordinate(20, 40));
$polygon->addPoint(new Coordinate(30, 40));
$polygon->addPoint(new Coordinate(30, 20));

$formatter = new GeoJSON;

echo $formatter->format($polygon);
?>