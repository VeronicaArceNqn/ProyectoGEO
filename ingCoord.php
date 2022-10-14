<?php
 include_once 'vista/estructura/header.php';
 ?>
 <div class="pt-5">
    <h3 class="text-center">Ingrese las coordenadas</h3>

    <form method="post" class="row m-3 p-4 pt-3 bg-light fw-bold" action="formato.php">
        <label class="text-center">Ubicacion</label><br/>
        <label>Latitud</label><br/>
            <input id="Latitud" name ="Latitud" type="text">
        <label>Longitud</label><br/>    
            <input id="Longitud" name ="Longitud" type="text">
        <input type="submit" value="Enviar coordenadas">
    </form>
    <br><br>
 </div>
  <article id="mapa">
  </article>
  <!--<input type="button" id="parar" value="Parar" onclick="detener();"/>-->
<?php
 include_once 'vista/estructura/footer.php';
?>