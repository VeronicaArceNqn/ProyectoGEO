<?php
include_once 'vista/estructura/header.php';
require "utiles/vendor/autoload.php";
use Location\Coordinate;
use Location\Polyline;

$polyline = new Polyline();
$polyline->addPoint(new Coordinate(52.5, 13.5));
$polyline->addPoint(new Coordinate(54.5, 12.5));
$polyline->addPoint(new Coordinate(55.5, 14.5));
?>