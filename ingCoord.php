<?php
 include_once 'vista/estructura/header.php';
 ?>
    <h3>Ingrese las coordenadas</h3>

    <form method="post" action="formato.php">
        <label>Ubicacion</label><br/>
            Latitud <input id="Latitud" name ="Latitud" type="text">
            Longitud <input id="Longitud" name ="Longitud" type="text">
        <input id="accion" name ="accion" value="formato" type="hidden">
        <input type="submit">
    </form>
    <br><br>
   
  <article id="mapa">
  </article>
  <!--<input type="button" id="parar" value="Parar" onclick="detener();"/>-->
<?php
 include_once 'vista/estructura/footer.php';
?>