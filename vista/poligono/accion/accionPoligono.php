<?php
$dir = "../";
$titulo = "Ver Poligono";
include_once $dir . '../estructura/header.php';
include_once $dir . '../../configuracion.php';


use Location\Coordinate;
use Location\Polygon;
use Location\Distance\Vincenty;
use Location\Formatter\Polygon\GeoJSON;
?><div class="container border border-secondary principal mt-3 pt-3">
    <?php
    $arredatos = data_submitted();
     if(isset($arredatos["coordenadas"]))
     {
        
  
        $objControl = new CtrlCoordenada();
        //Validamos las coordenadas
        if ($objControl->validarCoordenada($arredatos["coordenadas"])) {
    
        $polygon = new Polygon();
        //Agregamos cada coordenada al poligono 
        for ($i = 0; $i < count($arredatos["coordenadas"]); $i++) {
            $polygon->addPoint(new Coordinate($arredatos["coordenadas"][$i]["latitud"], $arredatos["coordenadas"][$i]["longitud"]));
        }
  
    ?>
        <h3 class="text-center">Ver Poligono</h3>

        <div id="mapa"></div>

        <script async src="https://maps.googleapis.com/maps/api/js?
key=AIzaSyCSSBXWB5v-BnIIplydnkuDkBHP3AVxBl4&callback=cargar"></script>
        <script>
         
        function cargar(){
           //Pasamos un array asociativo de php a javascript
            var datos = <?php  echo json_encode($arredatos["coordenadas"]); ?>;
            
            inicio(datos);
        }

            function inicio(datos) {

                var verticesPoligono1 = [];
                for (i = 0; i < datos.length; i++) {
                    //Agregamos cada coordenada 
                    verticesPoligono1.push({
                        lat: parseFloat(datos[i].latitud),
                        lng: parseFloat(datos[i].longitud)
                    });
                }
          
                

                var miMapa = new google.maps.Map(document.getElementById('mapa'), {
                    center: { //Definimos un centro
                        lat: parseFloat(verticesPoligono1[1].lat),
                        lng: parseFloat(verticesPoligono1[1].lng)
                    },
                    zoom: 6
                });

                var poligono = new google.maps.Polygon({
                    path: verticesPoligono1,
                    map: miMapa,
                    strokeColor: 'rgb(255, 0, 0)',
                    fillColor: 'rgb(255, 255, 0)',
                    strokeWeight: 4,
                });
                var popup = new google.maps.InfoWindow();

                poligono.addListener('click', function(e) {
                    popup.setContent('Contenido');
                    popup.setPosition(e.latLng);
                    popup.open(miMapa);
                });
               
            }
        
        </script>
    <?php

        echo "El perimetro del poligono es: " . $polygon->getPerimeter(new Vincenty()) . " metros";
    } else {
        echo "<h2>Error, al cargar las coordenadas</h2>";
    }

}
else{
    echo "<h2>No se cargo ningun dato</h2>";
}
    ?>
</div>
<?php

include_once $dir . '../estructura/footer.php';
?>